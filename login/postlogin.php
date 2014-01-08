<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of postlogin
 *
 * @author Yasha
 */
include '../db/dbConnector.php';

$db=new DbConnector();
$user=$_POST['user'];
$pwd=$_POST['pwd'];
$checkuser=login($user,$pwd);
if($checkuser)
     header( 'Location: http://localhost/PhpProject5/homepage.php' ) ;
   else
       header( 'Location:http://localhost/PhpProject5/login/login.php?error=1' ) ;
function login($username, $password)
{		
    $db=new DbConnector();
    $sql = $db->query("select level, username,score from users where password = '" . md5($password) . "' AND username = '" . $username . "' LIMIT 1");
		// If there are no matches then the username and password do not match
		if($sql === false) 
		{
			return false;
		}
		else
		{
			while($u = mysql_fetch_array($sql))
			{ 
                            session_start();
                session_regenerate_id(true);
                $session_id = md5($username);
                $session_username = $u[username];
                $session_level = $u[level];
                $session_score = $u[score];
 
                $_SESSION['user_id'] = $session_id;
                $_SESSION['user_level'] = $session_level;
                $_SESSION['user_score'] = $session_score;
                $_SESSION['username'] = $session_username;
                $_SESSION['user_lastactive'] = time();
				return true;
			}
		}}
 
?>
