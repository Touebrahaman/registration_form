<?php
$connect=mysqli_connect("localhost","root","","registration-form");
if($connect)
{
    ?>
    <script>
        alert("connection successful");
    </script>
    <?php
}
else
{
    ?>
    <script>
        alert("connection successful");
    </script>
    <?php
}
?>