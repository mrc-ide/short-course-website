<?php
  include("data/metadata.php");
  include("header.php");
  include("data/db_metadata.php");
  include("db_csv.php");
  include("scripts/utils.php");
?>
 	<div class="row-fluid">
	  	<div class="span8">
       <div class="page-header">
<?php

  $ok = true;
  if (!isset($_POST['title'])) $ok = false;
  else $title = $_POST['title'];
  if (!isset($_POST['firstname'])) $ok = false;
  else $firstname = $_POST['firstname'];
  if (!isset($_POST['surname'])) $ok = false;
  else $surname = $_POST['surname'];
  if (!isset($_POST['country'])) $ok = false;
  else $country = $_POST['country'];
  if (!isset($_POST['email'])) $ok = false;
  else $email = $_POST['email'];
  if (!isset($_POST['email2'])) $ok = false;
  else $email2 = $_POST['email2'];
  if ($email != $email2) $ok = false;
  if (!isset($_POST['date'])) $ok = false;
  else $date = $_POST['date'];

  if (!isset($_POST['q1'])) $ok = false;
  else $q1 = $_POST['q1'];
  if (!isset($_POST['q2'])) $ok = false;
  else $q2 = $_POST['q2'];
  if (!isset($_POST['q3'])) $ok = false;
  else $q3 = $_POST['q3'];
  if (!isset($_POST['q4'])) $ok = false;
  else $q4 = $_POST['q4'];

  $cvname = $_FILES['FILE1']['name'];

  $scholarship = 0;

  if (isset($_POST['lmic'])) {
    if ($_POST['lmic'] == "on") {
      $scholarship = 1;
    }
  }

  if ($ok) {
    $id = get_next_id();
    $cvname = $id."-".$cvname;

    $file = $_FILES["FILE1"];

    if (!move_uploaded_file($file['tmp_name'], $upload_path.$cvname)) {
      throw new Exception('Your CV could not be uploaded. The file might be too big, please try again with a smaller file.');
    }

    add_application($id, $title, $firstname, $surname, $country, $email, $cvname, "NULL", $date, $scholarship, $q1, $q2, $q3, $q4);
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
