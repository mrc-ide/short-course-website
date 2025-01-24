<?php

  include "data/metadata.php";
  include "scripts/utils.php";
  include "header.php";

?>
      <script>
        function validateEmail(mail)  {
          return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail));
        }

        function validate() {
          if (document.uploader.email.value != document.uploader.email2.value) {
            alert("Email addresses must match");
            return(false);
          }
          if (!validateEmail(document.uploader.email.value)) {
            alert("Email addresses are not valid");
            return(false);
          }

          if (document.uploader.firstname.value.trim().length == 0) {
            alert("Please give your first name");
            return(false);
          }

          if (document.uploader.surname.value.trim().length == 0) {
            alert("Please give your surname");
            return(false);
          }

          if (document.uploader.title.value == "") {
            alert("Please choose a title");
            return(false);
          }

          if (document.uploader.FILE1.value == "") {
            alert("Please upload a CV");
            return(false);
          }

          if (document.uploader.country.value == "") {
            alert("Please select the country you live in");
            return(false);
          }

          if ((document.uploader.q1.value == "") || (document.uploader.q2.value == "") ||
              (document.uploader.q3.value == "") || (document.uploader.q4.value == "")) {
            alert("Please answer all four questions at the bottom.");
            return(false);
          }

          return(true);
        }

      </script>
<?php
      if (!$applications_open) {
?>
    <header class="page-header">
        <h1>Applications are now closed.</h1>
    </header>

     <div class="row-fluid">
        <div class="span 12">
          <p>Applications for the <?= substr($start_date, 0, 4) ?> course are currently closed.<br>&nbsp;<br>
        </div>
      </div>
<?php

      } else {
?>
      <header class="page-header">
        <h1>Apply for a place</h1>
      </header>

      <div class="row-fluid">
        <div class="span 12">
          <p>To apply please fill out the form below and upload a copy of your CV. Please see our <a href="privacy.php">Privacy Policy</a> about how we use the data you submit. When your application has been processed you will be notified if you have been successful or not. Last year's course was oversubscribed. Places on the course are limited, early booking is strongly advised.<br>&nbsp;<br>
<?php if ($today > $scholarship_date) {
?>
            <strong>Please note the deadline for the LMIC scholarship has now passed </strong><br>&nbsp;<br>
<?php
}
?>
          </p>

          <form action="submit.php" class="form-horizontal" method="POST" name="uploader" ENCTYPE="multipart/form-data">
            <input name="date" type="hidden" value="<?= date("d/m/Y") ?>">
            <input name="scholarship" type="hidden" value="">
            <div class="row-fluid">
              <label class="span2" for="title">Title</label>

              <div class="span4">
                <select name="title" id="title" class="required">
                  <option value="" selected>Please Select</option>
                  <option value="Miss">Miss</option>
                  <option value="Mrs">Mrs</option>
                  <option value="Ms">Ms</option>
                  <option value="Mr">Mr</option>
                  <option value="Dr">Dr</option>
                  <option value="Prof">Prof.</option>
                </select>
              </div>
              <div id="title_err" class="error_message span6"></div>
            </div>

            <div class="row-fluid">
              <label class="span2" for="firstname">First Name</label>
              <div class="span4"><input type="text" name="firstname" id="firstname" class="required"></div>
              <div id="firstname_err" class="error_message span6"></div>
            </div>

            <div class="row-fluid">
              <label class="span2" for="surname">Surname</label>
              <div class="span4"><input type="text" name="surname" id="surname" class="required"></div>
              <div id="surname_err" class="error_message span6"></div>
            </div>

            <div class="row-fluid">
              <label class="span2" for="country">Country of residence</label>
              <div class="span4">
                <select name="country" id="country" class="required">
                  <option value="" selected>Please Select</option>
<?php
  $f = fopen("data/countries.txt", "r");
  while(!feof($f)) {
    $c = trim(fgets($f));
    if (strlen($c) > 0) {
      echo "                  <option value=\"".$c."\">".$c."</option>";
    }
  }
  fclose($f)
?>
                </select>
              </div>
              <div id="country_err" class="error_message span6"></div>
            </div>

            <div class="row-fluid">
              <label class="span2" for="email">Email Address</label>
              <div class="span4"><input type="email" name="email" id="email" class="required"></div>
              <div id="email_err" class="error_message span6"></div>
            </div>

            <div class="row-fluid">
              <label class="span2" for="email2">Confirm Email Address</label>
              <div class="span4"><input type="email" name="email2" id="email2" class="required"></div>
              <div id="email2_err" class="error_message span6"></div>
            </div>
<?php
  $date = date("Y-m-d");
  if ($date <= $scholarship_date) {
    $text = "Apply for LMIC scholarship?";
    $dis = "";
  } else {
    $text = "Scholarship deadline has passed";
    $dis = "disabled=\"true\"";
  }
?>
            <div class="row-fluid">
              <label class="span2" for="lmic"><?= $text ?></label>
              <div class="span4"><input <?= $dis ?> type="checkbox" name="lmic" id="lmic" class="required"></div>
              <div id="checkbox_err" class="error_message span6"></div>
            </div>

            <hr>
            <div class="row-fluid">
              <label class="span2" for="FILE1">Attach CV</label>
              <div class="span4"><input type="file" size="50" name="FILE1" id="FILE1" class="required">
                <span class="help-block">Please include your surname in the name of the file.</span>
              </div>
              <div id="FILE1_err" class="error_message span6"></div>
            </div>
            <hr>
            <strong>Please briefly answer the following four questions; maximum 600 characters for each.</strong><br>
            &nbsp;<br>
            
            <div class="row-fluid">
              <label class="span2" for="q1">What is your motivation for attending the course?</label>
              <div class="span4">
                <textarea rows="6" style="width:100%" class="required" maxlength="600" name="q1" id="q1"/></textarea>
              </div>
              <div id="q1_err" class="error_message span6"></div>
            </div><br>


            <div class="row-fluid">
              <label class="span2" for="q2">How does your work or research align with the department's priority research themes and/or disease areas?</label>
              <div class="span4">
                <textarea rows="6" style="width:100%" class="required" maxlength="600" name="q2" id="q2"/></textarea>
              </div>
              <div id="q2_err" class="error_message span6"></div>
            </div><br>

            <div class="row-fluid">
              <label class="span2" for="q3">What is your prior experience of working with mathematical modelling or modellers?</label>
              <div class="span4">
                <textarea rows="6" style="width:100%" class="required" maxlength="600" name="q3" id="q3"/></textarea>
              </div>
              <div id="q3_err" class="error_message span6"></div>
            </div><br>

            <div class="row-fluid">
              <label class="span2" for="q4">How would you apply what you learned on the course in your work, particularly in terms of capacity building?</label>
              <div class="span4">
                <textarea rows="6" style="width:100%" class="required" maxlength="600" name="q4" id="q4"/></textarea>
              </div>
              <div id="q4_err" class="error_message span6"></div>
            </div>

            <hr>
            <div class="row-fluid">
              <div class="span4 offset2">
                <p><strong>All fields are required</strong></p>

                <input type="submit"  onClick="return validate();" id="SubmitButton" value="Submit Application">
              </div>
            </div>

          </form>
          <p><strong>Submitting the form does not guarantee a place on the course. We will contact you with further details.</strong></p>
        </div>
      </div>

<?php
  }

  include "footer.php"
?>
