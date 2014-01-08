<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
<?php   session_start();
            include '../countrylist.php';?>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
      <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.5/jqueryui-editable/css/jqueryui-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.5/jqueryui-editable/js/jqueryui-editable.min.js"></script>
<script src="../xeditable/select2/select2.js"></script>
<link href="../xeditable/select2/select2.css" rel="stylesheet">
<style>
    body
    {
        background-color: #eee;
    }
    #option, #privacy,#profile
    {
     
        
        margin-top:30px;
        color:#333;
        background-color: #fff;
       padding-top: 30px;
        padding-bottom: 20px;
        padding-left: 40px;
        border-radius: 5px;
        border:solid 1px #993333;
    }
    #setting h3
    {
        position:absolute;
        background-color: #fff;
        display: inline-block;
        margin-top: -42px;
        color:#993333;
    }
   
    #setting
    {
        
        border-radius: 10px;
        padding:30px;
            background-color:#fff;
margin-top:40px;
border:10px solid #993333;
        margin-right:auto;
        margin-left:auto;
        width:600px;
        
    }
    .sada
    { 
        
        margin-left: 40px;
        width:150px;
display:inline-block;
    }
   #setting label
   {
      margin-top: 7px;
       display: block;
   }
    #setting a
    {
        color:#333;
    }   
</style>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" >
 $(document).ready(function() { 
            $('#photoimg').change(function(){ 
				$("#preview").html('');
				$("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
			$("#imageform").ajaxForm({
						target: '#preview'
		}).submit();
	});
}); 
</script>
<script>      
$.fn.editable.defaults.mode = 'inline';
$(document).ready(function() {
    var urli='settingdb.php';
                $('#country').editable(
{
    
        source: [  <?php   
        foreach (country::$countrylist as $key => $value) {  
            ?>
              {id: '<?php echo $key ?>',text: '<?php echo $value ?>'},
              <?php }?>
           ],
   select2:{
        width: 200
    },
url: urli,
success:function (){location.reload()}
   } );

    $('#birthdate').editable({
   
    
        source: [  <?php   
        for ($i=1930; $i<date('Y')-12;$i++) {   
            ?>
              {id: '<?php echo $i ?>',text: '<?php echo $i ?>'},
              <?php }?>
           ],

url: urli,

select2:{
        width: 100
    }    
   
    });
    $('#email').editable();
    $('#gender').editable();
});


  </script>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
                 <?php include '../menubar/index.php';?>   

<?php 

$db=$dbcach;
$user=$_SESSION['username'];
$fm=$db->fetchmyArray('select Birthdate, password, country, email, sexe, sexe_display, country_display, birth_display, avatar from users where username="'.$user.'"');
?>

        <div id="setting">
                    <div id="profile">
            <h3>Profile</h3>
<form id="imageform" method="post" enctype="multipart/form-data" action='ajaxupload.php'>
    <label>
        <input type="file" id="photoimg" style="float:left; display:inline-block" name="photoimg"  />
              <img id="avat1" style="float:left; width: 150px; height:150px; " src="data:image/png;base64,<?php echo base64_encode($fm[0][8]) ?>" />

    </span>

    </label></form>
            <div style="clear:both"></div>
            <div id='preview' align="center" ></div>              </div>
        <div id="option">
            <h3>Option</h3>
            <label>  <div class="sada">  Birth <b>year</b> : </div><a href="#" id="birthdate" data-type="select2" data-value="<?php echo $fm[0][0] ?>" data-pk="sana"  data-title="Enter username"><?php echo $fm[0][0] ?></a></label>
         <label>    <div class="sada">   Country : </div></span><a href="#" id="country" data-type="select2" data-pk="balad"  data-value="<?php echo strtoupper($fm[0][2]) ?>" data-title="Enter country">
              <?php echo country::GetCountry($fm[0][2]) ?></a><img style="margin-left: 10px" src="../flags/<?php echo strtoupper($fm[0][2]) ?>.gif"/></label>
       <label>    ##  <div class="sada">  Email : </div></span><a href="#" id="email" data-type="email" data-pk="1" data-url="/post" data-title="Enter email"><?php echo $fm[0][3] ?></a></label>
       <label>      <div class="sada">  Password :</div></span><a href="changepassword.php" id="password" data-pk="1" data-url="/post" data-title="Enter password"> Change Password</a></label>
       <label>     ## <div class="sada">  Gender :  </div></span><a href="#" id="gender" data-type="text" data-pk="1" data-url="/post" data-title="Enter gender"><?php echo $fm[0][4] ?></a></label>
        </div>
        <div id="privacy">
            <h3>Privacy</h3>
       <label>      <div class="sada">  Display country: </div><a href="#" id="countrydisplay" data-type="select" data-value="<?php echo $fm[0]['country_display'] ?>" data-pk="khscountry" data-original-title="Select country visibility"><?php if($fm[0]['country_display']==0) echo "Visible"; else echo "Hidden"; ?></a></label>
      <label>      <div class="sada">   Display birth date: </div><a href="#" id="birthdisplay" data-type="select" data-value="<?php echo $fm[0]['birth_display'] ?>" data-pk="khssana" data-original-title="Select birth date visibility"><?php if($fm[0]['birth_display']==0) echo "Visible"; else echo "Hidden"; ?></a></label>
     <label>       <div class="sada">   Display gender: </div><a href="#" id="sexedisplay" data-type="select" data-value="<?php echo $fm[0]['sexe_display'] ?>" data-pk="khsjens" data-original-title="Select gender visibility"><?php if($fm[0]['sexe_display']==0) echo "Visible"; else echo "Hidden"; ?></a></label>
            </div>
        </div>
                     <?php include '../menubar/footer.php';?>  

        <script>
     $('#countrydisplay').editable({
         
        value: <?php echo $fm[0]['country_display']; ?>,    
        source: [
              {value: 0, text: 'Visible'},
              {value: 1, text: 'Hidden'}
           ],
           url:'settingdb.php'
    });
         $('#birthdisplay').editable({
         
        value: <?php echo $fm[0]['birth_display']; ?>,    
        source: [
              {value: 0, text: 'Visible'},
              {value: 1, text: 'Hidden'}
           ],
           url:'settingdb.php'
    });
         $('#sexedisplay').editable({
        value: <?php echo $fm[0]['sexe_display']; ?>,    
        source: [
              {value: 0, text: 'Visible'},
              {value: 1, text: 'Hidden'}
           ],
           
           url:'settingdb.php'
    }); 
    </script>
        </div>
    </body>
</html>
