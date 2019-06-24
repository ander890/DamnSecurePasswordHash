<?php
require_once("hash.php");
$type = filter_var(isset($_POST['type']) ? $_POST['type'] : null, FILTER_SANITIZE_STRING);


$resultHash = filter_var(isset($_GET['resultHash']) ? $_GET['resultHash'] : null, FILTER_SANITIZE_STRING);
$resultVerify = filter_var(isset($_GET['resultVerify']) ? $_GET['resultVerify'] : null, FILTER_SANITIZE_STRING);
$plain = filter_var(isset($_GET['plain']) ? $_GET['plain'] : null, FILTER_SANITIZE_STRING);
$salt = filter_var(isset($_GET['salt']) ? $_GET['salt'] : null, FILTER_SANITIZE_STRING);
$hash = filter_var(isset($_GET['hash']) ? $_GET['hash'] : null, FILTER_SANITIZE_STRING);
$vplain = filter_var(isset($_GET['vplain']) ? $_GET['vplain'] : null, FILTER_SANITIZE_STRING);
$vsalt = filter_var(isset($_GET['vsalt']) ? $_GET['vsalt'] : null, FILTER_SANITIZE_STRING);
$vhash = filter_var(isset($_GET['vhash']) ? $_GET['vhash'] : null, FILTER_SANITIZE_STRING);

if($type == "hash"){
    $password_plain = $_POST['password_plain'];
    $salt = $_POST['salt'];
    if($salt){
        $password_result = dsphHash($password_plain, $salt);
    }else{
        $password_result = dsphHash($password_plain);
    }
    header("LOCATION:index.php?resultHash=$password_result&plain=$password_plain&salt=$salt");
}

if($type == "verify"){
    $password_plain = $_POST['password_plain'];
    $password_hash = $_POST['password_hash'];
    $salt = $_POST['salt'];
    if($salt){
        $password_result = dsphVerify($password_plain, $password_hash, $salt);
    }else{
        $password_result = dsphVerify($password_plain, $password_hash);
    }
    if($password_result == true){
        header("LOCATION:index.php?resultVerify=TRUE&vplain=$password_plain&vhash=$password_hash&vsalt=$salt");
    }else{
        header("LOCATION:index.php?resultVerify=FALSE&vplain=$password_plain&vhash=$password_hash&vsalt=$salt");
    }
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>DSPH</title>
  </head>
  <body>
    <center><h1>DamnSecurePasswordHash (DSPH)</h1></center>
    <br>
    <br>
    <div class="container">
    <div class="row">
    <div class="col-md-6">
    <h2> HASH PASSWORD </h2>
    <form method="POST">
    <input name="type" value="hash" type="hidden">
    <label> YOUR PLAIN PASSWORD </label>
    <input class="form-control" name="password_plain" type="text" placeholder="PLAIN PASSWORD" value="<?= $plain ?>" required>
    <br>
    <label> SALT (OPTIONAL) </label>
    <input class="form-control" name="salt" type="text" placeholder="YOUR SALT" value="<?= $salt ?>">
    <br>
    <button type="submit" class="btn btn-success btn-block"> HASH NOW </button>
    </form>
    <br>
    <br>
    <h3> YOUR HASH RESULT <h3>
    <input readonly class="form-control" value="<?= $resultHash ?>">
    </div>
    <div class="col-md-6">
    <h2> VERIFY PASSWORD </h2>
    <form method="POST">
    <input name="type" value="verify" type="hidden">
    <label> YOUR PLAIN PASSWORD </label>
    <input class="form-control" name="password_plain" type="text" placeholder="PLAIN PASSWORD" value="<?= $vplain ?>" required>
    <br>
    <label> YOUR HASH PASSWORD </label>
    <input class="form-control" name="password_hash" type="text" placeholder="HASH PASSWORD" value="<?= $vhash ?>" required>
    <br>
    <label> SALT (OPTIONAL) </label>
    <input class="form-control" name="salt" type="text" placeholder="YOUR SALT" value="<?= $vsalt ?>">
    <br>
    <button type="submit" class="btn btn-primary btn-block"> VERIFY NOW </button>
    </form>
    <br>
    <br>
    <h3> YOUR VERIFY RESULT <h3>
    <input readonly class="form-control" value="<?= $resultVerify ?>">
    </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>