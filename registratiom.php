<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
      <center>
        <div class="main-content">
            <form action="" method="POST">
                <br>
            <h5>create an account</h5>
            get started with your free account <br><br>
            <button class="gmail"><i class="fab fa-google-plus"></i>    login via gmail</button><br><br>
            <button class="facebook"><i class="fab fa-facebook"></i>    login via facebook</button><br>
            ----------------OR---------------- <br>
            <input name="name" type="text" placeholder="username" required><br><br>
            <input name="email" type="email" placeholder="email address" required><br><br>
            <input name="mobile-number" type="text" placeholder="mobile number" required><br><br>
            <input name="password" type="password" placeholder="password" required><br><br>
            <input name="cpassword" type="password" placeholder="confirm password" required><br><br>
            <button name="submit" class="create-account">create account</button><br><br>
            have an account? <a href="#">login</a>
            </form>

        </div>
        </center>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php
include("connection.php");
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile-number'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $pass=password_hash($password,PASSWORD_BCRYPT);
    $cpass=password_hash($cpassword,PASSWORD_BCRYPT);
    
    $email_query=mysqli_query($connect,"select * from user where email='$email'");
    $email_query_count=mysqli_num_rows($email_query);
    if($email_query_count>0)
    {
        ?>
        <script>
            alert("email does not exist");
        </script>
        <?php
    }
    else{
        if($password===$cpassword)
        {
            $insert_query=mysqli_query($connect,"insert into user(name,email,mobile,password,cpassword) values('$name','$email','$mobile','$pass','$cpass')");
            ?>
            <script>
                alert("data inserted properly");
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("password and confirm password does not match");
            </script>
            <?php
        }
    }
}

?>