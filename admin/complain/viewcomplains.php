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
       table
       {
           border:solid 2px #993333;
          margin-right: auto;
          margin-left: auto;
          margin-top: 30px;
           
       }
       .data:nth-child(odd) {
    background-color: #eeeeee;
}
       #header
       {
           font-weight: bold;
           text-align: center;
           background-color: #993333;
           color:#fff;
       }
       tr, td
       {
           padding:4px;
           border:solid 1px #993333;
       }
       
   </style>
    </head>
   
    <body>
        <?php  
        session_start();
        include "../../menubar/index.php";
        $db=new DbConnector();
       $fma= $db->fetchmyArray("
           select username, reasons, complain_category, complained_content_id,  date_added , 
case complain_category
when 'comments' 
THEN (Select comment_content from comments where comment_id=complain.complained_content_id limit 1)
end
from complain 
where responded = 0  order by date_added  asc;");
        ?>
        <table>
            <tr id="header">
                <td>From</td><td>Category</td><td>Reasons</td><td>Content</td><td>Date reported</td><td>Content Id</td><td>Action</td>
                            </tr>
       <?php
               for($i=0;$i<$db->numrows;$i++){
       echo "<tr class='data'><td>".$fma[$i][0]."</td><td>".$fma[$i][2]."</td><td>".$fma[$i][1]."</td>
             <td>".$fma[$i][5]."</td><td>".$fma[$i][4]."</td><td>".$fma[$i][3]."</td>
<td><select>
<option value=''>Choose action:</option>
<option value='0'>Ignore</option>
<option value='1'>Confirm without action</option>
<option value='2'>Confirm +  Warning</option>
<option value='3'>Confirm + Warning + delete</option>
<option value='4'>Confirm + Infraction + delete</option>
<option value='5'>Reject</option>
<option value='6'>Reject + Warn Sender</option>
<option value='7'>Reject+ Infract Sender</option>
</select></td>                 
</tr>";
               } ?>
        </table>
                     <?php include '../../menubar/footer.php';?>  

    </body>
</html>
