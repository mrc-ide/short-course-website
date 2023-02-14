<!DOCTYPE html>

<?php if (!isset($cpath)) $cpath = ""; ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?= $cpath ?>images/favicon.ico" type="image/x-icon">
    <title>Epidemiology & Control of Infectious Diseases - Short Course</title>

    <script src="<?= $cpath ?>scripts/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="<?= $cpath ?>scripts/jquery-1.8.3.min.js"></script>
    <script src="<?= $cpath ?>scripts/bootstrap.min.js" ></script>
    <script src="<?= $cpath ?>scripts/plugins.js" ></script>
    <script src="<?= $cpath ?>scripts/holder.js"></script>

    <link rel="stylesheet" type="text/css" href="<?= $cpath ?>css/main.css">

  </head>

  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a href="index.php"  class="brand"><img src="<?= $cpath ?>images/logo_imperial_college_london.png" width="168" height="44" alt="IC_logo"></a>
          <button type="button" class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <ul class="nav nav-collapse">
            <li class=""><a href="<?= $cpath ?>index.php">Home</a></li>
            <li class=""><a href="<?= $cpath ?>course.php">The Course</a></li>
            <li class=""><a href="<?= $cpath ?>about.php">About Us</a></li>
            <li class=""><a href="<?= $cpath ?>information.php">Useful Information</a></li>
            <li class=""><a href="<?= $cpath ?>contact.php">Contact Us</a></li>
<?php if ($applications_open) { ?>
            <li class=""><a href="<?= $cpath ?>book.php"><strong>APPLY NOW</strong></a></li>
<?php } ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">