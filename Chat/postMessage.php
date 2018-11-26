<?php
    $db = new PDO('mysql:host=localhost;dbname=chat','root','');

    if(isset($_POST['text']) && isset($_POST['name'])){
        $text = $_POST['text'];
        $name = $_POST['name'];

        if(!empty($text) && !empty($name)){
            $insert = $db->prepare("INSERT INTO messages VALUES ('','".$name."','".$text."')");
            $insert->execute();

            echo "<li class = 'cm'><b>".ucwords($name)."</b>: ".$text."</li>";
        }
    }
?>



