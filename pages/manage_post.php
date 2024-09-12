<?php

checkIfuserIsNotLoggedIn();


  // 1. connect to the database
  $database = connectToDB();
  
    
//filter admin and user 
   if ($_SESSION["user"]["role"] == "user"){

      $sql = "SELECT * FROM posts WHERE user_id =:user_id";
      $query = $database->prepare( $sql );
      $query->execute([
        "user_id" => $_SESSION['user']['id']
      ]);
      $posts = $query->fetchAll();

   }else if($_SESSION["user"]["role"] == "admin"){

      $sql = "SELECT * FROM posts";
      $query = $database->prepare( $sql );
      $query->execute();
      $posts = $query->fetchAll();
   }
  
  require "parts/header.php";
  
  ?>

<div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Manage <?= $_SESSION["user"]["name"];?>'s Posts</h1>
        <div class="text-end">
          <a href="/post_add" class="btn btn-primary btn-sm"
            >Add New Post</a
          >
        </div>
      </div>

     
      <div class="card mb-2 p-4"> 
       
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col" style="width: 40%;">Title</th>
              <th scope="col">Status</th>
              <th scope="col" class="text-end">Actions</th>
            </tr>
          </thead>

          <?php foreach ($posts as $index => $post) :?>
          <tbody>
            <tr>
              <th scope="row"><?=$post['id']?></th>
              <td><?=$post['title']?></td>
              <td>
                <?php if($post['status'] == "publish") :?>
              <span class="badge bg-success"><?=$post['status']?></span>
                <?php else :?>
              <span class="badge bg-warning"><?=$post['status']?></span>
                <?php endif ;?>
            
            </td>
              <td class="text-end">
                <div class="buttons">
                  <a
                    href="/post"
                    target="_blank"
                    class="btn btn-primary btn-sm me-2 disabled"
                    ><i class="bi bi-eye"></i
                  ></a>
                  <a
                    href="/post_edit?id=<?=$post['id']?>"
                    class="btn btn-secondary btn-sm me-2"
                    ><i class="bi bi-pencil"></i
                  ></a>
                    <!-- test -->
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-post-<?=$post['id']?>">
                    <i class="bi bi-trash"></i>
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="delete-post-<?=$post["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabdel">Delete Post: <?=$post["id"]; ?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                          This action cannot be reversed.
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <form action="/post/delete" method="POST">
                          <input type="hidden" name = "delete_post" value="<?=$post["id"]?>">
                              <button class="btn btn-danger btn-sm"> <i class="bi bi-trash"></i>Delete Now</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                    <!-- test -->
                </div>
              </td>
            </tr> 
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
     
      <div class="text-center">
        <a href="/dashboard" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Dashboard</a
        >
      </div>
    </div>
    <?php require 'parts/footer.php';?>