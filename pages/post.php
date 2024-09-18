<?php

// 1. get the id from the URL
$id = $_GET["id"];
// 2. connect to Database
$database = connectToDB();
// 3. load the Post data
$sql = "SELECT posts.id, posts.title, posts.content, posts.user_id, cms.name 
                    FROM posts 
                    JOIN cms 
                    ON posts.user_id = cms.id 
                    WHERE posts.id = :id";  
$query = $database->prepare($sql);
$query->execute([
  'id' => $id
]);
$post = $query->fetch();



require 'parts/header.php';?>
<div  class="container">
    <h1 class="text-center pt-5 pb-3"><?= $post['title']; ?></h1>
        <div class="w-50 mx-auto text-center">
            <p><?= nl2br( $post['content'] ); ?></p>
        <div class = "d-flex justify-content-center align-items-around gap-3 mx-auto pt-3">
            <a href="/" class="btn btn-sm btn-primary">Go Back</a>
        </div>
    
    </div>
</div>
