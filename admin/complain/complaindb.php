<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of complaindb
 *
 * @author Yasha
 */
include '../../db/dbConnector.php';
class complaindb {

    private $username;
    function __construct($username, $response) {
        $db=new DbConnector();
        $this->username=$_SESSION['username'];
        $db->query("update complain set responded='$response', respondedby='$this->username' where  - ");
    }
}

?>
