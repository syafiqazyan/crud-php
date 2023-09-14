<?php

  include "db_conn.php";

  if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO `crud`(`id`, `first_name`, `last_name`, `email`, `gender`) VALUES (NULL,'$first_name','$last_name','$email','$gender')";

    $result = mysqli_query($conn, $sql);
  
    if($result) {
      header("Location: index.php?msg=New record created successfully");
    }
    else {
      echo "Failed: " . mysqli_error($conn);
    }
  }


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP CRUD</title>
  </head>
  <body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        PHP Complete CRUD Application
    </nav>

    <div class="container">
      <div class="text-center mb-4">
        <h3>Edit User Information</h3>
        <p class="text-muted">Click update after changing any information</p>
      </div>

      <?php
      $id = $_GET['id'];
      $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      ?>


      <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">
          <div class="row mb-3">
            <div class="col">
              <label for="" class="form-label">First Name:</label>
              <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'] ?>" >
            </div>
            <div class="col">
              <label for="" class="form-label">Last Name:</label>
              <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'] ?>" >
            </div>
          </div>

          <div>
            <div class="mb-3">
              <label for="" class="form-label">Email:</label>
              <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
            </div>
          </div>

          <div class="form-group mb-3">
            <label for="">Gender:</label> &nbsp;
            <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?php echo ($row['gender']=='male')? "checked":""; ?>>
            <label for="male">Male</label> &nbsp;
            
            <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?php echo ($row['gender']=='female')? "checked":""; ?>>
            <label for="female">Female</label>
          </div>

          <div>
            <button type="submit" class="btn btn-success" name="submit">Update</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
          </div>

        </form>
      </div>
    </div>

    <!--Bootstraps-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>