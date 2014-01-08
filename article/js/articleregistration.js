 $(document).ready(function() { 
                     $('#tagger').tagsInput({width:'auto'});
                     $("#tags").select2(); $("#categ").select2(); });
                function add(value1) {
  return function doAdd(value2) {
    return value1 + value2;
  };
}
var increment = add(-1);

                function YouTubeGetID(url){
 var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/;

var match = url.match(regExp);

if (match&&match[2].length==11){

return match[2];

}else{
}}
             function insertAfter( referenceNode, newNode )
{
    referenceNode.parentNode.insertBefore( newNode, referenceNode.nextSibling );
}      
increment=0;
arr=[""];
    function embedvideo()
    {
        var es=document.getElementById("embedsrc").value;
        var id=YouTubeGetID(es);    

        if (es=="")
            {alert("Please insert at least a youtube url !"); return false;}
            else if(typeof (id)=== "undefined")
                 {alert("Invalid link"); return false;}
                 else if(arr.indexOf(id)!=-1)
                     {
                         alert("this link is already inputted!");
                 return false;    
                 }
        else {
     var newDiv = document.createElement("iframe");
     var newDiv1 = document.createElement("input");
newDiv.width="250";
newDiv.height="150";
newDiv.id="iframe"+id;
newDiv.src="//www.youtube.com/embed/"+id;
newDiv.frameborder="0";
newDiv1.id="hidden"+id;
var foo = increment++;

newDiv1.type="hidden";
newDiv1.name="youtube["+foo+"]";

newDiv1.value=id;
document.getElementById("embedlabel").appendChild(newDiv);
document.getElementById("embedlabel").appendChild(newDiv1);
arr.push(id);
       return id; }
}     


document.getElementById("embedbutton").onclick=function()
{
    var a=embedvideo();
    if(a)
        {
            var prev=$("#embedvideos").val();
            var prevadder="";
            if(prev=="")
                prevadder=prev;
                else
                    prevadder=prev+"&";
                
            $("#embedvideos").val(prevadder+a);
            
      

        }
    
}