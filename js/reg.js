  function regform(id){
     this.id=id;
     this.err="";
     function strmatch(regexp,str)
            {
                if( str.match(regexp))           return true;
                else                        return false;
            }
     
     this.isCharValid=function()
{
        var regexp=/^[a-z]+[a-z0-9_-]$/i;
        if(strmatch(regexp,this.getval())) this.display(true,"");
        else this.display(false,"*Sorry! Name should stard with a letter \n *Only alphanumeric, _ and - are allowed");
}
     
     
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
          this.display(false,"*Oh?! Are you sure you are less then 10 years?")
   
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
             this.display(false,"*Oops?! wrong password confirmation.\n please retype the retype the password ")
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
            stat="<img src='icons/check.png' title='correct' class='status'>"; document.getElementById(this.id+"err").innerHTML=stat;}
             
               }
     
     this.fieldempty=function()
     {
         if(this.getval()=="")
                 this.display(false,"*Field should not be empty")
             else
                     this.display(true,"");
                 
     }
     
   this.status=function(bool,spanid){
         if(bool) document.getElementById(spanid).innerHTML = "<img src='icons/check.png' class='status'>";
         else     document.getElementById(spanid).innerHTML = "<img src='icons/wrong.png' class='status'>";
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