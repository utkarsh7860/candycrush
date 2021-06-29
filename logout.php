<?php 

include 'config.php';

session_start();

if (isset($_SESSION['score']) and isset($_SESSION['username'])) {
    $score = $_SESSION['score'];
    $username = $_SESSION['username'];
    $sql = "UPDATE users SET score=".$_SESSION['score']." WHERE username='$username'";
    mysqli_query($conn, $sql);
}

session_destroy();

header("Location: index.php");

?>