<?php

    // 1. connect to Database faster
    $database = connectToDB();

    // 2. get all the data from the form using $_POST
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];
    

    /* 
        3. error checking
        - make sure all the fields are not empty
        - make sure the password is match
        - make sure the password length is at least 8 characters
        
    */
    if ( empty( $name ) || empty( $email ) || empty( $password ) || empty( $confirm_password )  || empty( $role ) ) {
        setError( "All the fields are required.", '/user_add' );
    } else if ( $password !== $confirm_password ) {
        //  make sure password is match
        setError( "The password is not match", '/user_add' );
    } else if ( strlen( $password ) < 8 ) {
        // make sure the password length is at least 8 chars
        setError( "Your password must be at least 8 characters", '/user_add' );
    } else {  

        // - make sure the email entered does not exists yet
        $sql = "SELECT * FROM cms where email = :email";
        $query = $database->prepare( $sql );
        $query->execute([
            'email' => $email
        ]);
        $user = $query->fetch(); // get only one row of data

        // 4. create the user account. Remember to assign role to the user
        if ( $user ) {
            setError("The email provided has already been used.","/user_add");
        } else {
            // create the user account
            // sql command (recipe)
            $sql = "INSERT INTO cms (`name`,`email`,`password`,`role`,`user_id`) VALUES (:name, :email, :password, :role, :user_id)";
            // prepare (put everything into the bowl)
            $query = $database->prepare( $sql );
            // execute (cook it)
            $query->execute([
                'name' => $name,
                'email' => $email,
                'password' => password_hash( $password, PASSWORD_DEFAULT ),
                'role' => $role,
                'user_id' => $_SESSION['user']['id']
            ]);
        
        // 5. redireact back to /manage-users page
        header("Location: /manage_user");
        exit;
    }
}
    
    
   
      
