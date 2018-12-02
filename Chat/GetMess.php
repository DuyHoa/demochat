<?php
    $db = new PDO('mysql:host=localhost;dbname=chat','chat_live','1234');
    $query = $db->prepare("SELECT * FROM messages");
    $query->execute();

    while($fetch = $query->fetch(PDO::FETCH_ASSOC)){
        $name = $fetch['name'];
        $text = $fetch['text'];

        echo "<li class = 'cm'><b>".ucwords($name)."</b>: ".$text."</li>";

    }
?>