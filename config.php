<?php
class data_base extends SQLite3 {
      function __construct() {
         $this->open('sasank.db');
      }
}
$db = new data_base();

$sql = <<<EOF
      CREATE TABLE IF NOT EXISTS List(IP varchar not null, VLANs varchar not null, PORT varchar, MACS varchar);
EOF;
$output = $db->exec($sql);
if(!$output){
	#echo "\n";
   #echo "ok"; #prints the error which causes SQlite request to fail
   echo $db->lastErrorMsg();
}

$sql = <<<EOF
      CREATE TABLE IF NOT EXISTS info(IP varchar not null,PORT varchar not null,COMMUNITY string not null ,VERSION varchar not null, FIRST_PROBE varchar, LATEST_PROBE varchar null, FAILED_ATTEMPTS int default 0 not null);
EOF;
$output = $db->exec($sql);
if(!$output){
      #echo "\n";
      #echo "ok";
      echo $db->lastErrorMsg();
}
   

?>
