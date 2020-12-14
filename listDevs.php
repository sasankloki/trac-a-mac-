<?php
include_once('config.php');

$output = $db->query('SELECT * FROM info');


while ($info = $output->fetchArray()) {	
	echo "\n";
	echo $info[0]. "|" .$info[1]. "|" .$info[2]. "|" .$info[3]. "|" .$info[4]. "|" .$info[5]. "|" .$info[6]."|";

    if (empty($info[0]) && empty($info[1]) && empty($info[2]) && empty($info[3]) && empty($info[4]) && empty($info[5]) &&  empty($info[6])){
    	echo "no data";

    }

}


$db->close();

?>
