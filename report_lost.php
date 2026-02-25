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
    $description = trim($_POST["description"]);

    if (empty($item) || empty($location) || empty($description)) {
        $message = "All fields are required.";
    } elseif (strlen($description) < 10) {
        $message = "Description must be at least 10 characters.";
    } else {
        $message = "Lost item reported successfully!";
    }
}
?>

<h2>Report Lost Item</h2>
<p style="color:blue;"><?php echo $message; ?></p>

<form method="POST">
    Item Name: <input type="text" name="item"><br><br>
    Last Seen Location: <input type="text" name="location"><br><br>
    Description: <br>
    <textarea name="description"></textarea><br><br>
    <input type="submit" value="Submit">
</form>

<a href="dashboard.php">Back to Dashboard</a>