/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license GNU Affero General Public License
 * @link https://blueimp.net/ajax/
 */

// Overrides client-side functionality for the logs view:

	ajaxChat.logsMonitorMode = null;
	ajaxChat.logsLastID = null;
	ajaxChat.logsCommand = null;

	ajaxChat.startChatUpdate = function() {
		this.updateChat('&getInfos=' + this.encodeText('userID,userName,userRole'));
	}

	ajaxChat.updateChat = function(paramString) {
		// Only update if we have parameters, are in monitor mode or the lastID has changed since the last update:
		if(paramString || this.logsMonitorMode || !this.logsLastID || this.lastID != this.logsLastID) {
			// Update the logsLastID for the lastID check:
			this.logsLastID = this.lastID;

			var requestUrl = this.ajaxURL
							+ '&lastID='
							+ this.lastID;
			if(paramString) {
				requestUrl += paramString;
			}
			requestUrl += '&' + this.getLogsCommand();
			this.makeRequest(requestUrl,'GET',null);
		} else {
			this.logsLastID = null;
		}
	}

	ajaxChat.sendMessage = function() {
		this.getLogs();	
	}
	
	ajaxChat.getLogs = function() {
		clearTimeout(this.timer);
		this.clearChatList();
		this.lastID = 0;
		this.logsCommand = null;
		this.makeRequest(this.ajaxURL,'POST',this.getLogsCommand());
	}
	
	ajaxChat.getLogsCommand = function() {
		if(!this.logsCommand) {
			if(!this.dom['inputField'].value &&
				parseInt(this.dom['yearSelection'].value) <= 0 &&
				parseInt(this.dom['hourSelection'].value) <= 0) {
				this.logsMonitorMode = true;
			} else {
				this.logsMonitorMode = false;
			}
			this.logsCommand = 'command=getLogs'
								+ '&channelID='	+ this.dom['channelSelection'].value
								+ '&year='		+ this.dom['yearSelection'].value
								+ '&month='		+ this.dom['monthSelection'].value
								+ '&day='		+ this.dom['daySelection'].value
								+ '&hour='		+ this.dom['hourSelection'].value
								+ '&search='	+ this.encodeText(this.dom['inputField'].value);
		}
		return this.logsCommand;
	}

	ajaxChat.onNewMessage = function(dateObject, userID, userName, userRoleClass, messageID, messageText, channelID, ip) {
		if(this.logsMonitorMode) {
			this.blinkOnNewMessage(dateObject, userID, userName, userRoleClass, messageID, messageText, channelID, ip);
			this.playSoundOnNewMessage(
				dateObject, userID, userName, userRoleClass, messageID, messageText, channelID, ip
			);
		}
		return true;
	}
	
	ajaxChat.logout = function() {
		clearTimeout(this.timer);
		this.makeRequest(this.ajaxURL,'POST','logout=true');
	}

	ajaxChat.switchLanguage = function(langCode) {
		window.location.search = '?view=logs&lang='+langCode;
	}

	ajaxChat.setChatUpdateTimer = function() {
		clearTimeout(this.timer);
		var timeout;
		if(this.socketIsConnected && this.logsLastID && this.lastID == this.logsLastID) {
			timeout = this.socketTimerRate;
		} else {
			timeout = this.timerRate;
			if(this.socketServerEnabled && !this.socketReconnectTimer) {
				// If the socket connection fails try to reconnect once in a minute:
				this.socketReconnectTimer = setTimeout('ajaxChat.socketConnect();', 60000);
			}
		}
		this.timer = setTimeout('ajaxChat.updateChat(null);', timeout);
	}
	
	ajaxChat.socketUpdate = function(data) {
		if(this.logsMonitorMode) {
			var ids = data.split(' ');
			// ids[0] is the messageID
			// ids[1] is the channelID
			// ids[2] is the userID of the request, not the actual message
			// ids[3] is the message mode: 1 are channel messages while 0 are all other messages
			if(ids.length == 4) {
				var selectedChannelID = parseInt(this.dom['channelSelection'].value);
				var channelID = parseInt(ids[1]);
				if(parseInt(ids[0]) > parseInt(this.lastID) &&
					(selectedChannelID == -3 || channelID == selectedChannelID ||
					selectedChannelID == -2 && channelID >= this.privateMessageDiff ||
					selectedChannelID == -1
						&& channelID >= this.privateChannelDiff
						&& channelID < this.privateMessageDiff)
				) {
					clearTimeout(this.timer);
					this.updateChat();
				}	
			}
		}
	}
	