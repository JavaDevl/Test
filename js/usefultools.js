 
            function strmatch(regexp,str)
            {
                if( str.match(regexp))           return true;
                else                        return false;
            }
 
 
 //class regform with constructor id
 

 
 /////////////////////////////////
 
function ValidateEmail(str)
{
    var regexp=/^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$/;
return strmatch(regexp,str);
}

  function ValidDate(str)
   {
       var now=new Date();
       
           alert(now.getFullYear()-str);
       if((now.getFullYear()-str)<10)
           return false;
   
   else
       return true;
        
   }
function ValidBirthYear(str)
{
    var regexp=/(^(20|19)[0-9]{2}$)/;
      return strmatch(regexp,str);

}
function MinMaxChar(str, minsize, maxsize)
{
    if(str.length<=maxsize && str.length>=minsize)
        return true;
    else return false;
}

function isCharValid(str)
{
        var regexp=/[0-9a-z\-_\.]/i;
        strmatch(regexp,str);
}

    function isstringsmatch(str1,str2)
{ 
strmatch(regexp,str);
}