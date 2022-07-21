<?php
session_start();

include 'header.php';
require '../db.php';
$errorMsg  = null;

if(isset($_POST['login'])){
    $email    = stripslashes($_POST['email']);
    $password = stripslashes($_POST['password']);

    $stmt = $pdo->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

    if(!$stmt){
        $errorMsg = "Email or password is incorrect. Please try again";
    }else{
        $_SESSION['email'] = $email;
        header('Location: ../../index.php');
    }
}

?>

<form class="input-form" method="post">
    <div class="header">
        <h1>Sign In</h1>
        <p>Don't have an account? <a href="./reg.php">Sign Up</a></p>
    </div>
    <div class="col">
        <input type="email" name="email" placeholder="Email Address">
    </div>
    <div class="col">
        <input type="password" name="password" placeholder="Password">
    </div>
    <p class="error">
        <?php echo $errorMsg; ?>
    </p>
    <div class="col">
        <button name="login">Sign In</button>
    </div>
</form>
<?php include 'footer.php'; ?>