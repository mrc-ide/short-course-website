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
      fwrite($csv, "id\ttitle\tfirst_name\tsurname\temail\tdate\tcv_file\tcover_file\tcountry\tq1\tq2\tq3\tq4\n");


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
          if (file_exists($upload_path.$row['FILE2'])) {
            $zip->addFile($upload_path.$row['FILE2'], $row['FILE2']);
          }

        } else if ($command == "meta") {
          fwrite($csv, dq($row['id'])."\t");
          fwrite($csv, dq($row['title'])."\t");
          fwrite($csv, dq($row['firstname'])."\t");
          fwrite($csv, dq($row['surname'])."\t");
          fwrite($csv, dq($row['email'])."\t");
          fwrite($csv, dq($dt2)."\t");
          fwrite($csv, dq($row['FILE1'])."\t");
          fwrite($csv, dq($row['FILE2'])."\t");
          fwrite($csv, dq($row['country'])."\t");
          fwrite($csv, dq($row['q1'])."\t");
          fwrite($csv, dq($row['q2'])."\t");
          fwrite($csv, dq($row['q3'])."\t");
          fwrite($csv, dq($row['q4'])."\n");
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
