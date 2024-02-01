<?php
  $cpath = "../";
  include "../data/metadata.php";
  include "../scripts/utils.php";
  include "../header.php";
  include "../db_csv.php";

  $dateto = "";
  $datefrom = "";
  if (isset($_POST['datefrom'])) {
    $datefrom = DateTime::createFromFormat("Y-m-d", $_POST['datefrom']);
    echo "<script>document.fdate.datefrom.value = '".$_POST['datefrom']."';</script>";
  }

  if (isset($_POST['dateto'])) {
    $dateto = DateTime::createFromFormat("Y-m-d", $_POST['dateto']);
    echo "<script>document.fdate.dateto.value = '".$_POST['dateto']."';</script>";
  }

  if (!isset($_POST['datefrom'])) $_POST['datefrom'] = "";
  if (!isset($_POST['dateto'])) $_POST['dateto'] = "";


  function get_data() {
    global $db_info, $db_host, $datefrom, $dateto, $upload_path;
    $res = get_application_info();

    foreach ($res as $row) {
      $dt = DateTime::createFromFormat("d/m/Y", $row['date']);
      $ok = true;
      if ($datefrom != "") {
        if ($dt < $datefrom) $ok = false;
      }
      if ($dateto != "") {
        if ($dt > $dateto) $ok = false;
      }

      if ($ok) {
        $dt2 = $dt->format("Y-m-d");
        echo "        <tr><td><input type='checkbox' id='cb_".$row['id']."' name='cb_".$row['id']."'></td>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['title']."</td><td>".$row['firstname']."</td>";
        echo "<td>".$row['surname']."</td>";
        if ($row['scholarship'] == "1") {
          echo "<td style='text-align:center'>Y</td>";
        } else {
          echo "<td>&nbsp;</td>";
        }
        if (file_exists($upload_path.$row['FILE1'])) {
          echo "<td><a href='getfile.php?file=".base64_encode($row['FILE1'])."'>Download</a></td>";
        } else {
          echo "<td>&nbsp;</td>";
        }

        if (file_exists($upload_path.$row['FILE2'])) {
          echo "<td><a href='getfile.php?file=".base64_encode($row['FILE2'])."'>Download</a></td>";
        } else {
          echo "<td>&nbsp;</td>";
        }
        echo "<td>".$dt2."</td></tr>\n";
      }
    }
  }
?>

<header class="page-header">
  <h1 style="color:#44536b;"> Delegate Registrations</h1>
</header>

<form action="index.php" method="post" id="fdate" name="fdate" class="form-horizontal">
  <table class="text-align:center" style="padding: 20px"><tr>
    <td>Between</td>
    <td><input class="input-medium" type="date" name="datefrom" id="datefrom" value="<?= $_POST['datefrom'] ?>"></td>
    <td>and</td>
    <td><input class="input-medium" type="date" name="dateto" id="dateto" value="<?= $_POST['dateto'] ?>"></td>
    <td><button type="submit" class="btn btn-primary">Filter</button></td>
  </tr></table>
</form>

<script>
  function checkAll(all) {
    var cbs = document.getElementsByTagName('input');
    for (var i=0; i<cbs.length; i++) {
      if ((cbs[i].type == 'checkbox') && (cbs[i].name != "all")) {
        cbs[i].checked = all.checked;
      }
    }
  }

  function countAll() {
    var count = 0;
    var cbs = document.getElementsByTagName('input');
    for (var i=0; i<cbs.length; i++) {
      if (cbs[i].checked) count++;
    }
    return count;
  }


  function subm(type) {
    var count = countAll();
    if (count == 0) {
      alert("No entries selected.");
      return(false);
    }

    if ((type == "cvs") || (type == "meta")) {
      document.fentries.target = "_blank";
      document.fentries.action = "download_cvs_meta.php";
      document.fentries.command.value = type;
      document.fentries.submit();

    } else if (type == "delete") {
      var cent = count + " entries.";
      if (count == 1) cent = "1 entry.";
      var conf = prompt("This will permanently delete the uploads and information for " + cent + "\nPlease type DELETE to do so.", "CANCEL");
      if (conf == "DELETE") {
        document.fentries.action = "download_cvs_meta.php";
        document.fentries.command.value = "delete";
        document.fentries.submit();
      }
    }
  }

</script>

<div class="row-fluid">
  <div class="span12">
    <form action="index.php" method="post" id="fentries" name="fentries">
      <input type="hidden" name="command" value="download" >
      <table class="table table-striped table-hover table-bordered">
        <tr><th><input onclick="javascript:checkAll(this)" type="checkbox" name="all" id="all">  All </th><th>id</th><th>Title</th><th>First name </th><th>Surname</th><th>LMIC App</th><th>CV</th><th>Covering Letter </th><th>Date</th></tr>
        <?php get_data(); ?>
      </table>
      <button onclick="subm('cvs')" type="button" class="btn btn-success">Download Selected CVs and Covering Letters</button>
      <button onclick="subm('meta')" type="button" class="btn btn-info">Download CSV of Selected Info</button>
      <button onclick="subm('delete')" type="button" class="btn btn-danger">Deleted Selected Entries</button>
    </form>
  </div>
</div>

<?php
  include "../footer.php";
?>
