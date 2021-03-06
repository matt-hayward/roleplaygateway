<?php
echo "Start";
define('IN_PHPBB', true);
define('PHPBB_ROOT_PATH','/var/www/roleplaygateway/');
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
echo $phpEx;
echo $phpbb_root_path;
include($phpbb_root_path . 'common.' . $phpEx);
echo "here";
// PRS
include($phpbb_root_path . 'includes/functions_prs.' . $phpEx);
set_time_limit(0);
// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

require('/var/www/roleplaygateway/config.php');

$mysqli = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} else {
	$threshold = time() - 360000;

	$sql = "DELETE FROM gateway_post_stats WHERE post_id NOT IN (SELECT post_id FROM gateway_posts)";
	
	$mysqli->query($sql);
	
	// Get all the posts that have been edited or posted since the threshold.
	$sql = "SELECT post_id,post_text,poster_id,post_subject FROM gateway_posts WHERE
	((post_time >= ".$threshold." OR post_edit_time >= ".$threshold.") AND post_id IN (SELECT post_id FROM gateway_post_stats WHERE stats_updated <= ".$threshold.")) OR post_id NOT IN (SELECT post_id FROM gateway_post_stats)
		ORDER BY post_id ASC LIMIT 100000";
		
	// Update the oldest posts.... (run sequentially)
/* 	$sql = "SELECT p.post_id,p.post_text,p.poster_id,p.post_subject FROM gateway_posts p
				INNER JOIN gateway_post_stats s ON p.post_id=s.post_id
				ORDER BY s.stats_updated ASC LIMIT 1000"; */
		
	
		
		
	// Haha, test on Remaeus... (what a loser, jeez)
//	$sql = "SELECT post_id,post_text,poster_id,post_subject FROM gateway_posts WHERE post_id = 371323";
	
	// Posts over a specific grade level
/*   	$sql = "SELECT p.post_id,p.post_text,p.poster_id,p.post_subject FROM gateway_posts p
				INNER JOIN gateway_post_stats s ON p.post_id=s.post_id
				WHERE flesch_kincaid_grade < 0 LIMIT 10000";  */
	// This one selects a specific post.			
	//$sql = "SELECT post_id,post_text,poster_id,post_subject FROM gateway_posts WHERE post_id = 166466";

	// This one is for a fast method of recalculating Reputations and Post Ratings 
	// WARNING: as of 6/11/2009 - this query takes over 1000 seconds to complete! I have never let it run to the end, so it may continue indefinitely.
/* 	$sql = "SELECT post_id,post_text,poster_id,post_subject FROM gateway_posts WHERE
				post_id IN (SELECT post_id FROM gateway_prs_votes LIMIT 10)"; */
				
	//$sql = "SELECT post_id,post_text,poster_id,post_subject FROM gateway_posts WHERE post_id IN (SELECT post_id FROM gateway_prs_votes WHERE user_id = 4)";
	

	if ($result = $mysqli->query($sql)) {
	
		while ($row = $result->fetch_assoc()) {
		
			echo "\nWorking on post #".$row['post_id']."";
		
			$post = get_real_content($row['post_text']);
			
			strip_bbcode($post);
			
			$character_count		= strlen($post);
			$word_count				= strlen(preg_replace('/[^ ]/', '', $post));
			$flesch_kincaid			= calculate_flesch($post);
			$flesch_kincaid_grade	= calculate_flesch_grade($post);
			$gunning_fog			= gunning_fog_score($post);
			$subject 				= $mysqli->real_escape_string($row['post_subject']);
			
			//echo "\nOverall grade: $flesch_kincaid_grade";
			
			$stat_sql = "INSERT INTO `gateway_post_stats` (
				`post_id` ,
				`stats_updated`,
				`poster_id` ,
				`post_subject`,
				`character_count` ,
				`word_count` ,
				`flesch_kincaid` ,
				`flesch_kincaid_grade` ,
				`gunning_fog`
			) VALUES (
				'".$row['post_id']."',
				'".time()."',
				'".$row['poster_id']."',
				\"".$subject."\",
				'".$character_count."',
				'".$word_count."',
				'".$flesch_kincaid."',
				'".$flesch_kincaid_grade."',
				'".$gunning_fog."'
			) ON DUPLICATE KEY UPDATE
				stats_updated=".time().",
				poster_id=".$row['poster_id'].",
				post_subject=\"".$subject."\",
				character_count=".$character_count.",
				word_count=".$word_count.",
				flesch_kincaid=".$flesch_kincaid.",
				flesch_kincaid_grade=".$flesch_kincaid_grade.",
				gunning_fog=".$gunning_fog."
				";
			
			if (!$mysqli->query($stat_sql)) {
				echo "failed: ".mysqli_error($mysqli);
			}
		
		}
		
		$result->close();
	} else {
		echo "failed: ".mysqli_error($mysqli);
	}
	
	$mysqli->close();
}



function calculate_flesch($text) {
	return (206.835 - (1.015 * average_words_sentence($text)) - (84.6 * average_syllables_word($text)));
}

