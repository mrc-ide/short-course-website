<?php 
  include("header.php");
  include("data/metadata.php");
  include("data/db_metadata.php");
  include("scripts/utils.php");
?>
 	<div class="row-fluid">
	  	<div class="span8">
       <div class="page-header">
<?php

  function get_db_id($con) {
    $res = sqlsrv_query($con, "SELECT max(id) as county FROM dbo.IDM_applications");
    $row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);
    sqlsrv_free_stmt($res);
    return 1 + intval($row['county']);
  }

  $ok = true;
  if (!isset($_POST['title'])) $ok = false;
  else $title = $_POST['title'];
  if (!isset($_POST['firstname'])) $ok = false;
  else $firstname = $_POST['firstname'];
  if (!isset($_POST['surname'])) $ok = false;
  else $surname = $_POST['surname'];
  if (!isset($_POST['email'])) $ok = false;
  else $email = $_POST['email'];
  if (!isset($_POST['email2'])) $ok = false;
  else $email2 = $_POST['email2'];
  if ($email != $email2) $ok = false;
  if (!isset($_POST['date'])) $ok = false;
  else $date = $_POST['date'];

  $cvname = $_FILES['FILE1']['name'];
  $lettername = $_FILES['FILE2']['name'];
  $scholarship = "0";

  if ($ok) {
    $con = sqlsrv_connect($db_host, $db_info);
    $id = get_db_id($con);
    $cvname = $id."-".$cvname;
    $lettername = $id."-".$lettername;

    $file = $_FILES["FILE1"];

    if (!move_uploaded_file($file['tmp_name'], $upload_path.$cvname)) {
      throw new Exception('Your CV could not be uploaded. The file might be too big, please try again with a smaller file.');
    }

    $file = $_FILES["FILE2"];

    if (!move_uploaded_file($file['tmp_name'], $upload_path.$lettername)) {
      throw new Exception('Your CV could not be uploaded. The file might be too big, please try again with a smaller file.');
    }

    $stmt = sqlsrv_prepare($con, 'INSERT INTO IDM_applications (id, title, firstname, surname, email, FILE1, FILE2, date, scholarship) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)',
      array($id, $title, $firstname, $surname, $email, $cvname, $lettername, $date, $scholarship));
    if (!sqlsrv_execute($stmt)) {
      die(print_r(sqlsrv_errors(), true));
    }
?>
      &nbsp;<br/>&nbsp;
      <h1>Application Submitted</h1>           
    </div>
    <p class="alert alert-success">Thank you for submitting your application for the Introduction to Mathematical Models of the Epidemiology and Control of Infectious Diseases <?= year_span($start_date, $start_date) ?>.</p>

    <p>Your unique application ID is <strong><?php echo $id; ?></strong> <em>Please make a note of this.</em></p>
    <p>Applications are assessed in batches. If you do not hear from us within 28 days, please email <a href="mailto:infectiousdiseasemodels@imperial.ac.uk">infectiousdiseasemodels@imperial.ac.uk</a></p> 

<?php

  } else { // not ok

?>
    <p class="alert alert-danger">
        <b>Your application failed</b> please contact <a href="mailto:infectiousdiseasemodels@imperial.ac.uk">infectiousdiseasemodels@imperial.ac.uk</a> and we will try and resolve the issue.
      </p>
<?php

  }
?>

  </div>
</div>

<?php 
  include("footer.php");
?>
