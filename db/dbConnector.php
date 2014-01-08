<?php

class DbConnector {

var $theQuery;
var $link;
         private $host = 'localhost';
        private $db = 'FNDB';
        private $user = 'Yehiaa';
        private $pass = '554927';
public $numrows=0;        
function DbConnector(){

        // Get the main settings from the array we just loaded


        // Connect to the database
        $this->link = mysql_connect($this->host, $this->user,$this->pass) or die("couldn't connect to the server");
        mysql_select_db($this->db) or die ("Couldn't select Database!");
        register_shutdown_function(array(&$this, 'close'));
    }
	
  //*** Function: query, Purpose: Execute a database query ***
    function query($query) {

        $this->theQuery = $query;
        $myquery= mysql_query($query, $this->link);
if(!is_bool($myquery))
        $this->numrows=mysql_num_rows($myquery);
        return $myquery;
    }
    
        function num_rows_query($query) {

        $this->theQuery = $query;
        return mysql_num_rows( mysql_query($query, $this->link) );
    }

    //*** Function: fetchArray, Purpose: Get array of query results ***
    function fetchArray($result) {
        return mysql_fetch_array($result);
    }
        function fetchmyArray($query) {
$result = mysql_query($query, $this->link);
if (!$result) die ("Database access failed: " . mysql_error());
$rows = mysql_num_rows($result);
$this->numrows=$rows;   
for ($j = 0 ; $j < $rows ; ++$j)
{
$results[] = mysql_fetch_array($result);
}
return $results;}

function checkquery($m,$successmsg, $erorrmsg)
{
           
              if($m)
              {
                 echo $successmsg;
              }
              else
              {
                   header("HTTP/1.0 404 Not Found");
header('HTTP', true, 500); 
die($erorrmsg);
              }
          
}


    //*** Function: close, Purpose: Close the connection ***
    function close() {

        mysql_close($this->link);

    }
	
}

?>