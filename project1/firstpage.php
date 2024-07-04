<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location:login.php");
  exit;
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

    <title>Welcome Of ToTrick</title>
</head>

<body>

<header data-bs-theme="dark">
  <div class="text-bg-dark collapse" id="navbarHeader" style="">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4>About</h4>
          <p class="text-body-secondary">The motivation behind ToTrick is to address the growing need for an integrated task and project 
management solution that not only helps users keep track of their tasks but also provides tools for 
managing associated resources such as finances, skills, and references.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4>Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-dark">Follow on Twitter</a></li>
            <li><a href="#" class="text-dark">Like on Facebook</a></li>
            <li><a href="#" class="text-dark">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <strong> ToTrick</strong>
      </a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<div class="container">
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username']?></h4>
  <p>Aww yeah, you have successfully loggedin your account.</p>
  <hr>
  <p class="mb-0">Customize your daily routine and task as much as you want.</p>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
</div>
</div>



<div class="row py-lg-5 bg-dark text-white">
  <div class="col-lg-6 col-md-8 mx-auto">
    <h1 class="fw-light">Welcome to ToTrick</h1>
    <p class="lead text-body-secondary">Manage your daily task in a simple way</p>
    <p>
      <a href="/project1/profile.php" class="btn btn-primary">User Profile</a>
      <a href="/project1/signup.php" class="btn btn-dark my-2">Create another account?</a>
    </p>
  </div>
</div>

<div class="px-4 py-3 my-3 text-center">
    <img class="d-block mx-auto mb-4" src="hh.jpg" alt="" width="900" height="400">
    <h1 class="display-5 fw-bold">Task Management</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Create, Update, and Delete tasks.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      <a href="/project1/profile.php" class="btn btn-outline-dark btn-lg px-4 me-sm-3 fw-bold">Get Started</a>
      </div>
    </div>
  </div>


  <div class="bg-dark text-secondary px-4 py-5 text-center">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Resource Management</h1>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4"> Save and manage links to watch later and Track books for reading and their details
                </p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="..." class="btn btn-outline-primary btn-lg px-4 me-sm-3 fw-bold">Get Started</a>
                </div>
            </div>
        </div>
    </div>


  <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-4 fw-bold lh-1">Finance and Budget Management</h1>
        <p class="lead">Record financial costs and savings and Plan and track project budgets.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
        <a href="..." class="btn btn-outline-dark btn-lg px-4 me-sm-3 fw-bold">Get Started</a>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
          <img class="rounded-lg-3" src="cash2.jpg" alt="" width="400" height="250">
      </div>
  </div>

  <div class="bg-dark text-secondary px-4 py-5 text-center">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Project Management</h1>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4"> Create, update, and delete projects and Track project status and progress.
                </p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="..." class="btn btn-outline-primary btn-lg px-4 me-sm-3 fw-bold">Get Started</a>
                </div>
            </div>
        </div>
    </div>


  <div class="px-4 pt-5 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold">Skill Tracker</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Monitor skill development and associated tasks.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
      <a href="..." class="btn btn-outline-dark btn-lg px-4 me-sm-3 fw-bold">Get Started</a>
      </div>
    </div>
    <div class="overflow-hidden" style="max-height: 30vh;">
      <div class="container px-5">
        <img src="skill1.jpg" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="500" height="600" loading="lazy">
      </div>
    </div>
  </div>



<footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Join millions of people who organize work and life with Todoist.</p>
    <p class="mb-0">New to ToTrick? <a href="/project1/welcome.php">Visit the homepage</a> or read our <a href="/project/welcome.php">getting started guide</a>.</p>
  </div>
</footer>



  

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