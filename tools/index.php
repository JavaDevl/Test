<?php
/*
Script provided by blog.theonlytutorials.com
You can freely use this script in any project.
ajaxupload.php is the backendscript upload script
jquery.form.js plugin is used in this project. see it in the js folder
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Easy Ajax Upload PHP Script - Theonlytutorials.com</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
</head>
<body>
<h1>Script by <a href="http://blog.theonlytutorials.com">Blog.Theonlytutorials.Com</a></h1>
<form id="imageform" method="post" enctype="multipart/form-data" action='ajaxupload.php'>
<span id="pimg"><input type="file" id="photoimg" name="photoimg"  /></span>
</form>
<div id='preview' align="center" >
</div>
</body>
</html>
