<?php require 'parts/header.php';?>
<div id = "container">
    <h1 class = "text-center pt-5 pb-3">Login</h1>
    <div class = "card w-50 d-flex justify-content-center align-items-center mx-auto">
        <div class = "w-75 py-4">
            <form action="/auth/do_login" method="POST">
            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com"/>
            </div>
            <div class="mb-3">
                <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="Password"
                />
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-fu">Login</button>
            </div>
            </form>
        </div>
    </div>
    <!-- go back -->
     <div class = "d-flex justify-content-center align-items-around gap-3 mx-auto pt-3">
            <a href="/" class="btn btn-dark"><i class="bi bi-caret-left"></i>Go Back</a>
        <!-- sign in if no account -->
            <a href="/signup" class="btn btn-dark">Don't have an account? Sign up here<i class="bi bi-caret-right"></i></a>
     </div>
</div>

