<?php 

$insert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){

    

    include 'partials/db_connect.php';
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    // $exists = false; 
    if($password == $password1 ){    

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users` ( `name`, `username`, `password`, `email`, `phone`, `dt`) VALUES ('$name', '$username', '$hash', '$email', '$phone', current_timestamp())";

        $result  = mysqli_query($con,$sql); 
        if($result){
            $insert = true;
        }
    }
    else{
        $showError = "Password do not match !";
    }
    
}   
    ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
 
<body>
    <?php 
    require 'partials/_nav.php';
    ?>
      <?php 
    if($insert == true){


        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created, now you can login.
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
        <h1 class="text-center">Sign up to our website</h1>

        <form class="row g-3" action="/login_system/signup.php" method="post">
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your Name">
            </div>
            <div class="col-md-6">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="username" required
                    placeholder="Create a unique username">

            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter a strong password using this a-zA-Z0-9" pattern="[a-zA-Z0-9]+" required>
            </div>
            <div class="col-md-6">
                <label for="password1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password1" name="password1" required>

                    <?php 
            if($showError){

              echo '<small style="color: red;">  make sure you write a same password here !</small>';
            }
            ?>

            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required
                    placeholder="Enter your email">
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required
                    placeholder="Enter your phone number" pattern= "[0-9]{10}">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" required>
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <div class="col-12">
                
                <button type="submit" class="btn btn-primary">Sign up</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                      <?php 
    if($insert == true){
        echo '<button  class="btn btn-primary"><a  style="text-decoration: none; color: white;" href = "/login_system/login.php">Login</a></button>';       
    }
     ?>
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