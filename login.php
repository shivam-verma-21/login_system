<?php 
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){

    

    include 'partials/db_connect.php';
    
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $exists = false; 
    
        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result  = mysqli_query($con,$sql); 
        $num = mysqli_num_rows($result);

        if($num == 1){

            $row = mysqli_fetch_assoc($result);          
            if(password_verify($password,$row['password'])){
                
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $row['name'];
                $_SESSION['username'] = $username;
                header("location: welcome.php");
                exit;
            }
             else{
        $showError = "Invalid Credentials !";
    }

        }
    
    else{
        $showError = "Invalid Credentials !";
    }
    
}   
    ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
 
<body>
    <?php 
    require 'partials/_nav.php';
    ?>
      <?php 
    if($login){

      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your are successfully logged in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        
    }
     ?>
      <?php 
    if($showError){

      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong>' .$showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        
    }
     ?>
    <div class="container my-4">
        <h1 class="text-center">Login to our website</h1>

        <form class="row g-3" action="/login_system/login.php" method="post">
            
            <div class="col-md-6">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="username" required
                    placeholder="Enter your username">

            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter your password" required>
            </div>
            <?php 
            if($showError){

              echo ' <small style="color: red;"> If you do not have account please click on the sign up button</small> ';
            }
            ?>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Login</button>
                <button class="btn btn-primary"><a href="/login_system/signup.php" style="color: white; text-decoration:none;">Sign up</a></button>
             
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
        crossorigin="anonymous"></script>
</body>

</html>
