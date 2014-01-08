<script>
    $(document).ready(function(){
$("#submitimg").click(function(){
   var as=$("#prev").attr("src");

   $.ajax({
type:'POST',
url:'settingdb.php',
data:{value:as, pk:'soura'},
success:function(msg){
    alert(msg);
    alert("data successfully updated");
}
   });
})
});
</script>
<?php
error_reporting(0);
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
$path = "uploads/"; //set your folder path
$filename = $_FILES['photoimg']['tmp_name']; //get the temporary uploaded image name
$valid_formats = array("jpg", "png", "gif", "bmp", "jpeg","GIF","JPG","PNG"); //add the formats you want to upload
	
		$name = $_FILES['photoimg']['name']; //get the name of the image
		$size = $_FILES['photoimg']['size']; //get the size of the image
		if(strlen($name)) //check if the file is selected or cancelled after pressing the browse button. 
		{
			list($txt, $ext) = explode(".", $name); //extract the name and extension of the image
			if(in_array($ext,$valid_formats)) //if the file is valid go on.
			{
			if($size < 150000) // check if the file size is more than 2 mb
			{
			$actual_image_name =  str_replace(" ", "_", $txt)."_".time().".".$ext; //actual image name going to store in your folder
			$tmp = $_FILES['photoimg']['tmp_name']; 
			if(move_uploaded_file($tmp, $path.$actual_image_name)) //check the path if it is fine
				{
					move_uploaded_file($tmp, $path.$actual_image_name); //move the file to the folder
					//display the image after successfully upload
					echo 
                                        
                                        "<img src='uploads/".$actual_image_name."'  id='prev'
                                            style='border:solid 2px #000; height:150px; width:150px; margin-left:-50px; 
                                            margin-top:-40px;position:relative;border:solid 1px#000; display:inline-block;' 
                                             class='preview'>
                                            <input type='hidden' name='actual_image_name' id='actual_image_name' value='$actual_image_name' />
                                                <input type='button' id='submitimg'
                                                style=' position:absolute;margin-top:67px; background-color:#993333; color:#fff; font-size:16px;
                                                margin-left:5px;display:inline-block;' value='Update' />";
                                 echo "<script>
document.getElementById('avat1').style.display='none';                                     
</script>";      
				}
			else
				{
				echo "failed";
				}
			}
			else
			{
				echo "Image file size max 2 MB";					
			}
			}
			else
			{
				echo "Invalid file format..";	
			}
		}
		else
		{		
			echo "Please select image..!";
		}		
	exit;
	}
?>
