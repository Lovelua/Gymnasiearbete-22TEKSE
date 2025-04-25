<?php 
$locker = 1;
include_once('config/db.php');

session_start(); 
if (isset($_SESSION['id'])) {
    header("Location:$dashboardPage");
}

if (isset($_POST['login'])){
  $errorMsg = ""; 

  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  if (!empty($email) || !empty($password)){

    $query = "SELECT * FROM $tableAdmin WHERE email = '$email'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) == 1){

      while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
          $_SESSION['id'] = $row['id'];
          header("Location:$dashboardPage");
        }else{
          $errorMsg = "Email eller lösenord är felaktig!"; 
        }
      }
    }else{ 
      $errorMsg = "Ingen användare hittades med en sånt email!";
    }
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saj it Loud - Inloggning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    
<div class="container pb-2" style="margin-top:50px">
<div class="row">
  <div class="col-sm-3 col-md-4 col-lg-4"></div>
  <div class="col-sm-7 col-md-6 col-lg-4 border p-5 rounded" style="margin-top:20px">

  <?php
    if (isset($errorMsg)) {
        echo 
        "<div class='alert alert-warning alert-dismissible fade show'>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        $errorMsg
        </div>";         
    }
?>

  <form action="" method="post">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
    
        <div class="mb-3">
          <label for="exampleInputPassword" class="form-label">Lösenord</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword" aria-describedby="emailHelp">
        </div>

        <p>Är du en ny användare? <a href="<?php echo $registerPage; ?>" >Registrera</a></p>

        <input type="submit" class="btn btn-primary" name="login" value="Login">
</form>
    </div>
    </div>
</div>
</body>
</html>