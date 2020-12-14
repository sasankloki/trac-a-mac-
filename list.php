<?php

include('config.php');

$output = $db->query('SELECT * FROM List');

while($row = $output->fetchArray(SQLITE3_ASSOC) ) {
	echo  $row['IP']. "|" .$row['VLANs']. "|" .$row['PORT']. "|" .$row['MACS']. "\n";
}
$db->close();
?>
