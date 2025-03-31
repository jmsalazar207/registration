<!DOCTYPE html>
<html lang="en">
<?php
session_start();
 include "includes/session.php";
 if (!isset($_SESSION['forbidden'])) {
    header("Location: HomePage.php");
    exit();
  }
  unset($_SESSION['forbidden']);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            text-align: center;
        }
        .container img {
            width: 100px;
        }
        h1 {
            font-size: 50px;
            color: #d9534f;
            margin-top: 10px;
        }
        p {
            font-size: 18px;
            margin: 15px 0;
        }
        .btn-container {
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            margin: 5px;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }
        .btn-back {
            background: #007bff;
            color: white;
        }
        .btn-home {
            background: #28a745;
            color: white;
        }
        .btn:hover {
            opacity: 0.8;
        }
        @media (max-width: 600px) {
            .container {
                width: 90%;
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="https://cdn-icons-png.flaticon.com/512/565/565547.png" alt="Forbidden Icon">
        <h1>403</h1>
        <p><strong>Access Denied</strong></p>
        <p>Oops! You don’t have permission to access this page.</p>
        <div class="btn-container">
            <a href="javascript:history.back()" class="btn btn-back">🔙 Go Back</a>
            <a href="homePage.php" class="btn btn-home">🏠 Home</a>
        </div>
    </div>
</body>
</html>
