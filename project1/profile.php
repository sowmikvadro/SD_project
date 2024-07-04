<?php
include'reuse/_dbconnect.php';
session_start();
$insert = false;
$update =false;
$delete =false;

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `notes` WHERE `sno` = $sno";
    $result = mysqli_query($conn, $sql);
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['snoEdit'])){
     
    $sno = $_POST["snoEdit"];    
    $title = $_POST["titleEdit"];
    $description = $_POST["descriptionEdit"];

    $sql = "UPDATE `notes` SET `title` = '$title', `description` = '$description' WHERE `notes`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);
    if($result){
        $update =true;
        
    }

    }
    else{
 
    $title = $_POST["title"];
    $description = $_POST["description"];

    $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title','$description')";
    $result = mysqli_query($conn, $sql);


    if ($result) {
        $insert = true;
        header("Location: /project1/profile.php");
        exit; 
    }
    else{
        $insert = false;
        
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
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">


    <title>Profile</title>

</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/project1/profile.php" method="post">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="mb-3">
                            <label for="title">Note Title</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="desc">Note Description</label>
                            <textarea class="form-control" id="descriptionEdit" name="descriptionEdit"
                                rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Note</button>
                    </form>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-light bg-dark">
  <form class="container-fluid justify-content-start">
  <a href="/project1/firstpage.php" class="btn btn-outline-light btn-lg px-4 me-sm-3 fw-bold">Back to Home</a>
  </form>
</nav>



    
    <?php
    if($insert){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your note has been inserted successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div> ' ; 
    
    }
    ?>
    <?php
    if($update){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your note has been updated successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div> ' ; 
    
    }
    ?>
    <?php
    if($delete){
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your note has been deleted successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div> ' ; 
    
    }
    ?>


    <div class="container my-4">
        <h2>Add a Note</h2>
        <form action="/project1/profile.php" method="post">
            <div class="mb-3">
                <label for="title">Note Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="desc">Note Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
        </form>
    </div>
    <div class="container my-4">

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM notes";
                $result = mysqli_query($conn, $sql);
                $sno=0;
                while($row = mysqli_fetch_assoc($result)){
                    $sno = $sno+1;
                    echo "<tr>
                    <th scope = 'row'>".$sno."</th>
                    <td>".$row['title']."</td>
                    <td>".$row['description']."</td>
                    <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Update</button> <button class='delete btn btn-sm btn-danger' id=d".$row['sno'].">Delete</button> </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
    <hr>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>

    <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit", );
            tr = e.target.parentNode.parentNode;
            title = tr.getElementsByTagName("td")[0].innerText;
            description = tr.getElementsByTagName("td")[1].innerText;
            console.log(title, description);
            titleEdit.value = title;
            descriptionEdit.value = description;
            snoEdit.value = e.target.id;
            console.log(e.target.id);
            $('#editModal').modal('toggle');
        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit", );
            sno = e.target.id.substr(1,);
            if (confirm("Are you sure you want to delete this? ")) {
                console.log("yes");
                window.location = `/project1/profile.php?delete=${sno}`;

            } else {
                console.log("no");
            }
        })
    })
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>