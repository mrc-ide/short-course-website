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

    <style>
      .hero {
        background : url('images/panorama_home_sm.jpg') no-repeat bottom right;
        text-align : left;
        min-height : 200px;
        padding: 0.5em 1em 1em 1em;
        text-shadow : 2px 2px #ffffff;
        border-radius : 1em;
        border: 1px solid #CCCCCC;
      }

      .hero h1, .hero h3 {
        margin : 0;
      }

      #map {
        height : 250px;
      }

      #map img {
        max-width: none;
      }

    </style>
  </head>

  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a href="index.php"  class="brand"><img src="<?= $cpath ?>images/IMPERIAL_logo_RGB_Blue_2024_small.png" width="401" height="44" alt="IC_logo"></a>
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
          </ul>
          <ul class="nav">
          <?php if ($applications_open) { ?>
            <li class=""><a class="nav" href="<?= $cpath ?>book.php"><span style="color:#800000"><strong>APPLY NOW</strong></span></a></li>
           <?php } ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
