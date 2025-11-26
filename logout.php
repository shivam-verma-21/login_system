<?php
session_start();
session_unset();   
session_destroy(); 

// header("location: login.php"); 
echo "<br>";
echo '<div class="container my-4">
        <h1 class="text-center">Please click here for again login </h1>
</div>';
 echo '<a href = "/login_system/login.php"><button>Login</button><a>';
exit;
?>
