<?php
session_start();
$message = "";

if (isset($_GET["signup"])) {
    $message = "Registration successful! Please login.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    if (
        $email == $_SESSION["registered_email"] &&
        $password == $_SESSION["registered_password"]
    ) {
        $_SESSION["logged_in"] = true;
        $_SESSION["user"] = $_SESSION["registered_user"];

        // ✅ Cookie: remember email
        setcookie("remember_email", $email, time() + 3600);

        header("Location: dashboard.php");
        exit();
    } else {
        $message = "Invalid login details.";
    }
}
?>

<h2>Lost & Found Login</h2>
<p style="color:green;"><?php echo $message; ?></p>

<form method="POST">
    Email:
    <input type="text" name="email"
    value="<?php echo isset($_COOKIE['remember_email']) ? $_COOKIE['remember_email'] : ''; ?>">
    <br><br>

    Password: <input type="password" name="password"><br><br>
    <input type="submit" value="Login">
</form>

<a href="signup.php">Create Account</a>