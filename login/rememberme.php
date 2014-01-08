<?php
 
function login($username, $password, $remember = false) 
{
    $sql = mysql_query("SELECT * FROM bio_users WHERE password = '" . $password . "' AND username = '" . $username . "' LIMIT 1");
    // If there are no matches then the username and password do not match
    if($sql === false) 
    {
        return false;
    }
    else
    {
        while($u = mysql_fetch_array($sql))
        { 
                $this->account_active = true;
                // Check if user wants account to be saved in cookie
                if($remember)
                {
                    // Generate new auth key for each log in (so old auth key can not be used multiple times in case 
                    // of cookie hijacking)
                    $cookie_auth= rand_string(10) . $username;
                    $auth_key = session_encrypt($cookie_auth);
                    $auth_query = mysql_query("UPDATE users SET auth_key = '" . $auth_key . "' WHERE username = '" . $username . "'");
 
                    setcookie("auth_key", $auth_key, time() + 60 * 60 * 24 * 7, "/", "example.com", false, true);
                }
                // Assign variables to session
                session_regenerate_id(true);
                $session_id = $u[id];
                $session_username = $username;
                $session_level = $u[user_level];
 
                $_SESSION['user_id'] = $session_id;
                $_SESSION['user_level'] = $session_level;
                $_SESSION['user_name'] = $session_username;
                $_SESSION['user_lastactive'] = time();
				return true;
        }
    }
}   
        ?>