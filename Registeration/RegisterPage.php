<html>
    <head>
        <title>Registration Form Page</title>
<?php session_start(); ?>
 <link rel="stylesheet" href="reg.css" />

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script type="text/javascript" >
   
       this.myarr=[false, false, false, false, false, false];

   
     function regform(id){
     this.id=id;
     this.err="";
     this.arr=function(arr,bool)
     {
         myarr[arr]=bool;
     }
     
     function strmatch(regexp,str)
            {
                if( str.match(regexp))           return true;
                else                        return false;
            }
            
            
            //---------check whether the country is valid----------
            
         this.countryvalid=function()
{
    var states = new Array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", " Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom|UK", "United States|US|USA", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
       var bool=false;
       var stateregex="^(";
       stateregex+=states.join("|")
      stateregex+=")$";
var re = new RegExp(stateregex, "i");
   if(this.getval().match(re))this.display(true,"");
        else this.display(false,"Are you Sure this country exists is on Earth ?");
}

            //---------check whether username is valid----------

     this.isCharValid=function()
{
        var regexp=/^[a-zA-Z]+[a-z0-9_-]+$/i;
        if(strmatch(regexp,this.getval())) this.display(true,"");
        else this.display(false,"*Sorry! Name should start with a letter \n *Only alphanumeric, _ and - are allowed");
}
     
                 //---------check whether Email is valid----------

     
     this.ValidateEmail=function()
{
    var regexp=/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/;
if(strmatch(regexp,this.getval()))
    this.display(true,"");
else
    this.display(false,"*Invalid Email")
}
     
     
     this.ValidDate=function()
   {
       var now=new Date();
       
       if((now.getFullYear()-this.getval())<10)
          this.display(false,"*Oh?! Are you sure you are less than 10 years?")
   
   else
       this.display(true,"");
        
   }
this.ValidBirthYear=function()
{
    var regexp=/(^(20|19)[0-9]{2}$)/;
      if(strmatch(regexp,this.getval())) this.display(true,"");
          else this.display(false,"*Invalid date");

}
      this.isstringsmatch=function(str2)
{ 
if(this.getval()==str2)
    {
              this.display(true,"");
    }
    else
        {
             this.display(false,"*Oops?! wrong password confirmation.\n please retype the password ")
        }
}
     
     this.display=function(bool,msg)
     {
         var stat;
         if(!bool){
            stat="<label>&nbsp;</label><small class='error'>"+msg+"</small>"; 
            document.getElementById(this.id+"err").innerHTML=stat; 
  throw "";}
        else {
            stat="<img src='../icons/check.png' title='Correct!' class='status'>"; document.getElementById(this.id+"err").innerHTML=stat;}
             
               }
     
     this.fieldempty=function()
     {
         if(this.getval()=="")
                 this.display(false,"*Field should not be empty")
             else
                     this.display(true,"");
                 
     }
     
   this.status=function(bool,spanid){
         if(bool) document.getElementById(spanid).innerHTML = "<img src='../icons/check.png' class='status'>";
         else     document.getElementById(spanid).innerHTML = "<img src='../icons/wrong.png' class='status'>";
 }
     
     this.getid=function (){return document.getElementById(this.id);}
    this.getval=function(){return this.getid().value}
    this.getattrname=function(){return this.getid().getAttribute("name")}
    this.strmatch= function  ()    {
          if(  this.str.match(regexp)) return true;
                else                   return false;
            };
            
    this.onlynumbers= function ()
{
  var regexp=/[0-9]/;
  return this.strmatch(regexp,this.getval());
}    

this.MinMaxChar=function(minsize, maxsize)
{
    if(this.getval().length<=maxsize && this.getval().length>=minsize)
        this.display(true, "");
    else 
        this.display(false, "Please make sure your "+this.getattrname()+" is between "+minsize+" and "+maxsize+" characters");
}
 }


function username_check(){	
var username = $('#nameid').val();
jQuery.ajax({
   type: "POST",
   url: "check.php",
   data: 'username='+ username,
   cache: false,
   success: function(response){
       var tr=new triggernameid();
if(response == 1){
    tr.refuse();
        $('#nameiderr').html("<label>&nbsp;</label><small class='error'>This username already exist\n Please choose another one </small>");
	}else{
            tr.okay();
	     }
}
});
}

                
</script>

                    
    </head>
    <body>
      
