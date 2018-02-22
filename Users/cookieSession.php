<?php
/* as of now we don't care about security but this is a horrible way to implement 
login information/session. use server sessions later and hash/salt SID 

as a side note; I think he will want us to use sessions for this....
-AH
*/

/* 10/31/2017 - AH - Created
	11/2/2016  - AH - added methods to handle data and remove cookies on command. 
	                          additional code to check for "session" cookies to prevent unauthorized access to pages 
*/

// crates cookie on log in and holds
function createLogCookie($user_name, $user_password) {
	$cookie_name = "SDOT_user_login_name";
	$cookie_name_info = $user_name;
	
	$cookie_password = "SDOT_user_login_password";
	$cookie_password_info = $user_password;
	
	// cookie set for one day 
	setcookie($cookie_ID, $cookie_name_info, time() + (86400), "/");
	setcookie($cookie_password, $cookie_password_info, time() + (86400), "/");
	
	/* create session */
	
}

// creates a cookie to store information that needs to be past on client end  
// stores data in cookie for later use
function createDataCookie($data_type, $data_value) {
	// keep this cookie for half a day
	setcookie($data_type, $data_value, time() + (43200), "/");
}

// calls a cookie for information change or recall
// NOTE: this method returns an array that contains login information that need to be parced
function callCookie() {
	if(isset($_COOKIE["SDOT_user_login_name"]) && isset($_COOKIE["SDOT_user_login_password"]) ) {
		
		return array($_COOKIE["SDOT_user_login_name"],$_COOKIE["SDOT_user_login_password"]);		
	}
	else 
	{
		// session has expired and will require re-login 
		// save current position in a data cookie 
		
		// send back to log in-page
		
		return array(null,null);
	}
}

// removes log in cookie or data cookie 
function removeCookie($cookie_type) {
	setcookie($cookie_type, "" , time() - 3600);
	return true;
}

?>


<?php

// used to check for a open session
// returns true or false. if false JS must resend back to login page on entry 
function checkForLogin(){
	if(isset($_COOKIE["SDOT_user_login_name"]) && isset($_COOKIE["SDOT_user_login_password"]) ) {
		// send request to server to check for correct login.\
		// dumy code till server up
		$correctLog = true;
		
		if( $correctLog == false)
			return false;
	}
	return true;
}
?>