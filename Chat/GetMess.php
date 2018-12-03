<?php
    $db = new PDO("mysql:host=localhost;dbname=chat",'chatlive','1234');
    $query = $db->prepare("SELECT * FROM message");
    $query->execute();

    while($fetch = $query->fetch(PDO::FETCH_ASSOC)){
        $name = $fetch['name'];
        $message = $fetch['messages'];

        echo "<li class = 'cm'><b>".ucwords($name)."</b>: ".$message."</li>";

    }
?>