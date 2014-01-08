<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of commentdb
 *
 * @author Yasha
 */
session_start();
       include '../db/dbConnector.php';
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
        
        class usefultools{
      
          static function checkquery($result)
          {
              if($result)
              {
                  echo "else";
              }
              else
              {
                   header("HTTP/1.0 404 Not Found");
header('HTTP', true, 500); 
die("Error");
              }
          }
        }
        
class commentdb {
 protected $dbcach;
protected $articleid;
 protected $username;
 
function __construct($articleid, $username)
    {
        $this->articleid=$articleid;
        $this->username=$username;
        $this->dbcach=new DbConnector();
    }
 

       
    
}

///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
class commentinsert extends commentdb
{    
    protected $content;
    function __construct($articleid, $username, $content)
    {
        parent::__construct($articleid, $username); 
        $this->content=$content;
}
public function insertanalysis()
{
           $m=$this->dbcach->query("insert into analysis(analysis_content, article_id, username, date_added) values('$this->content',$this->articleid,'$this->username',now())");

           trigger::action("users","score=score+0.25, analysispost=analysispost+1","username=".$this->username );
}
   public function insertcomment()
    {
       
       $m=$this->dbcach->query("insert into comments(Comment_content, article_id, username, date_added) values('$this->content',$this->articleid,'$this->username',now())");
    }
     }
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
     
     class commentreplyinsert extends commentinsert
{    
    private $commentid;
    function __construct($articleid, $username, $content, $commentid)
    {
        parent::__construct($articleid, $username, $content); 
        $this->commentid=$commentid;
}
//insert comment reply
    public function insertcommentreply()
    {
        
        
       $m= $this->dbcach->query("insert into comments(Comment_content, article_id, username, date_added, reply) values('$this->content',$this->articleid,'$this->username',now(),$this->commentid)");
//       $m= $this->dbcach->query("insert into replyto(comment_id, response_id) values('$this->content',$this->articleid,'$this->username',now(),$this->commentid)");
       
    } 
     }
//////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
     
     class feedbackanalysis extends commentdb
     {
          private $comment_id;
    function __construct($articleid, $username, $comment_id) {
         
        parent::__construct($articleid, $username); 
         $this->comment_id=$comment_id;

         }
           public function voteups()
    {
               $m= $this->dbcach->query("insert into analysisvoteups(analysis_id, username) values ($this->comment_id,'$this->username') ");
   
               if($m){$this->dbcach->query("update analysis set voteups=voteups+1 where analysis_id= $this->comment_id ");               
               }else {

      usefultools::checkquery($m);

   }
     }}
     
     
     
     
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////

     
     
     class feedbackcomment extends commentdb
{
    private $comment_id;
    function __construct($articleid, $username, $comment_id) {
         parent::__construct($articleid, $username); 
   
         $this->comment_id=$comment_id;
    }
            public function thumbedup()
    {

       
               $m= $this->dbcach->query("insert into comment_votes(comment_id, username, votetype) values ($this->comment_id,'$this->username',1) ");
         if($m)    $this->dbcach->query("update comments set feedbacksum=feedbacksum+1 where comment_id= $this->comment_id ");
 else{
         usefultools::checkquery($m);
    }
    }
         public function thumbeddown()
    {
               $m= $this->dbcach->query("insert into comment_votes(comment_id, username, votetype) values ($this->comment_id,'$this->username',2) ");
   
               if($m)$this->dbcach->query("update comments set feedbacksum=feedbacksum-1 where comment_id= $this->comment_id ");
   else {

      usefultools::checkquery($m);

   }
         
    }
    
    

}

    class admincomment{
    private $commentid;
    private $dbcach;
        public function __construct($commentid) {
    $this->commentid=$commentid;        
    $this->dbcach=new DbConnector();
      
    }
        
 public function update($content) 
    {
      $m=$this->dbcach->query(" update comments set comment_content='$content' where comment_id=$this->commentid");
    
        
    }
     public function report($reason,$username)
    {
      $m= $this->dbcach->query(" insert into complain (complain_category, reasons, complained_content_id, username,date_added) values('comments','$reason',$this->commentid,' $username',now())");
      usefultools::checkquery($m);
        }
    function delete()
    {
        $this->dbcach->query(" delete from comments where comment_id=$this->commentid");
    }}
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////

$id=$_POST['id'];
$contentcomment=$_POST['content'];
$commentid=$_POST['commentid'];
$command=$_POST['command'];
$username=$_SESSION['username'];
//$cdb=new commentdb($id, $user);

//
//$cdb->insertcomment();
//switch($command)
//{
//
//    case "thumbsup":feedbackcomment($id, $user, $commentid)->thumbedup(); break;
//    case "thumbsdown":feedbackcomment($id, $user, $commentid)->thumbeddown();break;
//    case "insertcomment":commentinsert($id, $user, $contentcomment)->insertcomment();break;
//    case "insertanalysis":commentinsert($id, $user, $contentcomment)->insertcomment();break;
//    case "analysis voteups":commentinsert($id, $user, $contentcomment)->insertcomment();break;
//    case "insercommentreply":commentreplyinsert($id, $user, $contentcomment,$commentid)->insertcomment();break;
//    
//}
//
$m;
if($command=="thumbsup"){
$c=new feedbackcomment($id,$username,$commentid);
$c->thumbedup();}
else if($command=="thumbsdown"){
$c=new feedbackcomment($id,$username,$commentid);
$c->thumbeddown();}
else if($command=="insertcomment"){
$c=new commentinsert($id,$username, $contentcomment);
$c->insertcomment();}
else if($command=="voteups"){
$c=new feedbackanalysis($id, $username, $commentid);
$c->voteups(); }
else if($command=="insertcommentreply"){
$c=new commentreplyinsert($id,$username, $contentcomment,$commentid);
$c->insertcommentreply();}
else if($command=="report"){
$c=new admincomment($commentid);
$m=$c->report($contentcomment,$username);}
else if($command=="deletecomment"){
$c=new admincomment($commentid);
$m=$c->delete();}
else if($command=="insertanalysis"){
$c=new commentinsert($id,$username, $contentcomment);
$m=$c->insertanalysis();}
else if($command=="updatecomment"){
$c=new admincomment($commentid);
$m=$c->update($contentcomment);}


//$cdb->thumbedup();

?>
