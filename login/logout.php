<?php 
session_start();
function logout()
	{
		// Need to delete auth key from database so cookie can no longer be used
		$username = $_SESSION['username'];
		setcookie("auth_key", "", time() - 3600);
                include '../db/dbConnector.php';
                $db=new DbConnector();
				$auth_query = $db->query("UPDATE users SET auth_key = 0 WHERE username = '" . $username . "'");
		// If auth key is deleted from database proceed to unset all session variables
		if ($auth_query)
		{
			unset($_SESSION['user_id']);
			unset($_SESSION['user_level']);
			unset($_SESSION['username']);;
			unset($_SESSION['user_lastactive']);
			session_unset();
			session_destroy(); 
            return true;
		}
		else
		{
			return false;
		}
	}
 
 
	// Check if session is still active and if it keep it alive
	function keepalive()
	{
		// If session is supposed to be saved or remembered ignore following code
		if(!isset($_COOKIE['auth_key']))
		{
			$oldtime = $_SESSION['user_lastactive'];
			if(!empty($oldtime))
			{
				$currenttime = time();
                // this is equivalent to 30 minutes
				$timeoutlength = 30 * 600;
				if($oldtime + $timeoutlength >= $currenttime){ 
					// Set new user last active time
					$_SESSION['user_lastactive'] = $currenttime;
				}
				else
				{
					// If session has been inactive too long logout
					logout();
				}
			}
		}
	}
 logout();
 header( 'Location: http://localhost/PhpProject5/homepage.php' ) ;
   ?>