<?php  include '../menubar/index.php' ?>
        
<form id="form" name="form" method="post" class="myform" action="regres.php" >
                <div id="errordiv">Complete the form before submitting</div>


    <div class="stylized" >
            
<p>Registration Form</p>

<label>Username
    <span class="small">Choose a Username </span>

</label>
<input type="text" name="username" id="nameid" />
<span style="float:left" id="nameiderr"></span>
<label>Email
<span class="small">Add a valid Email Address</span>
</label>
                     
<input type="text" name="mail"   id="emailid" /><span style="float:left;" id="emailiderr">
    </span> 
<label>Birthday
<span class="small">Type only the year</span>
</label>
<input type="text" name="birth" placeholder="For instance: 1976" id="birthid" /><span style="float:left" id="birthiderr"></span>

<label>Password
<span class="small">Min. size 8 chars </span>
</label>
<input type="text" name="password"  id="passid" ></input><span  style="float:left;" id="passiderr"> </span>
<label>Confirm Password
<span class="small">Confirm your password</span></label>
<input type="text" name="confirmpassword" id="conpassid" /><span  style="float:left;" id="conpassiderr"></span>


<div class="spacer"></div>
            </div>
    <br>
        <div class="stylized" >

<p>Location</p>
<script>
         $.getJSON('../test.php', function(data) {
                $('#tags' ).autocomplete({
                    source: data
                });
            });  </script>
<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>"> 
<div class="ui-widget">
    <label >Country <span class="small" for="tags">Where do you come from ?</span></label>
  <input name="country" id="tags" /><span id="tagserr"></span>

</div>
   <br><br>
<button type="submit">Sign-up</button>
<div class="spacer"></div>
        </div>
    
    

</form>
        <script>
            
document.forms[0].onsubmit =
     function() {

for (i=0;i<myarr.length;i++)
 { 
     if(!myarr[i])      
        {
            document.getElementById("errordiv").style.visibility="visible";
            return false; break;}
 }   
     return true;
 }
                 $(document).ready(function(){

    
$('#nameid').keyup(username_check)
.blur(username_check);
});
            
                     document.getElementById("tags").onblur= function()
                {
                  var reg=new regform("tags");
                  try{
                  reg.fieldempty();
                  reg.countryvalid();
                  reg.arr(5,true);
              }catch(err)  {reg.arr(5,false);}
      }  
       

        document.getElementById("emailid").onblur= function()
                {
                  var reg=new regform("emailid");
                  try{
                  reg.fieldempty();
                  reg.ValidateEmail();
                  reg.arr(1,true);
              }catch(err)  {reg.arr(1,false);}
      }  
            function triggernameid(){
                
           this.okay=function()
                {
                  var reg=new regform("nameid");
                  try{
                  reg.fieldempty();
                  reg.MinMaxChar(5,20);
                  reg.isCharValid();
                  reg.arr(0,true);
              }catch(err)  {reg.arr(0,false);}
      }  
           this.refuse=function(){document.getElementById("nameid").onblur==function(){null}
}}  
        
        document.getElementById("passid").onblur= function()
                {
                  var reg=new regform("passid");
                  try{
                  reg.fieldempty();
                  reg.MinMaxChar(8,20);
reg.arr(3,true);
              }catch(err)  {reg.arr(3,false);}
      }  
      
      document.getElementById("birthid").onblur= function()
                {
                  var reg=new regform("birthid");
                  try{
                  reg.fieldempty();
                  reg.ValidBirthYear();
                  reg.ValidDate();
                  reg.arr(2,true);
              }catch(err)  {reg.arr(2,false);}
      }
      
                document.getElementById("conpassid").onblur= function()
                {
                  var reg=new regform("conpassid");
                  try{
                  reg.fieldempty();
                  reg.isstringsmatch( document.getElementById("passid").value);
                  reg.arr(4,true);
              }catch(err)  {reg.arr(4,false);}
      }

            </script>
<?php include "../menubar/footer.php"; ?>
    </body>

</html>