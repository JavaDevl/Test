<?php

class time
{
    private $prop="I am a property";
    function __construct() {
        echo "object instantiated from class ".__CLASS__."<br>";
    }
    function getProp()
    {
        return "object get property ".$this->prop."<br>";
           }
        function setProp($val)
        {
        $this->prop=$val;

        }
           function  __destruct()
           {
               echo "object from ".__CLASS__." destroyed !"."<br>";
           }
           
           
}
$obj=new time;

echo $obj->getProp();

$obj->setProp("my name is piglet");

echo $obj->getProp();

unset($obj)


?>
