<?php
$inputname = "";
$inputpass = "";
if(isset($_POST['username'])) {
  $inputname = $_POST['username'];
}
if (isset($_POST['password'])) { 
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
         if(isset($_POST['username']) || isset($_POST['password'])) {
         if(!empty($inputname) && !empty($inputpass)) {
           $name = "superuser_admin";
           $password = "password12345678";
           if (hash_equals($name, $inputname) && hash_equals($password, $inputpass)) {
             $res = '<p><div class="alert alert-success" role="alert">flag: taskctf{Fr0ntend_v4lid4t10n_15_5t1ll_we4k}</div></p>';
           } else {
             $res = '<p><div class="alert alert-danger" role="alert">invalid user</div></p>';
           }
           echo $res;
         } else {
           echo '<p><div class="alert alert-secondary" role="alert">has empty input</div></p>';
         }
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
            <input id="username" type="text" class="form-control" name="username" aria-describedby="text" maxlength="8" placeholder="username">
          </div>
          <div class="form-group">
            <input id="password" type="password" class="form-control" name="password" maxlength="8" placeholder="password">
          </div>
          <button type="submit" class="btn btn-primary">Login!</button>
        </form>

         <?php
         if(!empty($inputname) && !empty($inputpass)) {
           $name = "superuser_admin";
           $password = "password12345678";
           if (hash_equals($name, $inputname) && hash_equals($password, $inputpass)) {
           $res = '<p><div class="alert alert-success" role="alert"><h4>Tip</h4><p>JavaScriptでvalidationをしたとしても, burpでリクエストを編集したり, curlで直接リクエストを送ったりすることで回避できてしまいます。<br>Backend エンジニアさん, 頑張って！</p></div></p>';
             echo $res;
           }
         }
         ?>
      </div>
    </div>

    <script type="text/javascript" src="validation.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
