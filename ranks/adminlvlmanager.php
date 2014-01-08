<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script>
            $(document).ready(function() { 
       
	$('#zipsearch').autocomplete({source:'suggestusername.php', minLength:1});
  })  

    </script>
<style>
    #zipsearch
    
    {
        width: 300px;
    }
    form {
        border:1px solid #993333;
       margin-top:45px;
       display: inline-block;
       padding: 5px;
       border-radius: 5px;
    }
    h4
    {
        margin-top: -15px;
        margin-left: -250px;
        position: absolute;
        color:#993333;
        display: inline-block;
        background-color: #fff;
    }
    #butsubmit
    {
        border:inherit;
        padding:3px;
        border-radius: 5px;
        background-color: #993333;
        color:#fff;
    }
    #butsubmit:hover
    {
        background-color: #fff;
        color:#993333;
    font-weight: bold;
    border:solid 1px #993333;
    }
    span .desc{
display: block;        
    }
        .inp{
display: block;        
    }
    .division
    {
        text-align: left;
        float:left;
        display:block;
    }
</style>
<script>
function checklvl(lvl)
{
    if(lvl[0].value=="")
        {
            alert ("Please select a level");
            return false;
            
        }
        else
            return true;
}
</script>
    </head>
    <body>
 	         <?php
                 session_start();
                 include '../menubar/index.php';?>   
<center>
<form onsubmit="return checklvl(document.getElementsByName('lvl'))" id="theForm" method="post" action="updateuserlvl.php">
   
    
    <h4>Level Management</h4><br>
    <div class="division">
    <span class="descr"> Username </span>
	<input class="inp" name="uname" type="text" id="zipsearch" />
    </div>
    <div class="division">
	<span class="descr">Level</span>
        <select style="height:20px" class="inp" name="lvl">
            <option value=""></option>
            <option value="0">Member</option>
            <option value="1">Moderator</option>
            <option value="2">Advanced Moderator</option>
            <option value="3">Administrator</option>
            <option value="4">Super Administrator</option>
        </select> 
    </div>
        <a><input  id="butsubmit" type="submit" value="update" /></a>
</form>        </center>

        <?php 
        $db=new DbConnector();
        $fma=$db->fetchmyArray("select username, score, level, country from users where level!=0 order by level desc, score desc");
        ?>
        <table style="text-align: center; margin-left: auto; margin-right: auto; margin-top: 50px;" border="1px">
                <tr><th>Username</th><th>Country</th><th>Score</th><th>Rank</th><th>Level</th>
             
                </tr>
                <?php 
include '../countrylist.php';
                $strt=new SortLvl();
                foreach($fma as $a)
                {
                    
                    $rank= $strt->Loadllevelfile("rank.txt",(int)$a['score']);
    $myimg="<img src='icons/".strtolower($rank[0]).".png' style='height:50%; width:50%' title='$rank[1]' />";
                  echo '<tr><td>'.$a['username'].'</td><td>
'.country::GetCountryFlagbyKey(strtolower($a['country'])).'                     
</td><td><b>'.number_format($a['score']).'</b></td><td>'.$myimg.'</td><td style="padding:4px;">'.$strt->sortrank($a['level']).'</td></tr>';
                                     

                } ?>
        </table>
    </body>
</html>