function calculate_flesch_grade($text) {
	
	//echo "\nFormula: ((.39 * ".average_words_sentence($text).") + (11.8 * ".average_syllables_word($text).") - 15.59)";

	return ((.39 * average_words_sentence($text)) + (11.8 * average_syllables_word($text)) - 15.59);
}

function average_words_sentence($text) {
	//$sentences = strlen(preg_replace('/[^\.!?]/', '', $text));
	$sentences = strlen(preg_replace('/[^\.!?\n]/', '', $text));
	$words = strlen(preg_replace('/[^ ]/', '', $text));
	
	//echo "\nSentences: $sentences";
	//echo "\nWords: $words";
	
	if ($sentences < 1) { $sentences = 1; }
	
	$words_sentence = ($words/$sentences);
	
	if ($words_sentence > 50) {
		$words_sentence = 15;
	}
	
	return $words_sentence;
}

function average_syllables_word($text) {
	$syllables = 0;
	
	$text = preg_replace("/\.{4,}/","... ",$text);
	$text = preg_replace("/\n/",". ",$text);
	
	$words = explode(' ', $text);
	
	// If this is a one-word sentence,  do not waste time counting syllables, the average syllables per word will be too high.
	if (count($words) <= 2) {
		return 1;
	}
	
	for ($i = 0; $i < count($words); $i++) {
		$syllables = $syllables + count_syllables($words[$i]);
		//echo "\nThis Word: ".$words[$i];
		//echo "\nSyllables: ".$syllables;
	}
	
	return ($syllables/count($words));
}

function count_syllables($word) {
	  
	$subsyl = Array(
		'cial'
		,'tia'
		,'cius'
		,'cious'
		,'giu'
		,'ion'
		,'iou'
		,'sia$'
		,'.ely$'
	);
					 
	$addsyl = Array(
		'ia'
		,'riet'
		,'dien'
		,'iu'
		,'io'
		,'ii'
		,'[aeiouym]bl$'
		,'[aeiou]{3}'
		,'^mc'
		,'ism$'
		,'([^aeiouy])\1l$'
		,'[^l]lien'
		,'^coa[dglx].'
		,'[^gq]ua[^auieo]'
		,'dnt$'
	);
					  
	// Based on Greg Fast's Perl module Lingua::EN::Syllables
	$word = preg_replace('/[^a-z]/is', '', strtolower($word));
	$word_parts = preg_split('/[^aeiouy]+/', $word);
	foreach ($word_parts as $key => $value) {
		if ($value <> '') {
			$valid_word_parts[] = $value;
		}
	}
 
	$syllables = 0;
	// Thanks to Joe Kovar for correcting a bug in the following lines
	foreach ($subsyl as $syl) {
		$syllables -= preg_match('~'.$syl.'~', $word);
	}
	foreach ($addsyl as $syl) {
		$syllables += preg_match('~'.$syl.'~', $word);
	}
	if (strlen($word) == 1) {
		$syllables++;
	}
	$syllables += @count($valid_word_parts);
	$syllables = ($syllables == 0) ? 1 : $syllables;
	
	if ($syllables > 10) {
		$syllables = 5;
	}

	return $syllables;
}

function gunning_fog_score($text) {
	return ((average_words_sentence($text) + percentage_number_words_three_syllables($text)) * 0.4);
}

function percentage_number_words_three_syllables($text) {
	$syllables = 0;
	$words = explode(' ', $text);
	for ($i = 0; $i < count($words); $i++) {
		if (count_syllables($words[$i]) > 2) {
			$syllables ++;
		}
	}
	 
	$score = number_format((($syllables / count($words)) * 100));
	  
	return ($score);
}

function get_real_content($text) {

	if (!$uid)
	{
		$uid = '[0-9a-z]{5,}';
	}
	
	// Hoorah. 
	$text = preg_replace("/\[quote(?:=&quot;(.*?)&quot;)?(\:$uid)\](.*)\[\/quote?(\:$uid)\]/ie", ' ', $text);
	$text = preg_replace("/\[img(:$uid)?](.*)\[\/img(:$uid)?]/iUe", ' ', $text);
	$text = preg_replace("/\[code(:$uid)?](.*)\[\/code(:$uid)?]/iUe", ' ', $text);
	$text = preg_replace("/\[url(:$uid)?\](.*)\[\/url(:$uid)?\]/iUe", " ", $text);
	$text = preg_replace("/\[url(=(.*))?(:$uid)?\](.*)\[\/url(:$uid)?\]/iUe", ' ', $text);
	$text = preg_replace("/^(http:\/\/)/i", ' ', $text);
	
	// Use internal parsing to go ahead and convert URLs (because this is complicated. no need to do it twice)
	$text = make_clickable($text);
	
	// Now strip all HTML-enclosed content from the post
	$text = preg_replace('/\<a (.*)\>(.*)\<\/a\>/', ' ', $text);
	
	return $text;
}
echo "done";
?>
