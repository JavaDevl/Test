<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBstatistics
 *
 * @author Yasha
 */
include '../db/dbConnector.php';
class DBstatistics {

    private $username;
    private $userquery;
    private $articlequery;
    private $id;
    private $db;
    private $articledata;
    private $data;
 function __construct($username,$id, $command)
 {  
     $db=new DbConnector();
     $this->username=$username;
     $this->id=$id;
     $this->db=$db;
     $this->articledata=$db->fetchmyArray("select confirmed from articles where id= ".$id);
         

     switch ($command)
   {
       case "feature": $this->data=2; break;
       case "approve": $this->data=1; break;
       case "unfeature": $this->data=1; break;
       case "unapprove": $this->data=0; break;
       case "reject": $this->data=-1; break;
   }
 $this->db->query("update articles set confirmed=$this->data where id= ".$this->id);
   
 }
 
// 
// 
//public function Featured()
//{
//    $setart=""; 
//    $setuser="";
//    if($this->articledata[0][0]!=2)
//    {
//                        echo "path pass feature<br>";
//
//        $setart='featured=1';
//    $setuser='featuredpost=featuredpost+1, score=score+5';
//     if($this->articledata[0][0]!=1)
//     {
//         $setart.=', confirmed=1';
//         $setuser.=', articlespost=articlespost+1, score=score+0.5';
//     } $this->articlequery='update articles set '.$setart.' where id='.$this->id;
//     $this->userquery='update users set '.$setuser.'  where username="'.$this->username.'"  ';
//     }
//    
//
//        
//        
//
//    
//    
//}
//
//public function Approved()
//{
//    echo "Approved!";
//    if($this->articledata[0][0]!=1)
//     {
//                        echo "path pass approve<br>";
//
//         $this->userquery='update users set articlespost=articlespost+1, score=score+0.5 where username="'.$this->username.'"  ';
//         $this->articlequery='update articles set confirmed=1, featured=0 where id='.$this->id;
//     
//             echo "path passed!";
//
//     }     
//}
//public function unApproved()
//{
//          $setart=""; 
//    $setuser="";
//    if($this->articledata[0][1]!=0)
//    {
//        $setart='featured=0';
//    $setuser='featuredpost=featuredpost-1, score=score-5';
//     if($this->articledata[0][0]!=0)
//     {
//         $setart.=', confirmed=0';
//         $setuser.=', articlespost=articlespost-1, score=score-0.5';
//    }  $this->articlequery='update articles set '.$setart.' where id='.$this->id;
//     $this->userquery='update users set '.$setuser.'  where username="'.$this->username.'"  ';
//    }
//
//      
//}
//public function unFeatured()
//{
//    
//    if($this->articledata[0][1]!=0)
//     {
//        echo "path pass unfeature<br>";
//         $this->userquery='update users set featuredpost=featuredpost-1, score=score-5 where username="'.$this->username.'"  ';
//         $this->articlequery='update articles set featured=0 where id='.$this->id;
//     }     
//}
//
//public function Rejected()
//{    
//    
////    $setart="confirmed=2, featured=2"; 
////$setuser="";
////if($this->articledata[0][0]==1)
////{
////         $setuser.='articlespost=articlespost-1, score=score-0.5';
////   
//// if($this->articledata[0][1]==1)
////     {
////    $setuser.=',featuredpost=featuredpost-1, score=score-5';
////}   
////     $this->userquery='update users set '.$setuser.'  where username="'.$this->username.'"  ';
////     echo $this->userquery;
//// }
//      $this->articlequery='update articles set confirmed=-1 where id='.$this->id;
//     echo "<br>".$this->articlequery."<br>";
//
//     }
}
?>
