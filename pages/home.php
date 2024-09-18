<!-- header -->
<?php

// connnect to database
$database = connectToDB();

    // 2. load the "publish" posts data
    $sql = "SELECT posts.id, posts.title, posts.content, posts.user_id, cms.name 
                FROM posts 
                JOIN cms 
                ON posts.user_id = cms.id 
                WHERE status = 'publish'";
    $query = $database -> prepare($sql);
    $query -> execute();
    $posts = $query -> fetchAll();



  // 3.1 - SQL command (recipe)
  $sql = "SELECT * FROM CMS";
  // 3.2 - prepare SQL query (prepare your material)
  $query = $database->prepare($sql); 
  // 3.3 - execute SQL query (to cook)
  $query->execute();
  // 3.4 - fetch all the results (eat)
  $label = $query->fetchAll();

  require 'parts/header.php';

?>


 <!-- here -->
<div id = "box" class = "">
        <?php if ( isset( $_SESSION['user'] ) ) : ?>
            <h1 class="text-center mb-4 mt-5"><?= $_SESSION["user"]["name"];?>'s Blog</h1>
        <!-- card places -->
        <?php foreach($posts as $post):?>
        <div class="card mb-4 mx-auto" style="width: 800px;height:150px ;">
            <div class="card-body ">
                <div class = "col-12 mb-4">
                    <h5 class="card-title"><?= $post['title']; ?></h5>
                    <p class="card-text">
                        Author: <?= $post['name']; ?>
                    </p>
                </div>
                <div class = "col-12 d-flex justify-content-end align-items-end">
                    <a href="/post?id=<?= $post['id']; ?>" class="btn btn-sm btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <?php endforeach ;?>
        <!-- show dashboard and logout link if user is logged in -->
        <div class="mt-4 d-flex justify-content-center gap-2">
            <a href="/dashboard" class="btn btn-primary btn-sm">Dashboard</a>
            <a href="/logout" class="btn btn-primary btn-sm">Logout</a>
        </div>
    <?php else : ?>
        <div class="card mb-4 mx-auto mt-5" style="width: 800px;height:200px ;">
            <h1 class="text-center mb-4 mt-5">Log In To Continue</h1>
            <!-- show login and signup link if user is not logged in -->
            <div class="mt-4 d-flex justify-content-center gap-2">
                <a href="/login" class="btn btn-primary btn-sm">Login</a>
                <a href="/signup" class="btn btn-primary btn-sm">Sign Up</a>
            </div>
        </div>
    <?php endif; ?>
</div>
<!-- footer -->
<?php require 'parts/footer.php';?>