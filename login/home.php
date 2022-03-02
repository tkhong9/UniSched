<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body class="loggedin">
<nav class="navtop">
    <div>
        <h1>Website Title</h1>
        <a href="home.php">Home</a>
        <a href="#" onclick="showPage('timetable.html')">Timetable</a>
        <a href="#" onclick="showPage('courselist.html')">Course List</a>
        <a href="#" onclick="showPage('profile.php')"><i class="fas fa-user-circle"></i>Profile</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<div class="content" id="display">
    <h2>Home Page</h2>
    <p>Welcome back, <?=$_SESSION['name']?>!</p>
</div>

<script>
    function showPage(str) {
        $("#display").load(str);
    }
</script>

</body>
</html>
