<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
          <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
 <script src="../ckeditor/ckeditor.js"></script>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
         <script type="text/javascript" src="js/parsley.js"></script>
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
           <script src="../xeditable/select2/select2.js"></script>
<link href="../xeditable/select2/select2.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="http://xoxco.com/projects/code/tagsinput/jquery.tagsinput.css" />
	<script type="text/javascript" src="http://xoxco.com/projects/code/tagsinput/jquery.tagsinput.js"></script>

              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
   <!--<script src="ckeditor/ckeditor.js"></script>-->
  <link href="css/articleregistration.css" rel="stylesheet" />

    </head>
    <body>
                 <?php
                 session_start();
                 @include '../menubar/index.php';?>   

        <form  method="post" action=    "articecheck.php" enctype="multipart/form-data" data-validate="parsley" >
        <div id="whole">
            <div id="head"><h1>Add item</h1></div>
            <div id="body">
                <label >
                    <span class="spani">Title:</span><input data-trigger="change" data-required="true" data-rangelength="[5,100]"  type="textfield" name="title"/>
                </label>
                <div style=""></div>
                  <label id="embedlabel">
                  <span class="spani" >## Embed Youtube</span><input type="text" id="embedsrc" style="width:400px" name="embed" /><input type="button" id="embedbutton" value="Embed Video" style=" margin-left: 5px; width:95px;" name="embedvideo"/>
                </label>
                <input type="hidden" value="" id="embedvideos" name="embedvideos"/>
                <br>
                <label>
                     
                    Body: (Not less than 300 characters) 
                                                        <textarea id="editor" data-trigger="change" data-required="true" data-minlength="300" name="description"></textarea>

<script>
    CKEDITOR.replace( 'editor');
</script>                 </label>

                               
                <script>$.getJSON(' ../test.php', function(data) {
                $('#tags' ).autocomplete({
                    source: data
                });
            });</script>
                   <label>
                    <span class="spani">Event Location:</span><select data-trigger="blur" id="tags" class="smallinput" type="textfield" name="location">
                        <?php include '../countries/countrieslist.html'?>
                    </select>
                   </label>
                 <label><br>
                    <span class="spani">Category:</span>
                    <select data-required="true" style="width:150px" size="6" id="categ" name="Category">
                        <option value=""></option>

                        <optgroup label="Regions">
<option value="world">World</option>
<option value="namerica">N. America</option>
<option value="europe">Europe</option>
<option value="me">Middle-East</option>
<option value="oceania">Oceania</option></optgroup>
                         <optgroup label="Category">
<option value="bus">Business</option>
<option value="ent">Entertainment</option>
<option value="health">Health</option>
<option value="politics">Politics</option>
<option value="tech">Technology</option>
<option value="Science">Science</option></optgroup>
                    </select>
                </label>
                
                
                <label>
                   <span class="spani" >## Tags (Words separated by comma)
                    </span><input data-required="true" data-rangelength="[5,120]" placeholder="For Instance: USA, Obama, economy etc..." type="textfield" id="tagger" name="keyword"/>
                    
                    
                </label>
                                 
                   
            </div>
            <div style="margin:0px;"id="foot">
              <input type="hidden" name="word" value="0"/>  
              <input type="hidden" name="char" value="0"/>  
                <input id="submit" type="submit" />
            </div>
        </div>
                </form>
        <script>
        
            
            <?php
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', "//www.youtube.com/embed/px-GyRH5nTQ", $match)) {
    echo $match[1];
        }        ?>
        
    </script>
                <script src="js/articleregistration.js">
                
    </script>
             <?php include '../menubar/footer.php';?>  
    </body>
</html>
