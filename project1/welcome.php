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

    <title>Welcome to ToTrick</title>
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

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="slide1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Welcome to ToTrick</h5>
                    <p>A Smart Daily Planner</p>
                    <button class="btn btn-info">Todo list</button>
                    <button class="btn btn-danger">Project management</button>
                    <button class="btn btn-warning">Money management</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="slide2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>The Best ToDo App</h5>
                    <p>Easy and Organizing Life</p>
                    <button class="btn btn-info">Todo list</button>
                    <button class="btn btn-danger">Project management</button>
                    <button class="btn btn-warning">Money management</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="slide69.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Your Life Saviour</h5>
                    <p>Manage your to do list online</p>
                    <button class="btn btn-info">Todo list</button>
                    <button class="btn btn-danger">Project management</button>
                    <button class="btn btn-warning">Money management</button>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container my-4">
        <div class="row mb-2">
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Set Goals</strong>
                        <h3 class="mb-0">Build ToDo List And Make A Plan For Your Day</h3>
                        <div class="mb-1 text-muted"> 21 June</div>
                        <p class="card-text mb-auto">
                            User-friendly interface with responsive design And Secure login and data encryption.</p>
                        <a href="#" class="stretched-link">More Features Coming</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="todo.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Save Money</strong>
                        <h3 class="mb-0">The ultimate project And Finance management</h3>
                        <div class="mb-1 text-muted">29 June</div>
                        <p class="mb-auto"> Detailed financial and budget reports And Customizable categories for links,
                            books, and skills.</p>
                        <a href="#" class="stretched-link">More Features Coming</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="cash1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row mb-2">
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Customization
                        </strong>
                        <h3 class="mb-0">Categories for links, books, skills
                        </h3>
                        <div class="mb-1 text-muted"> 21 June</div>
                        <p class="card-text mb-auto">
                        Offer functionalities to track skills development and manage reading lists.</p>
                        <a href="#" class="stretched-link">More Features Coming</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="book1.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Task Management</strong>
                        <h3 class="mb-0">Create, update, and delete tasks</h3>
                        <div class="mb-1 text-muted">29 June</div>
                        <p class="mb-auto">Easy way to Assign tasks to projects and Set task priorities and statuses. </p>
                        <a href="#" class="stretched-link">More Features Coming</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="slide101.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Login To ToTrick</h1>
        <p class="col-lg-10 fs-4">ToTrick aims to enhance productivity, ensure better project oversight, and facilitate 
        personal growth through skill tracking and reading lists.</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light" action="/project1/login.php" method="post">
          <div class=" mb-3">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class=" mb-3">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
          <hr class="my-4">
          <small class="text-muted">By clicking Log In, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>



    <div class="bg-dark text-secondary px-4 py-5 text-center">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Best User Experience</h1>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4">Organize tasks, manage projects, track finances, plan budgets, and monitor skills
                    development
                </p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="/project1/welcome.php" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Get Started</a>
                    <a href="/project1/signup.php" class="btn btn-outline-light btn-lg px-4">Sign up for free</a>

                </div>
            </div>
        </div>
    </div>

    <footer class="text-body-secondary py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">Join millions of people who organize work and life with Todoist.</p>
            <p class="mb-0">New to ToTrick? <a href="/project1/welcome.php">Visit the homepage</a> or read our <a
                    href="/project1/welcome.php">getting started guide</a>.</p>
        </div>
    </footer>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>