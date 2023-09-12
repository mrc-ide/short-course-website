<?php

  include "../data/metadata.php";
  include "../db_csv.php";

  function dq($str) {
    return str_replace("\"", "'", $str);
  }

 if (!isset($_POST['command'])) {
   header('Location: index.php');

 } else {

  $command = $_POST['command'];

  if ($command == "delete") {
    delete_entries($_POST);
    header('Location: index.php');

  } else {
    
    if ($command == "meta") {
      $csv = fopen("php://memory", "w");
      fwrite($csv, "id,title,first_name,surname,email,date,cv_file,cover_file\n");


    } else if ($command == "cvs") {
      $tmpzip = tempnam(sys_get_temp_dir(), "epi");
      $zip = new ZipArchive();
      $zip->open($tmpzip, ZipArchive::CREATE);
    }

    $res = get_application_info();

    foreach ($res as $row) {
      $dt = DateTime::createFromFormat("d/m/Y", $row['date']);
      $dt2 = $dt->format("Y-m-d");
      if (isset($_POST['cb_'.$row['id']])) {
        if ($command == "cvs") {
          $zip->addFile($upload_path.$row['FILE1'], $row['FILE1']);
          $zip->addFile($upload_path.$row['FILE2'], $row['FILE2']);

        } else if ($command == "meta") {
          fwrite($csv, dq($row['id']).",");
          fwrite($csv, dq($row['title']).",");
          fwrite($csv, dq($row['firstname']).",");
          fwrite($csv, dq($row['surname']).",");
          fwrite($csv, dq($row['email']).",");
          fwrite($csv, dq($dt2).",");
          fwrite($csv, dq($row['FILE1']).",");
          fwrite($csv, dq($row['FILE2'])."\n");
        }
      }
    }

    if ($command == "meta") {
      fseek($csv, 0);
      header('Content-type: text/csv');
      header('Content-Disposition: attachment; filename="shortcourse_export.csv"');
      fpassthru($csv);

    } else if ($command == "cvs") {
      $zip->close();
      header('Content-type:  application/zip');
      header('Content-Length: ' . filesize($tmpzip));
      header('Content-Disposition: attachment; filename="shortcourse_files.zip"');
      readfile($tmpzip);
      ignore_user_abort(true);
      if (connection_aborted()) {
        unlink($f);
      }
    } 
  }
}

?>
