
       <?php 
                include '../../db/DbConnector.php';
                $db=new DbConnector();
                if($_POST['id']=='tr')
                    
                $fm=$db->fetchmyArray("select title, images,id from articles where confirmed>0 order by hits desc");
                 else
                    
                $fm=$db->fetchmyArray("select title, images,id from articles where confirmed>0 order by title desc");

                for ($i=0;$i<5;$i++)
                {
                    echo "<a href='articleread.php?id= ".$fm[$i][2]."' ><div> 
<img ". $fm[$i][1]."  />  ".$fm[$i][0]."             
</div></a>";
                }
                ?>
 