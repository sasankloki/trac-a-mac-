<?php
include_once('config.php');

if (empty($_GET)) {
    echo "FALSE";
    }
else {
    $my_search_is = htmlspecialchars($_GET["mac"]);
    $sql = <<<EOF
              SELECT * FROM List WHERE MACS LIKE "%$my_search_is%" ORDER BY MACS;
EOF;
    $output= $db->query($sql);
    $d= array(); 
    while($row = $output->fetchArray(SQLITE3_ASSOC) ){
         #echo $row[1]. "|" . $row[2] . "|" . $row[3] . "|" . $row[4] . "\n";
         $d[] = $row['IP']. " | " . $row['VLANs'] . " | " . $row['PORT'] . " | " . "$my_search_is";
     
    }

$flag = count($d);
if($flag ==0){
    $count = $db->query('SELECT count(*) FROM info');
    while($check = $count->fetchArray(SQLITE3_ASSOC)) {
        $number_of_devices = $check['count(*)'];
        echo "We found no match in $number_of_devices devices"."\n";
     }
}

$my_result_is = array_unique($d);
$total = count($my_result_is);
for($i = 0; $i < $total; $i++){
    echo $my_result[$i]. "\n";
    }
}
$db->close();

?>
