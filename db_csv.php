<?php

  include "data/db_metadata.php";

  function check_lock() {
    global $upload_path;
    if (!file_exists($upload_path."metadata.lck")) {
      $fl = fopen($upload_path."metadata.lck", "w");
      fwrite($fl, "lock");
      fclose($fl);
    }
  }

  // Here we want to return the results sorted by id.

  function get_application_info() {
    check_lock();
    global $upload_path;
    $fl = fopen($upload_path."metadata.lck", "r+");
    if (flock($fl, LOCK_EX)) {
      $f = fopen($upload_path."metadata.csv", "r");
      $header = fgets($f);
      $csv = array();
      while (!feof($f)) {
        $bits = preg_split("/\t+/", fgets($f));
        if (count($bits) > 1) {
          $csv[] = base64_decode($bits[0])."\t".$bits[1]."\t".$bits[2]."\t".
                                 $bits[3]."\t".$bits[4]."\t".$bits[5]."\t".
                                 $bits[6]."\t".$bits[7]."\t".$bits[8];
        }
      }
      fclose($f);
      rsort($csv);
      foreach ($csv as $line) {
        $bits = preg_split("/\t+/", $line);
        $row = array();
        $row['id'] = $bits[0];
        $row['title'] = base64_decode($bits[1]);
        $row['firstname'] = base64_decode($bits[2]);
        $row['surname'] = base64_decode($bits[3]);
        $row['email'] = base64_decode($bits[4]);
        $row['FILE1'] = base64_decode($bits[5]);
        $row['FILE2'] = base64_decode($bits[6]);
        $row['date'] = base64_decode($bits[7]);
        $row['scholarship'] = base64_decode($bits[8]);
        $res[] = $row;
      }
      flock($fl, LOCK_UN);
    }
    fclose($fl);
    return $res;
  }


  function delete_entries($post) {
    check_lock();
    global $upload_path;

    $fl = fopen($upload_path."metadata.lck", "r+");
    if (flock($fl, LOCK_EX)) {
      $f = fopen($upload_path."metadata.csv", "r");
      $fw = fopen($upload_path."metadata.csv.tmp", "w");
      $header = fgets($f);
      fputs($fw, $header);
      $csv = array();
      while (!feof($f)) {
        $line = fgets($f);
        $bits = preg_split("/\t+/", $line);
        if (count($bits) > 1) {
          $id = base64_decode($bits[0]);
          if (isset($post['cb_'.$id])) {
            $FILE1 = base64_decode($bits[5]);
            $FILE2 = base64_decode($bits[6]);
            if (file_exists($upload_path.$FILE1)) unlink($upload_path.$FILE1);
            if (file_exists($upload_path.$FILE2)) unlink($upload_path.$FILE2);
          } else {
            fputs($fw, $line);
          }
        }
      }
      fclose($f);
      fclose($fw);
      if (file_exists($upload_path."metadata.csv.old")) {
        unlink($upload_path."metadata.csv.old");
      }
      rename($upload_path."metadata.csv", $upload_path."metadata.csv.old");
      rename($upload_path."metadata.csv.tmp", $upload_path."metadata.csv");
      flock($fl, LOCK_UN);
    }
    fclose($fl);
  }

  function get_next_id() {
    check_lock();
    global $upload_path;
    $fl = fopen($upload_path."metadata.lck", "r+");
    if (flock($fl, LOCK_EX)) {
      $f = fopen($upload_path."metadata.csv", "r");
      $header = fgets($f);
      while (!feof($f)) {
        $line = fgets($f);
        $bits = preg_split("/\t+/", $line);
        if (count($bits) > 1) {
          $remember = $bits[0];
        }
      }
      flock($fl, LOCK_UN);
    }
    fclose($f);
    return intval(base64_decode($remember)) + 1;
  }

  function add_application($id, $title, $firstname, $surname, $email, $cvname, $lettername, $date, $scholarship) {
    check_lock();
    global $upload_path;
    $fl = fopen($upload_path."metadata.lck", "r+");
    if (flock($fl, LOCK_EX)) {
      $f = fopen($upload_path."metadata.csv", "a");
      fputs($f, base64_encode($id)."\t".
                base64_encode($title)."\t".
                base64_encode($firstname)."\t".
                base64_encode($surname)."\t".
                base64_encode($email)."\t".
                base64_encode($cvname)."\t".
                base64_encode($lettername)."\t".
                base64_encode($date)."\t".
                base64_encode($scholarship)."\n");
      fclose($f);
      flock($fl, LOCK_UN);
    }
    fclose($fl);
  }

?>
