<?php
$inputname = "";
$inputpass = "";
if(isset($_POST['username']) && isset($_POST['password'])) {
  $inputname = $_POST['username'];
  $inputpass = $_POST['password'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Let's login!</title>
  </head>
  <body>

    <!-- As a heading -->
    <nav class="navbar navbar-light bg-light">
      <span class="navbar-brand mb-0 h1">Let's login!</span>
    </nav>
    
    <div class="jumbotron jumbotron-fluid">
      <div class="container">

        <?php
         if(!empty($_POST['username']) && !empty($_POST['password'])) {
           $name = "superuser_admin";
           $password = "password12345678";
           if (hash_equals($name, $username) && hash_equals($password, $userpass)) {
             $res = '<p><div class="alert alert-success" role="alert">flag: taskctf{maxlength_15_4_5t0pg4p_s0lut10n}</div></p>';
           } else {
             $res = '<p><div class="alert alert-danger" role="alert">invalid user</div></p>';
           }
           echo $res;
         }
         ?>
        
        <h1 class="display-4">Let's login!</h1>
        <p class="lead">I've made the login form.</p>
        <form method="post" action="index.php">
          <!--
              note for debug
              username: superuser_admin
              password: password12345678
            -->
          <div class="form-group">
            <input type="text" class="form-control" name="username" aria-describedby="text" maxlength="8" placeholder="username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" maxlength="8" placeholder="password">
          </div>
          <button type="submit" class="btn btn-primary">Login!</button>
        </form>

         <?php
         if(!empty($_POST['username']) && !empty($_POST['password'])) {
           $name = "superuser_admin";
           $password = "password12345678";
           if (hash_equals($name, $username) && hash_equals($password, $userpass)) {
           $res = '<div class="alert alert-success" role="alert"><h4>Tip</h4><p>maxLength is weak. I think validation in backend is good. ref: https://medium.com/ruffnote/maxlength%E3%81%AE%E4%BB%95%E6%A7%98%E3%81%AB%E8%A6%81%E6%B3%A8%E6%84%8F-5c7fc4581878</p></div>';
             echo $res;
           }
         }
         ?>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
