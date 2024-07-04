<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    include'reuse/_dbconnect.php';
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    //checking duplicate username
      $existsql = "SELECT * FROM users WHERE username = '$username'";
      $result = mysqli_query($conn,$existsql);
         $numExistRows = mysqli_num_rows($result);
            if($numExistRows > 0)
            {
                $showError = "Username already exists";
            }else{

                if (!empty($email) && !empty($username) && !empty($password) && !empty($cpassword)) {
       
                    if ($password == $cpassword) {
                        
                        $sql = "INSERT INTO `users` (`email`, `username`, `password`, `date`) 
                                VALUES ('$email', '$username', '$password', current_timestamp())";
            
                        $result = mysqli_query($conn, $sql);
            
                        if ($result) {
                            $showAlert = true; 
                        }else{
                            $showError = "Password do not match"; 
                        } 
                    } else {
                        $showError = "Password do not match"; 
                    }
                } else {
                    $showError = "Please ensure all fields are filled out correctly before submitting the form"; 
                }
                
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

    <title>SignUp</title>
</head>

<body>
    <?php require 'reuse/_nav.php' ?>

    <?php
    if($showAlert){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your account is now created and you can login
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div> ' ; 
    }
    if($showError){
        echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '.$showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div> ' ; 
    }
    ?>

    <div class="container">
        <h1 class="text-center"> Signup to ToTrick </h1>

        <form action="/project1/signup.php" method="post">
            <div class="mb-3">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
                <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
            </div>
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
            </div>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">User Inteface</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1"
                            checked>
                        <label class="form-check-label" for="gridRadios1">
                            Personal 
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                        <label class="form-check-label" for="gridRadios2">
                            Work
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3"
                            disabled>
                        <label class="form-check-label" for="gridRadios3">
                            School
                        </label>
                    </div>
                </div>
            </fieldset>
            
            <button type="submit" class="btn btn-danger">Signup</button>
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