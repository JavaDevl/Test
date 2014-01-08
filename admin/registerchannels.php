<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
           <style>

            h1{text-align:center;}
            .maindiv
            {
display:block;
position:relative;
margin-left:20px;
                width:400px;
                border:solid 2px #2576ad;
                float:left;
            }
           .maindiv input{
/*               float:left;
               display:block;*/
                margin-left: 5px;
padding:4px 2px;

            }
            label
            {
float:left;
               margin-left: auto;
    margin-right: auto;
    display:block;
                margin:2px 0 20px 10px;

            }
            .submit
            {

                width:200px;
            }
      
        </style>

    </head>
    <body>
        
        <div class="maindiv">
                    <form name="chanreg" action="registerdb.php" enctype="multipart/form-data" method="post"/>

            <h1>Channel Registration form</h1>
            <label>
            Channel name:<input type="text" name="username"/>
        </label>
     <label>
            RSS URL:<input type="text" style="width:200px" name="url"/>
        </label>
     <label>
            Country:<input type="text" name="country"/>
        </label>
             <label>
            Statistics:<input type="text" name="statistics"/>
        </label>  <br> 
        <input name="MAX_FILE_SIZE" value="102400" type="hidden">
        <label>
<input name="image" accept="image/jpeg" type="file"></label>
        <label><input type="submit" name="" class="submit"  value="insert"/> 
        </label></form></div>
        
                <div class="maindiv">
                    <form name="chanreg" method="post"/>

            <h1>Channel Registration form</h1>
            <label>
            Channel name:<input type="text" name="name"/>
        </label>
     <label>
            RSS URL:<input type="text" style="width:200px" name="url"/>
        </label>
     <label>
            Country:<input type="text" name="country"/>
        </label>
             <label>
            Statistics:<input type="text" name="statistics"/>
        </label>  <br> <label><input type="submit" name="" class="submit"  value="insert"/> </label></form></div>

       
    </body>
</html>
