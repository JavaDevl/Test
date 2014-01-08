<html><head>
    </head>
    <script>
        </script>
    <script src="optional.js" > </script>
    <body>
        <div id="message"></div>

        <div id="msg"></div> 
        <script>
            var n = [
	[1,2,3],
	4,
	[
		[5,6],
		7
	],
	[8,9]
];
                           
                           var asr=document.getElementById("msg");

           var Recursive =function (a)
           { 
               asr.innerHTML+="--------------------Restart recurse<br>"
                if(a.constructor==Array)
               {               
                   
               asr.innerHTML+="---------it is an Array<br>"

               for(var i=0;i<a.length;i++)
            {
                asr.innerHTML+="----Inside recurse loop recursed "+i+" a: "+a+" <br>"
                 Recursive(a[i]);
 } } 



else      asr.innerHTML+=a+"<br>"
           }
           Recursive(n);
            
//Lib.Out.Write({message: ["Hello", "world", 2, "from", "JavaScript"],
//	end: 2,
//	color: "#C00"
//});
        </script>    
    </body>
</html>