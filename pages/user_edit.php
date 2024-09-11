<?php 

// get the id from the URL /user_edit?id=1
$id = $_GET["id"];

// connnect to the database
$database = connectToDB();

// load the existing data from the user
// sql command
$sql = "SELECT * FROM cms WHERE id =:id";
// prepare
$query = $database -> prepare($sql);
// execute
$query->execute([
  'id' => $id
]);
// fetch
$user = $query->fetch();








// load data from the existing db





require 'parts/header.php';?>
<div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Edit User</h1>
      </div>
      <div class="card mb-2 p-4">
        <form method="POST" action="/user/edit">
        <?php require "parts/error.php"?>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" value="<?= $user['name']; ?>" name="name"/>
              </div>
              <div class="col">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="<?= $user['email']; ?>" disabled/>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-control" id="role" name = "role">
              <option value="">Select an option</option>
              <option value="user" <?= $user['role'] == 'user' ? "selected" : "" ?>>User</option>
              <option value="editor" <?= $user['role'] == 'editor' ? "selected" : "" ?>>Editor</option>
              <option value="admin" <?= $user['role'] == 'admin' ? "selected" : "" ?>>Admin</option>
            </select>
          </div>
          <div class="d-grid">
          <input type="hidden" name="id" value="<?= $user["id"]; ?>" />
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="/manage_user" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Users</a
        >
      </div>
    </div>

    <?php require 'parts/footer.php';?>