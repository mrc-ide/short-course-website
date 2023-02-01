<?php
  include "../data/db_metadata.php";
  if (isset($_GET['file'])) {
    $file = base64_decode($_GET['file']);
    $attachment_location = $upload_path.$file;
    if (file_exists($attachment_location)) {
      header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
      header("Cache-Control: public"); // needed for internet explorer
      header("Content-Type: application/octet-stream");
      header("Content-Transfer-Encoding: Binary");
      header("Content-Length:".filesize($attachment_location));
      header("Content-Disposition: attachment; filename=".$file);
      readfile($attachment_location);
      die();
    } else {
      die("Error: File not found.");
    }
  }
?>