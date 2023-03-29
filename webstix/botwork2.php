<?php
include('classes/db_config.php');
include ("classes/classes_lib.php");
    $text1 = $_POST['text'];
    echo $text1;
   $sql="INSERT INTO chat_trans(chat) VALUES ('$text1')";
    $bt=new bot();
    $y=$bt->insert_query($sql);
    
?>

