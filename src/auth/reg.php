<?php
include 'header.php';
require '../db.php';
$errorMsg = null;

if(isset($_REQUEST['create'])){
    $name = stripslashes($_REQUEST['name']);
    $email = stripslashes($_REQUEST['email']);
    $password = stripslashes($_REQUEST['password']);

    $emailCheck = "SELECT * FROM `users` WHERE email LIKE ?";


    $email_check = "SELECT * FROM `users` WHERE email LIKE ?";

    $stmt  = $pdo -> prepare($email_check);
    $stmt -> execute([$email]);

    $check = $stmt -> fetch();

    if($check){
        $errorMsg = 'The email address is already in use.';            
    }else{
        $stmt = $pdo -> query("INSERT INTO users (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')");
        if($stmt){
            header("Location: login.php");
        }else{
            $errorMsg = "Something went wrong. Please try again";
        }
    }
}

?>
<form class="input-form" method="post">
    <div class="header">
        <h1>Sign up with your email</h1>
        <p>Already have an account? <a href="./login.php">Sign in</a></p>
    </div>
    <div class="col">   
        <input type="text" name="name" placeholder="Full Name" required>
    </div>
    <div class="col">
        <input type="email" name="email" placeholder="Email Address" required>
    </div>
    <div class="col">
        <input type="password" name="password" placeholder="Password" required>
    </div>
    <p class="error">
        <?php echo $errorMsg; ?>
    </p>
    <div class="col">
        <button name="create">Create Account</button>
    </div>
</form>
<?php include 'footer.php'; ?>