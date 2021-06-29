<?php 
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");


}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Candy Crush</title>
    <link rel="stylesheet" href="style.css">
    <script src="app.js" charset="utf-8"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="score-board">
      <h3>score</h3>
      <h1 id=<?php $score = "SELECT score * FROM users WHERE username='$username' AND password='$password'"  echo $score; ?>></h1>
    </div>
    <div class="grid"></div>
    <a href="logout.php">Logout</a>
  </body>
</html>
