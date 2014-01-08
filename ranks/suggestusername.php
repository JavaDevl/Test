<?php
include '../db/DbConnector.php';
$db=new DbConnector();
if ( !isset($_REQUEST['term']) )
	exit;
$rs=$db->query("select username, country, level from users where username like '%". mysql_real_escape_string($_REQUEST['term']) ."%' order by username asc limit 0,10" );
$data=array();
include 'sortlvl.php';
include '../countrylist.php';
$srt=new SortLvl();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
	{
		$data[] = array(
			'label' => $row['username'] .', '.country::GetCountry($row['country']) .', '. $srt->sortrank($row['level'].' ') ,
			'value' => $row['username']
		);
	}
}
echo json_encode($data);
flush();
?>