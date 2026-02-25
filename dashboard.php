<?php
session_start();

if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Lost & Found Dashboard</h2>

<p>Welcome, <?php echo $_SESSION["user"]; ?> 👋</p>

<?php
if (isset($_COOKIE["remember_email"])) {
    echo "<p>Logged in as: " . $_COOKIE["remember_email"] . "</p>";
}
?>

<hr>

<a href="report_lost.php">Report Lost Item</a><br><br>
<a href="report_found.php">Report Found Item</a><br><br>
<a href="logout.php">Logout</a>