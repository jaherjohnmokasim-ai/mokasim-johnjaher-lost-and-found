<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $item = trim($_POST["item"]);
    $location = trim($_POST["location"]);

    if (empty($item) || empty($location)) {
        $message = "All fields are required.";
    } else {
        $message = "Found item reported successfully!";
    }
}
?>

<h2>Report Found Item</h2>
<p style="color:green;"><?php echo $message; ?></p>

<form method="POST">
    Item Name: <input type="text" name="item"><br><br>
    Found Location: <input type="text" name="location"><br><br>
    <input type="submit" value="Submit">
</form>

<a href="dashboard.php">Back to Dashboard</a>