<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
          <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript" language="javascript" src="json/comparedb.json"></script> 

        <style>
            body{
                  
            }
            #maincomp
            {
                border:solid 1px #000;
                margin-right: auto;
                height:auto;
                margin-left: auto;
                width:1100px;
                text-align: center;

            }
            
            .submain
            {
                display: inline-block;
                
            }
            .submain .alies img{
              margin-left: 1px;  
            }
         
            #fsapos .alies>div:first-child
            {
                background-color: #008900;
                display: inline-block;
                color:#fff;
                padding: 2px;
                margin-bottom:4px;
                text-align: left;   
            }
            
            .submain .alies
            {
                border: solid 2px ;
                height:50px;
            }
            
            #saapos .alies>div:first-child
            {
                background-color: #7f0000;
                display: inline-block;
                color:#fff;
                padding: 2px;
                margin-bottom:4px;
            }
            .submain .alies div
            {
                display: inline-block;
                 margin-top: 10px; 
            }
            #saapos
            {
                border-left:#000 10px solid;
                margin-left:10px; padding-left:45px; 
                padding-right: 20px;
            }
           
            .submain .alies div>img
            {
                margin-bottom: -2px;
                display:inline-block;
            }
            .data
            {
                display:inline-block;
                
            }
            #middledata
            {
                
                display:inline-block;
                border-bottom:#fff;
                border-top:#fff;
                width:102px;
                margin:0px -4px;
            }
            #maincomp #fsadata .thread
            {
                padding:3px;
                text-align: left;
                margin-top: 5px;
                margin:4px;
                border:solid 1px #006600;
                float: left;
                background-color: #eef7ee;
            }
             #maincomp #saadata .thread
            {
                padding:3px;
                text-align: left;
                margin-top: 5px;
                margin:4px;
                border:solid 1px #993333;
                float: left;
                background-color: #f2e6e6;

            }
            #maincomp #saadata .thread .title
            {
                color:#993333;
                padding: 3px;
                border: solid #993333 1px;
                border-radius: 3px;
                font-weight: bold;
                background-color: #eee;
            }
            #maincomp #fsadata .thread .title
            {
                color:#006600;
                padding: 3px;
                border: solid #008900 1px;
                border-radius: 3px;
                background-color: #eee;
                font-weight: bold;
            }
           
            .title img
            {
                float:right;
            }
            #middledata div{
                margin-top:5px; 
            }
            
            #fsadata .thread .title .date
            {
                border:solid 1px #008900; 
                font-weight:bold; 
                border-left:#fff; 
                color: #008900;  
                position:absolute;  
                background-color:#bfe1bf; 
                padding:2px 2px 2px 25px; 
                margin-left:432px; 
                margin-top:-25px; 
                width:80px; 
                border-radius:5px;
            }
            .thread .title .date
            {
                
            }
                        #saadata .thread .title .date
{
            border:solid 1px #993333; 
            margin-left:-117px;  
            font-weight:bold; 
            border-right:#fff; 
            color: #993333;  
            position:absolute;  
            background-color:#e5cccc; 
            padding:2px 25px 2px 2px;  
            margin-top:-25px; 
            width:80px; 
            border-radius:5px;
}
        </style>
                        <script>
$(document).ready(function(e) {

var arr=items.threads;
function processembed(url)

{
    
    switch(url[1])
    {
        case "liveleak":return '<iframe width="430" height="360" src="'+url[0]+'" frameborder="0" allowfullscreen></iframe>'; break;
        case "youtube":return '<iframe width="640" height="360" src="'+url[0]+'" frameborder="0" allowfullscreen></iframe>'; break;
            
    }
}

function inputdata(date2){
    date2=new Date(date2).getTime();
   
for(var i=0;i<arr.length;i++)
{
  /*  var date=new Date(arr[i].datetime).getTime();
    
    if(date2<date)
        {
            alert(i+" | "+new Date(date2)+" : "+new Date(date));
            break
            */
}

}
inputdata("2012-05-02");

/*
 *Display the data from JSON the HTML
 **/
var style="style='margin-top:45px'";
var k=0;
var stl="";
var embed="";
for(var i=0;i<arr.length;i++)
{
    stl="";
    embed="";
if(arr[i].side=="fsa")
{
    if(k==-1) stl=style;
$("#fsadata").append("<div class='thread' "+stl+"><div class='title'>"+arr[i].title+" <div class='date'>"+arr[i].datetime+" </div><img src='pics/status/"+arr[i].status+".png' title='confirmed'/> </div><br> \n\
<div class='description'>"+  arr[i].description+" <br> <iframe width='430' height='360' src="+arr[i].embedvideo+" frameborder='0' allowfullscreen></iframe></div>\n\
\n\</div>");
                    k=1;
 }
 else{
     if(k==1) stl=style;
         
 $("#saadata").append("<div class='thread' "+stl+"><div class='title'>"+arr[i].title+" <div class='date'>"+arr[i].datetime+" </div><img src='pics/status/"+arr[i].status+".png' title='confirmed'/> </div><br> \n\
<div class='description'>"+  arr[i].description+" <br><iframe width='490' height='360' src="+arr[i].embedvideo+" frameborder='0' allowfullscreen></iframe> </div>\n\
\n\</div>");
  k=-1;                
}}
/*
 *End of Display
 **/

/*
 *Manage the Height of #middledata so it will always
 *be complementing with the height of #maincomp
 **/
$("#middledata").css("height",$("#maincomp").css("height"));

}



);

            </script>
    </head>
    <body>
        <div id="maincomp">
        <div class="submain"  id="fsapos" style="margin-left:-20px">
            <div class="head">
              <img title="Free Syrian Army" src="pics/fsaflag.jpg" />
            </div>       
            <div class="alies">  
                
                <div>Allies</div> <div style="   margin-left:2px">
          <img src="pics/allies/ISIL.png" title="Islamic State of Iraq and Levant"/>
          <img src="pics/allies/islamicfront.png" title="Islamic Front"/>
              </div>
            </div>
              
            
        </div>
            
        <div class="submain"  id="saapos" style="float:right; " >
            <div class="head">
                
                              <img title="Syrian Arabic Army"  src="pics/saaflag.jpg" />
            </div>
                        <div class="alies">
                            <div>Allies</div> 
                            <img src="pics/allies/hezb.png" title="Hezbollah"/>
                            <img src="pics/allies/iran.png" title="Iran"/>
                  <img src="pics/allies/PFLP.png" title="PFLP"/>
                            <img src="pics/allies/Asa.png" style="border:solid 1px" title="Asaib Ahl Alhak"/>
                        </div>

            
        
        </div>
        <div id="fsadata" class="data" style="width:446px; float:left; margin-left: 20px; padding-right: -2px;    ">
                
                
            </div>
            
            <div id="middledata" style="float:left; margin:0 1px 0 1px;">
                
            </div>
            <div id="saadata" class="data" style="width:506px;  float:left;">
                
                
            </div>
            <div style="clear:both"></div>
        </div>       
    </body>
</html>
