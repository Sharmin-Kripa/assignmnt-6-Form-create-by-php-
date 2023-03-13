<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        form {
          margin: 0 auto;
          width: 50%;
        }
       
    </style>
  </head>
  <body class="bg-secondary-subtle">
      <h1 class="text-center m-4">User Registration Form</h1>
    <section class="container">
        <div>
            <form action="process.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                  <input type="name" name="name" class="form-control" id="" placeholder="Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" id="" placeholder="Email" required>
                  </div>
                <div class="mb-3">
                  <input type="password" name="password" class="form-control" id="" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <input type="file" name="profile_picture" id="profile_picture" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>