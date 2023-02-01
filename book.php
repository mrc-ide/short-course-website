<?php

  include "data/metadata.php";
  include "scripts/utils.php";
  include "header.php";

?>
      <script type="text/javascript" language="javascript">
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

          if (document.uploader.FILE2.value == "") {
            alert("Please upload a covering letter");
            return(false);
          }

          return(true);
        }

      </script>
      
      <header class="page-header">
        <h1>Apply for a place</h1>
      </header>

      <div class="row-fluid">
        <div class="span 12">
          <p>To apply please fill out the form below and upload a copy of your CV and a covering letter briefly outlining your background and explaining your reasons for wanting to attend the course. Please see our <a href="privacy.php">Privacy Policy</a> about how we use the data you submit. When your application has been processed you will be notified if you have been successful or not. Last year's course was oversubscribed. Places on the course are limited, early booking is strongly advised.<br/>&nbsp;<br/>

          <strong>If you are applying for the LMIC scholarship, please clearly state this in the first line of your cover letter and specify the country in which you are based.</strong><br/>&nbsp;<br/>

          </p>

          <form action="submit.php" class="form-horizontal" method="POST" name="uploader" ENCTYPE="multipart/form-data">
            <input name="date" type="hidden" value="<?= date("d/m/Y") ?>" />
            <input name="scholarship" type="hidden" value="" />
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
              <label class="span2" for="firstname">FirstName</label>
              <div class="span4"><input type="text" name="firstname" id="firstname" class="required" /></div>
              <div id="firstname_err" class="error_message span6"></div>
            </div>

            <div class="row-fluid">
              <label class="span2" for="surname">Surname</label>
              <div class="span4"><input type="text" name="surname" id="surname" class="required" /></div>
              <div id="surname_err" class="error_message span6"></div>
            </div>

            <div class="row-fluid">
              <label class="span2" for="email">Email Address</label>
              <div class="span4"><input type="email" name="email" id="email" class="required" /></div>
              <div id="email_err" class="error_message span6"></div>
            </div>

            <div class="row-fluid">
              <label class="span2" for="email2">Confirm Email Address</label>
              <div class="span4"><input type="email" name="email2" id="email2" class="required" /></div>
              <div id="email2_err" class="error_message span6"></div>
            </div>

            <div class="row-fluid">
              <label class="span2" for="file1">Attach CV</label>
              <div class="span4"><input type="file" size="50" name="FILE1" id="FILE1" class="required" />
                <span class="help-block">Please use your surname in the name of the file.</span>
              </div>
              <div id="FILE1_err" class="error_message span6"></div>
            </div>

            <div class="row-fluid">
              <label class="span2" for="file1">Attach Cover Letter</label>
              <div class="span4"><input type="file" size="50" name="FILE2" id="FILE2" class="required" />
                <span class="help-block">Please use your surname in the name of the file.</span>
              </div>
              <div id="FILE2_err" class="error_message span6"></div>
              <INPUT TYPE=hidden NAME="saveto" value="disk" checked />
            </div>

            <div class="row-fluid">
              <div class="span4 offset2">
                <p><strong>All fields are required</strong></p>

                <input type="submit"  onClick="return validate();" id="SubmitButton" value="Submit Application"/>
              </div>
            </div>

          </form>
          <p><strong>Submitting the form does not guarantee a place on the course. We will contact you with further details.</strong></p>
        </div>
      </div>

<?php
  include "footer.php"
?>
