<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <title>My time log</title>
</head>
<body>
<?php include '../views/header.view.php';?>
<section  class="time-logs cf">
  <div class="logs-list" id="logs"></div>
<?php include '../views/submitLog.view.php';?>
</body>
<script src='../public/js/ajax.js'>
</script>
</html>
