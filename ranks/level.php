<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
<title>jQuery UI Progressbar - Default functionality</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
    </head>
    <style>
      body
      {
          background-color: #eee;
      }
        #progressbar1
        {
             background:#cc9a9d;;
        }
            .progressbar 
        {
            background:#eee;
        }
     #progressbar1 > .ui-progressbar-value 
        {
   background:#cc9a9d;
   border-radius: 60px;
   border:inherit;
}
       .level    #progressbar2 > .ui-progressbar-value 
        {
   background:#323299;
   border-radius: 60px;
   border:inherit;
}
        #progressbar3 > .ui-progressbar-value 
        {
   background:#257225;
   border-radius: 60px;
   border:inherit;
}
        #progressbar4 > .ui-progressbar-value 
        {
   background:#993333;
   border-radius: 60px;
   border:inherit;
}
        
#mainpage
{
    background-color: #fff;
    margin-top: 10px;
    font-family:"Times New Roman", Times, serif;
    margin-left: auto; 
    margin-right: auto; 
    margin-top:30px;
    width:600px;
    border-radius:10px;
    border:solid 5px #993333;
    padding-left:35px;
    padding-right:35px;
    padding-bottom: 20px;
}
.progressbar
{
    width:200px; 
    height:10px; 
    display:inline-block;
}

#mainpage ul{
    font-size:16px;
}


#mainpage li{
    list-style-type:upper-roman;
    margin-left:35px;
    margin-top:3px;
}
#mar
{
    padding:5px;
    border:solid 2px #993333;  
    background: -webkit-linear-gradient(#993333, #aaa);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  float:right; margin-top: 15px;; margin-right:15px; border ;
}
.level
{
    border-radius: 10px;
    padding-left:15px;
    margin-top: 20px;
}
#level1
{
    color: #cc9a9a;
        border:solid 1px #cc9a9a;

}
#level2
{
    color: #323299;
            border:solid 1px #323299;

}
#level3
{
    color: #257225;
        border:solid 1px #257225;

}
#level4
{
    color:#993333;
        border:solid 1px #993333;

}
#mainpage h3
{
position:absolute;
    background-color: #fff;
    display:inline-block;
    margin-top:-12px;
}
#mainpage .point
{
    margin-top:40px;
}

    </style>
    <body>

</head>
<body>
 <?php         session_start();
include '../menubar/index.php';?> 
        <?php 
        
        
        $srtlvl=new SortLvl();
        $db=$dbcach;?>
        <div id="mainpage">               

            <div class="level" id="level1"><h3>L. Member</h3>
                 <?php $m=$db->fetchmyArray("select score from users where username='".$_SESSION['username']."'");
                    $score=   $m[0][0];       
                            ?>
                <h2 id="mar">Level: <?php echo $srtlvl->sortmemberlevel($score)?> | Score: <?php echo $score;?></h2>
                        
                   
                    <div class='point'>0+ points </div>
                    <div  class="progressbar" id="progressbar1"></div>
                    <div style="display:inline-block; color: #cc9a9d;;"><?php  echo  "<span style=' font-weight:bold; color:#cc9a9d;' >100% Completed!</span>"; ?></div><br>
                    <ul><b> Has access to:</b>
                        <li style="" > Add Comments</li>
                        <li> Report</li>
                        <li>Contact Us directly</li></ul> </div> 
            <div class="level" id="level2">
                 <h3>Member</h3>
                   
                    <div class='point'>25+ points </div>
                    <div  class="progressbar" id="progressbar2"></div>
                    <div style="display:inline-block; color: #323299;"><?php if($score>=20) echo  "<span style=' font-weight:bold; color:#323299' >100% Completed!</span>"; else echo sprintf("%01.2f", ($score)/20*100 )."%";?></div><br>
                    <ul><b> Additionally to:</b>
                        <li style="" value="4" > Vote for Comments</li>
                
            </div>
                    <div class="level" id="level3">
                 <h3>Advanced Member</h3>
                   
                    <div class='point'>50+ points </div>
                    <div  class="progressbar" id="progressbar3"></div>
                    <div style="display:inline-block; color: #257225;"><?php if($score>=50) echo  "<span style=' font-weight:bold; color:#257225' >100% Completed!</span>"; else echo sprintf("%01.2f", ($score)/50*100 )."%";?></div><br>
                    <ul><b> Additionally to:</b>
                        <li style="" value="5"> Vote for Analysis</li>
                
            </div>
                                        <div class="level" id="level4">
                 <h3>Super Member</h3>
                   
                    <div class='point'>100+ points </div>
                    <div  class="progressbar" id="progressbar4"></div>
                    <div style="display:inline-block; color: #993333;"><?php if($score>=100) echo  "<span style=' font-weight:bold; color:#993333' >100%  Completed!</span>"; else echo sprintf("%01.2f", ($score)/100*100 )."%";?></div><br>
                    <ul><b> Additionally to:</b>
                     <li style="" value="6"> Add Analysis</li>

                
            </div>
                      
        </div>
                 <?php include '../menubar/footer.php';?>  

            <script>

  $(document).ready(function(){
          var score=<?php echo $m[0][0] ?>;



    $( ".progressbar" ).progressbar({
      value: score, max:0
    });
        $( "#progressbar2" ).progressbar({
      value: score,
      max:20
    });
            $( "#progressbar3" ).progressbar({
      value: score,
      max:50
    });
                $( "#progressbar4" ).progressbar({
      value: score,
      max:100
    });

        
    
  });
  
  
  
  
  </script>
    </body>
</html>
