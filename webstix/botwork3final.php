<?php
include('classes/db_config.php');
include ("classes/classes_lib.php");


//$bt=new bot();
$bt=new bot();
$text1 = $_POST['text1'];

 $sql="INSERT INTO chat_trans(Chat) VALUES ('$text1')";

$bt=new bot();
$y=$bt->insert_query($sql);
$z=$bt->find_lookup($text1);

?>
