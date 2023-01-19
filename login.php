<!-- <?php
// Start the session
session_start();
?> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Logging to your profile</title>
</head>
<body>
    <div class="signup-form">
        <h1> Loggin Form </h1>
        <div class="txt">
            <form action="process.php" method="POST">
                <i class="fa fa-user"></i>
                <input type="text" placeholder="UserName" name="username">
        </div>
        
        <div class="txt">
                <i class="fa fa-lock"></i>
                <input type="password" placeholder="Password" name="Password">
        </div>
       
            <button class="btn" name="login"> Loggin </button>
        </form>
    </div>




</body>
</html>