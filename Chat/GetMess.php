<?php
    $db = new PDO('mysql:host=localhost;dbname=chat','root','');
    $query = $db->prepare("SELECT * FROM messages");
    $query->excute();

    while($fetch = $query->fetch(DPO::FETCH_ASSOC)){
        $name = $fetch['name'];
        $message = $fetch['message'];

        echo "<li class = 'cm'><b>".ucwords($name)."</b>: ".$message."</li>";

    }
?>