<?php 
session_start();
include 'connection.php';


if (isset($_POST['submit'])) 
{
   $admin_name = $_POST['adminname'];
   $admin_pass  = $_POST['adminpass'];
   $_SESSION['user'] = "admin123";
   $_SESSION['pass'] = "merier";
   $_SESSION['login'] = false;


   if (($admin_name == $_SESSION['user']) && $admin_pass == $_SESSION['pass']) 
   {
       $_SESSION['login'] = true;
       header('location: index.php');
       
   }

   elseif (($admin_name != $_SESSION['user']) && $admin_pass != $_SESSION['pass']) 
   {
    echo "<script>alert('Invalid Credentials');</script>";
   }

   elseif ($admin_name != $_SESSION['user']) 
   {
    echo "<script>alert('Invalid Admin Name');</script>";
   }
   
   elseif ($admin_name != $_SESSION['pass']) 
   {
    echo "<script>alert('Invalid Password');</script>";
   }
  
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login to admin panel</title>
</head>

<body>

    <div class="jumbotron">
        <h1 class="display-4 text-center">Login to Admin Panel!</h1>
        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="col-md-12 d-flex flex-column align-items-center">
                    <form method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Admin Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="adminname">

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Admin Password</label>
                            <input type="password" class="form-control" id="exampleFormControlTextarea1"
                                name="adminpass">
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>