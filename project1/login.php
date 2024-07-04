<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    include'reuse/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
   
    

    if (!empty($username) && !empty($password)) {
       
            $sql = "Select * from users where username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num == 1 ){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: firstpage.php");
                
            }else{
                $showError = true;
            }      
        
    } else {
        $showError = true; 
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <?php require 'reuse/_nav.php' ?>

    <?php
    if($login){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong> You are logged in
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div> ' ; 
    }
    if($showError){
        echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sir!</strong> Invalid Credentials
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div> ' ; 
    }
    ?>

    <div class="container">
        <h1 class="text-center"> Login to ToTrick </h1>

        <form action="/project1/login.php" method="post">
            
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
              
            <button type="submit" class="btn btn-dark">login</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>