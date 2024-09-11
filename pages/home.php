<!-- header -->
<?php

// connnect to database
$database = connectToDB();


// 3. get students data from the database
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
    <h1 class="text-center mb-4 mt-5">My Blog</h1>
    <!-- card places -->
    <div class="card mb-4 mx-auto" style="width: 800px;height:150px ;">
        <div class="card-body ">
            <div class = "col-12 mb-4">
                <h5 class="card-title">Post</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class = "col-12 d-flex justify-content-end align-items-end">
                <a href="/post" class="btn btn-sm btn-primary">Learn More</a>
            </div>
        </div>
    </div>
    <div class="card mb-4 mx-auto" style="width: 800px;height:150px ;">
        <div class="card-body ">
            <div class = "col-12 mb-4">
                <h5 class="card-title">Post</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class = "col-12 d-flex justify-content-end align-items-end">
                <a href="/post" class="btn btn-sm btn-primary">Learn More</a>
            </div>
        </div>
    </div>
    <div class="card mb-4 mx-auto" style="width: 800px;height:150px ;">
        <div class="card-body ">
            <div class = "col-12 mb-4">
                <h5 class="card-title">Post</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class = "col-12 d-flex justify-content-end align-items-end">
                <a href="/post" class="btn btn-sm btn-primary">Learn More</a>
            </div>
        </div>
    </div>
    <div class="mt-4 d-flex justify-content-center gap-2">
    <?php if ( isset( $_SESSION['user'] ) ) : ?>
        <!-- show dashboard and logout link if user is logged in -->
        <a href="/dashboard" class="btn btn-primary btn-sm">Dashboard</a>
        <a href="/logout" class="btn btn-primary btn-sm">Logout</a>
    <?php else : ?>
        <!-- show login and signup link if user is not logged in -->
        <a href="/login" class="btn btn-primary btn-sm">Login</a>
        <a href="/signup" class="btn btn-primary btn-sm">Sign Up</a>
    <?php endif; ?>
    </div>
</div>
   <!-- footer -->
   <?php
  require 'parts/footer.php';
  ?>
    <!-- here -->