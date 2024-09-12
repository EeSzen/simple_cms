<?php

    // connect to Database faster
    $database = connectToDB();

    $sql = "SELECT * FROM posts ";
        $query = $database->prepare( $sql );
        $query->execute();
        $posts = $query->fetchAll();
        $posts = $query->fetch();

    // retreive data from posts(database)
    // $status = $_POST['status'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    // $posted_on = $_POST['posted_on'];


    
    // check for empty fields
    if(empty( $title ) || empty( $content )){
        // setError( "All the fields are required.", '/post_add' );
    }else{
        // create the post
            // sql command (recipe)
            $sql = "INSERT INTO posts (`title`,`content`,`user_id`) VALUES (:title, :content, :user_id)";
            // prepare (put everything into the bowl)
            $query = $database->prepare( $sql );
            // execute (cook it)
            $query->execute([
                'title' => $title,
                'content' => $content,
                'user_id'=> $_SESSION["user"]["id"]
            ]);
        
        // 5. redireact back to /manage-posts page
        $_SESSION["success"] = "Post has been created ! :)";
        header("Location: /manage_post");
        exit;
    }
    