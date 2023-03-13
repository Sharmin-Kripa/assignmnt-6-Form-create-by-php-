<?php
//handle form submission
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_FILES['profile_picture'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $profile_picture = $_FILES['profile_picture'];

  //check empty or not
  if (empty($name) || empty($email) || empty($password) || empty($profile_picture)) {
    die("All fields are required!");
  }
  //valid email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format!");
  }

  // Save the profile picture to the server
$target_dir = "images/";
$timestamp = date('YmdHis');
$target_file = $target_dir . $timestamp . "_" . basename($profile_picture['name']);
if (!move_uploaded_file($profile_picture['tmp_name'], $target_file)) {
  die("Error uploading file!");
}

// Save the user's data to the CSV file
$user_data = array($name, $email, $target_file);
$file = fopen("users.csv", "a");
fputcsv($file, $user_data);
fclose($file);

// Start a new session and set a cookie with the user's name
session_start();
$_SESSION['name'] = $name;
setcookie("name", $name, time()+3600);

}


//HTML PART
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
       img{
          height: 50px;
          width: 50px;
          border-radius: 50%;
        }
    </style>
  </head>
  <body class="container bg-secondary-subtle">
    <h1 class="text-center m-3">Shows Data</h1>
    <hr>
    <section class="mt-2">
      <div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Image</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td><?php echo "{$name}"?></td>
              <td><?php echo "{$email}"?></td>
               <td><?php echo '<img src="' .$target_file . '" alt="Image">'?></td>
              <td></td>
            </tr>
           </tbody>
        </table>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
