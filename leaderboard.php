<?php
define('DEBUG', true);
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

$user->session_begin();
$auth->acl($user->data);
$user->setup();

/*
$filename = "2007-contest.php";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle); 
*/

$contents = '<p>There have been 6912 posts since Mon, 19 Nov 2007 21:00:00 -0800.<br /><table><tr><td><strong>Rank</strong></td><td><strong>Username</strong></td><td><strong>Posts</strong></td><td><strong>Score</strong></td><td><strong>Average Score</strong></td><td><strong>Average Posts Per Day</strong></td></tr><tr><td align="right">#1.</td><td><a href="member3749.html">jadelinghawkins</a></td><td>372</td><td>2436</td><td>7</td><td>12</td></tr><tr><td align="right">#2.</td><td><a href="member399.html">Angel_Melfina</a></td><td>360</td><td>2219</td><td>6</td><td>11.61</td></tr><tr><td align="right">#3.</td><td><a href="member3553.html">MetusOccultus</a></td><td>297</td><td>2050</td><td>7</td><td>9.58</td></tr><tr><td align="right">#4.</td><td><a href="member613.html">aeleon</a></td><td>214</td><td>2021</td><td>9</td><td>6.9</td></tr><tr><td align="right">#5.</td><td><a href="member4068.html">Tarmo</a></td><td>217</td><td>1566</td><td>7</td><td>7</td></tr><tr><td align="right">#6.</td><td><a href="member3662.html">Okutai</a></td><td>256</td><td>1407</td><td>5</td><td>8.26</td></tr><tr><td align="right">#7.</td><td><a href="member2058.html">Anime Fairy</a></td><td>223</td><td>1323</td><td>6</td><td>7.19</td></tr><tr><td align="right">#8.</td><td><a href="member3966.html">quidhala</a></td><td>152</td><td>1193</td><td>8</td><td>4.9</td></tr><tr><td align="right">#9.</td><td><a href="member4081.html">Vexar</a></td><td>188</td><td>1175</td><td>6</td><td>6.06</td></tr><tr><td align="right">#10.</td><td><a href="member4034.html">Vigilante</a></td><td>163</td><td>1089</td><td>7</td><td>5.26</td></tr><tr><td align="right">#11.</td><td><a href="member3457.html">tigerz-peace</a></td><td>160</td><td>1032</td><td>6</td><td>5.16</td></tr><tr><td align="right">#12.</td><td><a href="member3445.html">Walter Barrecks</a></td><td>170</td><td>998</td><td>6</td><td>5.48</td></tr><tr><td align="right">#13.</td><td><a href="member3081.html">Jakob Gray</a></td><td>111</td><td>954</td><td>9</td><td>3.58</td></tr><tr><td align="right">#14.</td><td><a href="member3879.html">chambers08</a></td><td>148</td><td>910</td><td>6</td><td>4.77</td></tr><tr><td align="right">#15.</td><td><a href="member3996.html">Kyto Matsunagi</a></td><td>159</td><td>852</td><td>5</td><td>5.13</td></tr><tr><td align="right">#16.</td><td><a href="member3961.html">Xersist</a></td><td>130</td><td>791</td><td>6</td><td>4.19</td></tr><tr><td align="right">#17.</td><td><a href="member3995.html">Mega Man</a></td><td>95</td><td>786</td><td>8</td><td>3.06</td></tr><tr><td align="right">#18.</td><td><a href="member3892.html">Fairy</a></td><td>128</td><td>703</td><td>5</td><td>4.13</td></tr><tr><td align="right">#19.</td><td><a href="member3441.html">Eymber</a></td><td>128</td><td>665</td><td>5</td><td>4.13</td></tr><tr><td align="right">#20.</td><td><a href="member3851.html">Smokescreen</a></td><td>109</td><td>664</td><td>6</td><td>3.52</td></tr><tr><td align="right">#21.</td><td><a href="member3819.html">Village Alchemist</a></td><td>81</td><td>649</td><td>8</td><td>2.61</td></tr><tr><td align="right">#22.</td><td><a href="member4096.html">Yami-Dokuro</a></td><td>74</td><td>646</td><td>9</td><td>2.39</td></tr><tr><td align="right">#23.</td><td><a href="member4102.html">sesha</a></td><td>95</td><td>608</td><td>6</td><td>3.06</td></tr><tr><td align="right">#24.</td><td><a href="member3820.html">Skaura-91</a></td><td>81</td><td>599</td><td>7</td><td>2.61</td></tr><tr><td align="right">#25.</td><td><a href="member4006.html">Lillium Jonathans</a></td><td>102</td><td>595</td><td>6</td><td>3.29</td></tr><tr><td align="right">#26.</td><td><a href="member3822.html">Red XIII</a></td><td>88</td><td>588</td><td>7</td><td>2.84</td></tr><tr><td align="right">#27.</td><td><a href="member1184.html">Lord Saladin</a></td><td>58</td><td>484</td><td>8</td><td>1.87</td></tr><tr><td align="right">#28.</td><td><a href="member3705.html">Lord Validrir</a></td><td>64</td><td>481</td><td>8</td><td>2.06</td></tr><tr><td align="right">#29.</td><td><a href="member4140.html">Sarithus</a></td><td>62</td><td>450</td><td>7</td><td>2</td></tr><tr><td align="right">#30.</td><td><a href="member3864.html">Centurion</a></td><td>60</td><td>440</td><td>7</td><td>1.94</td></tr><tr><td align="right">#31.</td><td><a href="member3916.html">regany</a></td><td>63</td><td>417</td><td>7</td><td>2.03</td></tr><tr><td align="right">#32.</td><td><a href="member3656.html">Shadeyrou</a></td><td>75</td><td>405</td><td>5</td><td>2.42</td></tr><tr><td align="right">#33.</td><td><a href="member40.html">Zhelir Darkfall</a></td><td>47</td><td>403</td><td>9</td><td>1.52</td></tr><tr><td align="right">#34.</td><td><a href="member3042.html">Kasurin</a></td><td>43</td><td>380</td><td>9</td><td>1.39</td></tr><tr><td align="right">#35.</td><td><a href="member131.html">SSJHunterKiller</a></td><td>50</td><td>379</td><td>8</td><td>1.61</td></tr><tr><td align="right">#36.</td><td><a href="member3865.html">jakolentu</a></td><td>40</td><td>377</td><td>9</td><td>1.29</td></tr><tr><td align="right">#37.</td><td><a href="member4129.html">NewArthur</a></td><td>40</td><td>376</td><td>9</td><td>1.29</td></tr><tr><td align="right">#38.</td><td><a href="member450.html">Matthias</a></td><td>51</td><td>359</td><td>7</td><td>1.65</td></tr><tr><td align="right">#39.</td><td><a href="member3712.html">Katakat</a></td><td>41</td><td>337</td><td>8</td><td>1.32</td></tr><tr><td align="right">#40.</td><td><a href="member4025.html">DarkFire</a></td><td>36</td><td>336</td><td>9</td><td>1.16</td></tr><tr><td align="right">#41.</td><td><a href="member3563.html">Greeneyes</a></td><td>47</td><td>336</td><td>7</td><td>1.52</td></tr><tr><td align="right">#42.</td><td><a href="member829.html">Ryand-Smith</a></td><td>45</td><td>335</td><td>7</td><td>1.45</td></tr><tr><td align="right">#43.</td><td><a href="member3108.html">Himros</a></td><td>37</td><td>332</td><td>9</td><td>1.19</td></tr><tr><td align="right">#44.</td><td><a href="member3884.html">Black_Dragon</a></td><td>71</td><td>322</td><td>5</td><td>2.29</td></tr><tr><td align="right">#45.</td><td><a href="member3759.html">King Silvran</a></td><td>39</td><td>320</td><td>8</td><td>1.26</td></tr><tr><td align="right">#46.</td><td><a href="member3707.html">codemonkey</a></td><td>35</td><td>317</td><td>9</td><td>1.13</td></tr><tr><td align="right">#47.</td><td><a href="member3142.html">Axle</a></td><td>46</td><td>311</td><td>7</td><td>1.48</td></tr><tr><td align="right">#48.</td><td><a href="member3979.html">Ithrin</a></td><td>43</td><td>306</td><td>7</td><td>1.39</td></tr><tr><td align="right">#49.</td><td><a href="member4065.html">Dream Evil</a></td><td>42</td><td>306</td><td>7</td><td>1.35</td></tr><tr><td align="right">#50.</td><td><a href="member3815.html">Ketsueki Tenshu</a></td><td>43</td><td>295</td><td>7</td><td>1.39</td></tr><tr><td align="right">#51.</td><td><a href="member4.html">Remaeus</a></td><td>34</td><td>283</td><td>8</td><td>1.1</td></tr><tr><td align="right">#52.</td><td><a href="member42.html">Edge</a></td><td>41</td><td>281</td><td>7</td><td>1.32</td></tr><tr><td align="right">#53.</td><td><a href="member3883.html">iggMaN</a></td><td>57</td><td>274</td><td>5</td><td>1.84</td></tr><tr><td align="right">#54.</td><td><a href="member4056.html">Lukan</a></td><td>28</td><td>246</td><td>9</td><td>0.9</td></tr><tr><td align="right">#55.</td><td><a href="member3585.html">Bella Black</a></td><td>31</td><td>235</td><td>8</td><td>1</td></tr><tr><td align="right">#56.</td><td><a href="member4024.html">Akishra</a></td><td>38</td><td>232</td><td>6</td><td>1.23</td></tr><tr><td align="right">#57.</td><td><a href="member3808.html">Shock</a></td><td>27</td><td>232</td><td>9</td><td>0.87</td></tr><tr><td align="right">#58.</td><td><a href="member4042.html">2TLPac</a></td><td>38</td><td>230</td><td>6</td><td>1.23</td></tr><tr><td align="right">#59.</td><td><a href="member3123.html">Emmie</a></td><td>38</td><td>228</td><td>6</td><td>1.23</td></tr><tr><td align="right">#60.</td><td><a href="member4038.html">Malaysia NightReaver</a></td><td>32</td><td>224</td><td>7</td><td>1.03</td></tr><tr><td align="right">#61.</td><td><a href="member4128.html">Ayaliss</a></td><td>32</td><td>217</td><td>7</td><td>1.03</td></tr><tr><td align="right">#62.</td><td><a href="member3622.html">sketchy</a></td><td>32</td><td>193</td><td>6</td><td>1.03</td></tr><tr><td align="right">#63.</td><td><a href="member654.html">Midnight</a></td><td>23</td><td>187</td><td>8</td><td>0.74</td></tr><tr><td align="right">#64.</td><td><a href="member3577.html">Ryu no Senshi</a></td><td>30</td><td>186</td><td>6</td><td>0.97</td></tr><tr><td align="right">#65.</td><td><a href="member3722.html">Lynes</a></td><td>27</td><td>181</td><td>7</td><td>0.87</td></tr><tr><td align="right">#66.</td><td><a href="member3680.html">Clyodna</a></td><td>25</td><td>172</td><td>7</td><td>0.81</td></tr><tr><td align="right">#67.</td><td><a href="member2565.html">Azmodai2</a></td><td>18</td><td>169</td><td>9</td><td>0.58</td></tr><tr><td align="right">#68.</td><td><a href="member757.html">Deicide</a></td><td>6</td><td>167</td><td>28</td><td>0.19</td></tr><tr><td align="right">#69.</td><td><a href="member4022.html">SatoDraygonFIST{Tas}</a></td><td>20</td><td>164</td><td>8</td><td>0.65</td></tr><tr><td align="right">#70.</td><td><a href="member3758.html">waterychan</a></td><td>26</td><td>162</td><td>6</td><td>0.84</td></tr><tr><td align="right">#71.</td><td><a href="member3205.html">Lithitemir</a></td><td>19</td><td>161</td><td>8</td><td>0.61</td></tr><tr><td align="right">#72.</td><td><a href="member3234.html">LitomoSilver</a></td><td>25</td><td>148</td><td>6</td><td>0.81</td></tr><tr><td align="right">#73.</td><td><a href="member3620.html">Hoshiko</a></td><td>23</td><td>146</td><td>6</td><td>0.74</td></tr><tr><td align="right">#74.</td><td><a href="member75.html">Faith</a></td><td>23</td><td>133</td><td>6</td><td>0.74</td></tr><tr><td align="right">#75.</td><td><a href="member4130.html">Genis Harwind</a></td><td>23</td><td>133</td><td>6</td><td>0.74</td></tr><tr><td align="right">#76.</td><td><a href="member3837.html">Tramp</a></td><td>17</td><td>129</td><td>8</td><td>0.55</td></tr><tr><td align="right">#77.</td><td><a href="member4083.html">Kiba U. Himura</a></td><td>20</td><td>128</td><td>6</td><td>0.65</td></tr><tr><td align="right">#78.</td><td><a href="member4053.html">Rose Beloved</a></td><td>15</td><td>125</td><td>8</td><td>0.48</td></tr><tr><td align="right">#79.</td><td><a href="member4112.html">Blindsite</a></td><td>14</td><td>122</td><td>9</td><td>0.45</td></tr><tr><td align="right">#80.</td><td><a href="member4084.html">vampIR</a></td><td>15</td><td>115</td><td>8</td><td>0.48</td></tr><tr><td align="right">#81.</td><td><a href="member1422.html">Sirge</a></td><td>14</td><td>114</td><td>8</td><td>0.45</td></tr><tr><td align="right">#82.</td><td><a href="member4106.html">Myth</a></td><td>17</td><td>113</td><td>7</td><td>0.55</td></tr><tr><td align="right">#83.</td><td><a href="member3726.html">Beau Goodbarrel</a></td><td>13</td><td>112</td><td>9</td><td>0.42</td></tr><tr><td align="right">#84.</td><td><a href="member388.html">Circ</a></td><td>12</td><td>108</td><td>9</td><td>0.39</td></tr><tr><td align="right">#85.</td><td><a href="member3195.html">Le Cruise</a></td><td>14</td><td>102</td><td>7</td><td>0.45</td></tr><tr><td align="right">#86.</td><td><a href="member3768.html">Wyxz</a></td><td>16</td><td>98</td><td>6</td><td>0.52</td></tr><tr><td align="right">#87.</td><td><a href="member4122.html">Lyolok</a></td><td>12</td><td>98</td><td>8</td><td>0.39</td></tr><tr><td align="right">#88.</td><td><a href="member3803.html">Kheelan Razor</a></td><td>10</td><td>97</td><td>10</td><td>0.32</td></tr><tr><td align="right">#89.</td><td><a href="member3743.html">DynamicChaos</a></td><td>14</td><td>95</td><td>7</td><td>0.45</td></tr><tr><td align="right">#90.</td><td><a href="member3807.html">pessyopti</a></td><td>11</td><td>95</td><td>9</td><td>0.35</td></tr><tr><td align="right">#91.</td><td><a href="member3891.html">Soulless</a></td><td>15</td><td>95</td><td>6</td><td>0.48</td></tr><tr><td align="right">#92.</td><td><a href="member44.html">Warr</a></td><td>9</td><td>92</td><td>10</td><td>0.29</td></tr><tr><td align="right">#93.</td><td><a href="member3987.html">Concordia Attica</a></td><td>14</td><td>90</td><td>6</td><td>0.45</td></tr><tr><td align="right">#94.</td><td><a href="member3817.html">Shronian</a></td><td>13</td><td>89</td><td>7</td><td>0.42</td></tr><tr><td align="right">#95.</td><td><a href="member3699.html">Akavira</a></td><td>11</td><td>89</td><td>8</td><td>0.35</td></tr><tr><td align="right">#96.</td><td><a href="member4151.html">Oblenator</a></td><td>13</td><td>88</td><td>7</td><td>0.42</td></tr><tr><td align="right">#97.</td><td><a href="member3754.html">wolvesvane</a></td><td>13</td><td>87</td><td>7</td><td>0.42</td></tr><tr><td align="right">#98.</td><td><a href="member3533.html">Shalynn</a></td><td>11</td><td>86</td><td>8</td><td>0.35</td></tr><tr><td align="right">#99.</td><td><a href="member3840.html">Feleon the Protector</a></td><td>11</td><td>86</td><td>8</td><td>0.35</td></tr><tr><td align="right">#100.</td><td><a href="member3969.html">aglaecwif</a></td><td>11</td><td>82</td><td>7</td><td>0.35</td></tr><tr><td align="right">#101.</td><td><a href="member298.html">Oni-Link</a></td><td>9</td><td>82</td><td>9</td><td>0.29</td></tr><tr><td align="right">#102.</td><td><a href="member4111.html">Altair</a></td><td>5</td><td>78</td><td>16</td><td>0.16</td></tr><tr><td align="right">#103.</td><td><a href="member4007.html">Unknown Knight</a></td><td>10</td><td>71</td><td>7</td><td>0.32</td></tr><tr><td align="right">#104.</td><td><a href="member3919.html">JTF</a></td><td>22</td><td>71</td><td>3</td><td>0.71</td></tr><tr><td align="right">#105.</td><td><a href="member125.html">Mia Siserae</a></td><td>11</td><td>69</td><td>6</td><td>0.35</td></tr><tr><td align="right">#106.</td><td><a href="member4137.html">~Christmas Kitty~</a></td><td>6</td><td>68</td><td>11</td><td>0.19</td></tr><tr><td align="right">#107.</td><td><a href="member3887.html">Cutler IX</a></td><td>9</td><td>63</td><td>7</td><td>0.29</td></tr><tr><td align="right">#108.</td><td><a href="member3261.html">HorusTheHeretic</a></td><td>8</td><td>62</td><td>8</td><td>0.26</td></tr><tr><td align="right">#109.</td><td><a href="member4048.html">Keen</a></td><td>10</td><td>60</td><td>6</td><td>0.32</td></tr><tr><td align="right">#110.</td><td><a href="member105.html">Ingrid</a></td><td>8</td><td>60</td><td>7</td><td>0.26</td></tr><tr><td align="right">#111.</td><td><a href="member3732.html">Krisuvial</a></td><td>9</td><td>58</td><td>6</td><td>0.29</td></tr><tr><td align="right">#112.</td><td><a href="member1133.html">Dovey</a></td><td>10</td><td>57</td><td>6</td><td>0.32</td></tr><tr><td align="right">#113.</td><td><a href="member3782.html">shadofire</a></td><td>8</td><td>55</td><td>7</td><td>0.26</td></tr><tr><td align="right">#114.</td><td><a href="member3320.html">Angleaya Z.</a></td><td>9</td><td>55</td><td>6</td><td>0.29</td></tr><tr><td align="right">#115.</td><td><a href="member4145.html">Melissails</a></td><td>6</td><td>53</td><td>9</td><td>0.19</td></tr><tr><td align="right">#116.</td><td><a href="member4014.html">Sakura-chan</a></td><td>4</td><td>52</td><td>13</td><td>0.13</td></tr><tr><td align="right">#117.</td><td><a href="member180.html">Essentials</a></td><td>5</td><td>50</td><td>10</td><td>0.16</td></tr><tr><td align="right">#118.</td><td><a href="member3494.html">Corvan</a></td><td>8</td><td>48</td><td>6</td><td>0.26</td></tr><tr><td align="right">#119.</td><td><a href="member3960.html">GreyFox</a></td><td>7</td><td>47</td><td>7</td><td>0.23</td></tr><tr><td align="right">#120.</td><td><a href="member3539.html">Beardy San</a></td><td>6</td><td>46</td><td>8</td><td>0.19</td></tr><tr><td align="right">#121.</td><td><a href="member4142.html">Crimson_Heartless</a></td><td>4</td><td>41</td><td>10</td><td>0.13</td></tr><tr><td align="right">#122.</td><td><a href="member156.html">miyumi</a></td><td>6</td><td>36</td><td>6</td><td>0.19</td></tr><tr><td align="right">#123.</td><td><a href="member4144.html">sdSilver</a></td><td>4</td><td>35</td><td>9</td><td>0.13</td></tr><tr><td align="right">#124.</td><td><a href="member4028.html">Dyne</a></td><td>7</td><td>35</td><td>5</td><td>0.23</td></tr><tr><td align="right">#125.</td><td><a href="member3526.html">Zay Zay~</a></td><td>3</td><td>34</td><td>11</td><td>0.1</td></tr><tr><td align="right">#126.</td><td><a href="member3750.html">Guttierrez</a></td><td>5</td><td>34</td><td>7</td><td>0.16</td></tr><tr><td align="right">#127.</td><td><a href="member4072.html">EarthCaste</a></td><td>3</td><td>33</td><td>11</td><td>0.1</td></tr><tr><td align="right">#128.</td><td><a href="member3793.html">Atmos</a></td><td>3</td><td>32</td><td>11</td><td>0.1</td></tr><tr><td align="right">#129.</td><td><a href="member4173.html">Immoral.Angel</a></td><td>3</td><td>32</td><td>11</td><td>0.1</td></tr><tr><td align="right">#130.</td><td><a href="member4043.html">Stalking_no_jutsu</a></td><td>3</td><td>32</td><td>11</td><td>0.1</td></tr><tr><td align="right">#131.</td><td><a href="member6.html">Hilde</a></td><td>2</td><td>30</td><td>15</td><td>0.06</td></tr><tr><td align="right">#132.</td><td><a href="member4082.html">Ritochristian</a></td><td>3</td><td>30</td><td>10</td><td>0.1</td></tr><tr><td align="right">#133.</td><td><a href="member4176.html">Hroppa</a></td><td>3</td><td>29</td><td>10</td><td>0.1</td></tr><tr><td align="right">#134.</td><td><a href="member4044.html">shadowseraph</a></td><td>3</td><td>29</td><td>10</td><td>0.1</td></tr><tr><td align="right">#135.</td><td><a href="member41.html">Kyo Yuy</a></td><td>2</td><td>28</td><td>14</td><td>0.06</td></tr><tr><td align="right">#136.</td><td><a href="member4019.html">Constance</a></td><td>3</td><td>28</td><td>9</td><td>0.1</td></tr><tr><td align="right">#137.</td><td><a href="member4180.html">Blade J</a></td><td>3</td><td>28</td><td>9</td><td>0.1</td></tr><tr><td align="right">#138.</td><td><a href="member287.html">Lantis</a></td><td>4</td><td>26</td><td>7</td><td>0.13</td></tr><tr><td align="right">#139.</td><td><a href="member4055.html">Notgnixel</a></td><td>3</td><td>26</td><td>9</td><td>0.1</td></tr><tr><td align="right">#140.</td><td><a href="member3551.html">Vladimer</a></td><td>3</td><td>26</td><td>9</td><td>0.1</td></tr><tr><td align="right">#141.</td><td><a href="member4163.html">Shin_Ryuu</a></td><td>3</td><td>25</td><td>8</td><td>0.1</td></tr><tr><td align="right">#142.</td><td><a href="member4165.html">Torokeru</a></td><td>3</td><td>25</td><td>8</td><td>0.1</td></tr><tr><td align="right">#143.</td><td><a href="member53.html">Treize Khushrenada</a></td><td>3</td><td>25</td><td>8</td><td>0.1</td></tr><tr><td align="right">#144.</td><td><a href="member3806.html">Hatredcopter</a></td><td>3</td><td>24</td><td>8</td><td>0.1</td></tr><tr><td align="right">#145.</td><td><a href="member4015.html">OminousDesire</a></td><td>4</td><td>24</td><td>6</td><td>0.13</td></tr><tr><td align="right">#146.</td><td><a href="member3517.html">Aoi</a></td><td>2</td><td>24</td><td>12</td><td>0.06</td></tr><tr><td align="right">#147.</td><td><a href="member3877.html">Alexanderbecan</a></td><td>3</td><td>24</td><td>8</td><td>0.1</td></tr><tr><td align="right">#148.</td><td><a href="member4152.html">XenoWarrior</a></td><td>3</td><td>24</td><td>8</td><td>0.1</td></tr><tr><td align="right">#149.</td><td><a href="member3954.html">Rikimaru</a></td><td>4</td><td>22</td><td>5</td><td>0.13</td></tr><tr><td align="right">#150.</td><td><a href="member3992.html">Escorvus</a></td><td>2</td><td>21</td><td>11</td><td>0.06</td></tr><tr><td align="right">#151.</td><td><a href="member3906.html">TheBronzeBow</a></td><td>3</td><td>20</td><td>7</td><td>0.1</td></tr><tr><td align="right">#152.</td><td><a href="member4115.html">mala-gosia</a></td><td>2</td><td>19</td><td>10</td><td>0.06</td></tr><tr><td align="right">#153.</td><td><a href="member3978.html">randomperson</a></td><td>2</td><td>19</td><td>10</td><td>0.06</td></tr><tr><td align="right">#154.</td><td><a href="member3935.html">shion abumari</a></td><td>3</td><td>18</td><td>6</td><td>0.1</td></tr><tr><td align="right">#155.</td><td><a href="member3920.html">deadpool24</a></td><td>3</td><td>18</td><td>6</td><td>0.1</td></tr><tr><td align="right">#156.</td><td><a href="member4071.html">The Froad</a></td><td>5</td><td>17</td><td>3</td><td>0.16</td></tr><tr><td align="right">#157.</td><td><a href="member4027.html">lovely_white_wolf</a></td><td>3</td><td>17</td><td>6</td><td>0.1</td></tr><tr><td align="right">#158.</td><td><a href="member3277.html">ltjackporter</a></td><td>3</td><td>16</td><td>5</td><td>0.1</td></tr><tr><td align="right">#159.</td><td><a href="member4062.html">Mr.X</a></td><td>3</td><td>16</td><td>5</td><td>0.1</td></tr><tr><td align="right">#160.</td><td><a href="member3413.html">Toshi</a></td><td>2</td><td>16</td><td>8</td><td>0.06</td></tr><tr><td align="right">#161.</td><td><a href="member4075.html">{Awesome}</a></td><td>5</td><td>15</td><td>3</td><td>0.16</td></tr><tr><td align="right">#162.</td><td><a href="member4153.html">Sharhafall</a></td><td>2</td><td>15</td><td>7</td><td>0.06</td></tr><tr><td align="right">#163.</td><td><a href="member4078.html">Justice</a></td><td>2</td><td>15</td><td>7</td><td>0.06</td></tr><tr><td align="right">#164.</td><td><a href="member10.html">Melika</a></td><td>2</td><td>15</td><td>7</td><td>0.06</td></tr><tr><td align="right">#165.</td><td><a href="member3925.html">Senritsu</a></td><td>1</td><td>14</td><td>14</td><td>0.03</td></tr><tr><td align="right">#166.</td><td><a href="member4167.html">aoisakana</a></td><td>2</td><td>13</td><td>7</td><td>0.06</td></tr><tr><td align="right">#167.</td><td><a href="member4085.html">MsMacphisto</a></td><td>2</td><td>13</td><td>7</td><td>0.06</td></tr><tr><td align="right">#168.</td><td><a href="member4008.html">kimmy_inuzuka</a></td><td>2</td><td>13</td><td>6</td><td>0.06</td></tr><tr><td align="right">#169.</td><td><a href="member4172.html">Swift.Arrow</a></td><td>3</td><td>12</td><td>4</td><td>0.1</td></tr><tr><td align="right">#170.</td><td><a href="member4020.html">Myoro</a></td><td>1</td><td>12</td><td>12</td><td>0.03</td></tr><tr><td align="right">#171.</td><td><a href="member4178.html">Mourn</a></td><td>1</td><td>11</td><td>11</td><td>0.03</td></tr><tr><td align="right">#172.</td><td><a href="member4031.html">Brute_Kaizer</a></td><td>1</td><td>11</td><td>11</td><td>0.03</td></tr><tr><td align="right">#173.</td><td><a href="member195.html">Grimbold Theoman</a></td><td>2</td><td>11</td><td>6</td><td>0.06</td></tr><tr><td align="right">#174.</td><td><a href="member4046.html">Jack3713</a></td><td>1</td><td>11</td><td>11</td><td>0.03</td></tr><tr><td align="right">#175.</td><td><a href="member3878.html">Jet</a></td><td>5</td><td>10</td><td>2</td><td>0.16</td></tr><tr><td align="right">#176.</td><td><a href="member4160.html">Lekter</a></td><td>1</td><td>10</td><td>10</td><td>0.03</td></tr><tr><td align="right">#177.</td><td><a href="member110.html">FutureKiyoshi</a></td><td>1</td><td>10</td><td>10</td><td>0.03</td></tr><tr><td align="right">#178.</td><td><a href="member4107.html">Pepe</a></td><td>1</td><td>10</td><td>10</td><td>0.03</td></tr><tr><td align="right">#179.</td><td><a href="member3766.html">Eschar</a></td><td>1</td><td>10</td><td>10</td><td>0.03</td></tr><tr><td align="right">#180.</td><td><a href="member3492.html">Tink047</a></td><td>2</td><td>10</td><td>5</td><td>0.06</td></tr><tr><td align="right">#181.</td><td><a href="member4064.html">DEWocracy</a></td><td>1</td><td>10</td><td>10</td><td>0.03</td></tr><tr><td align="right">#182.</td><td><a href="member4158.html">barnabas13</a></td><td>1</td><td>10</td><td>10</td><td>0.03</td></tr><tr><td align="right">#183.</td><td><a href="member3237.html">Pantsmaster</a></td><td>2</td><td>9</td><td>5</td><td>0.06</td></tr><tr><td align="right">#184.</td><td><a href="member4110.html">669</a></td><td>2</td><td>9</td><td>5</td><td>0.06</td></tr><tr><td align="right">#185.</td><td><a href="member3994.html">KiteString</a></td><td>1</td><td>9</td><td>9</td><td>0.03</td></tr><tr><td align="right">#186.</td><td><a href="member430.html">Polites</a></td><td>1</td><td>9</td><td>9</td><td>0.03</td></tr><tr><td align="right">#187.</td><td><a href="member623.html">Ran Iji</a></td><td>1</td><td>9</td><td>9</td><td>0.03</td></tr><tr><td align="right">#188.</td><td><a href="member4080.html">Vixenia</a></td><td>1</td><td>8</td><td>8</td><td>0.03</td></tr><tr><td align="right">#189.</td><td><a href="member3943.html">mikashika</a></td><td>1</td><td>8</td><td>8</td><td>0.03</td></tr><tr><td align="right">#190.</td><td><a href="member3947.html">Ren-san</a></td><td>1</td><td>8</td><td>8</td><td>0.03</td></tr><tr><td align="right">#191.</td><td><a href="member4113.html">Ai0n</a></td><td>1</td><td>8</td><td>8</td><td>0.03</td></tr><tr><td align="right">#192.</td><td><a href="member4067.html">KissMySass</a></td><td>1</td><td>7</td><td>7</td><td>0.03</td></tr><tr><td align="right">#193.</td><td><a href="member3639.html">Bubblgumm3</a></td><td>1</td><td>7</td><td>7</td><td>0.03</td></tr><tr><td align="right">#194.</td><td><a href="member3429.html">spnraleigh</a></td><td>1</td><td>7</td><td>7</td><td>0.03</td></tr><tr><td align="right">#195.</td><td><a href="member669.html">Sanjuro</a></td><td>1</td><td>7</td><td>7</td><td>0.03</td></tr><tr><td align="right">#196.</td><td><a href="member884.html">Jader</a></td><td>1</td><td>7</td><td>7</td><td>0.03</td></tr><tr><td align="right">#197.</td><td><a href="member4125.html">zeus</a></td><td>1</td><td>7</td><td>7</td><td>0.03</td></tr><tr><td align="right">#198.</td><td><a href="member3547.html">Pendan</a></td><td>1</td><td>6</td><td>6</td><td>0.03</td></tr><tr><td align="right">#199.</td><td><a href="member4149.html">riiko</a></td><td>2</td><td>6</td><td>3</td><td>0.06</td></tr><tr><td align="right">#200.</td><td><a href="member4063.html">loneGM</a></td><td>1</td><td>6</td><td>6</td><td>0.03</td></tr><tr><td align="right">#201.</td><td><a href="member661.html">Dionysus</a></td><td>1</td><td>6</td><td>6</td><td>0.03</td></tr><tr><td align="right">#202.</td><td><a href="member3217.html">Ralana</a></td><td>1</td><td>6</td><td>6</td><td>0.03</td></tr><tr><td align="right">#203.</td><td><a href="member511.html">Pidge</a></td><td>1</td><td>6</td><td>6</td><td>0.03</td></tr><tr><td align="right">#204.</td><td><a href="member3510.html">datenshi_snow</a></td><td>1</td><td>6</td><td>6</td><td>0.03</td></tr><tr><td align="right">#205.</td><td><a href="member3898.html">apple</a></td><td>1</td><td>5</td><td>5</td><td>0.03</td></tr><tr><td align="right">#206.</td><td><a href="member3544.html">Holly_Eldorn</a></td><td>1</td><td>5</td><td>5</td><td>0.03</td></tr><tr><td align="right">#207.</td><td><a href="member3643.html">Arc_J</a></td><td>1</td><td>5</td><td>5</td><td>0.03</td></tr><tr><td align="right">#208.</td><td><a href="member3661.html">Valcazar_Wolf/Otaku</a></td><td>2</td><td>5</td><td>2</td><td>0.06</td></tr><tr><td align="right">#209.</td><td><a href="member3143.html">LiL_KK</a></td><td>1</td><td>5</td><td>5</td><td>0.03</td></tr><tr><td align="right">#210.</td><td><a href="member4117.html">Rozwell</a></td><td>2</td><td>4</td><td>2</td><td>0.06</td></tr><tr><td align="right">#211.</td><td><a href="member4103.html">Dlikee</a></td><td>1</td><td>4</td><td>4</td><td>0.03</td></tr><tr><td align="right">#212.</td><td><a href="member88.html">Haruka_Tenou</a></td><td>1</td><td>4</td><td>4</td><td>0.03</td></tr><tr><td align="right">#213.</td><td><a href="member4069.html">xmazx</a></td><td>2</td><td>4</td><td>2</td><td>0.06</td></tr><tr><td align="right">#214.</td><td><a href="member3678.html">Excaliburnus</a></td><td>1</td><td>4</td><td>4</td><td>0.03</td></tr><tr><td align="right">#215.</td><td><a href="member3666.html">heather_marie_anoki</a></td><td>1</td><td>4</td><td>4</td><td>0.03</td></tr><tr><td align="right">#216.</td><td><a href="member3396.html">allpink</a></td><td>1</td><td>4</td><td>4</td><td>0.03</td></tr><tr><td align="right">#217.</td><td><a href="member4003.html">Madore99</a></td><td>2</td><td>2</td><td>1</td><td>0.06</td></tr><tr><td align="right">#218.</td><td><a href="member4051.html">Timblelaja</a></td><td>1</td><td>2</td><td>2</td><td>0.03</td></tr></table></div></p>';

trigger_error($contents);

/**
*
* @package phpBB3
* @version $Id$
* @copyright (c) 2007 eviL3
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}
?>