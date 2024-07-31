<?php


include 'connect.php';
$id=$_GET['updateid'];
$sql="Select * from `crud` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'] ;
    $password=$_POST['password'];

    $sql="UPDATE `crud` set id=$id, name='$name',  email='$email', mobile='$mobile', password='$password'
    where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:display.php'); 
    }else{
        die(mysqli_error($con));
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud_operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form method="post">
            <br> 
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" required value=<?php echo $name; ?> >

            </div>
            <br>
            <div class="form-group">
                <label >Email address</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" required value=<?php echo $email; ?>>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <br>
            <div class="form-group">
                <label >Mobile Number</label>
                <input type="tel" class="form-control" placeholder="Enter your mobile no." name="mobile" autocomplete="off" required value=<?php echo $mobile; ?>>
                
            </div>
            <br>
            <div class="form-group">
                <label >Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off" required value=<?php echo $password; ?>>
                
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>