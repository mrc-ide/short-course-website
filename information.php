<?php

  include "data/metadata.php";
  include "scripts/utils.php";
  include "header.php";

?>


      <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
      <script>
        $(function() {
          if (location.hash) {
            $('a[href=' + location.hash +']').tab('show');
          }
          $('a[href=#getting_here]').on('shown',function(){
          });
        });

        function reload(id) {
          var buggyid = document.getElementById(id);
          buggyid.src = buggyid.src;
        }

      </script>

      <header class="page-header">
        <h1>Course Information</h1>
      </header>            
      <div class="row-fluid">
        <div class="span12">
          <div class="row-fluid tabbable">
            <ul id="infotabs" class="nav nav-tabs span12">
              <li class="active"><a href="#registration" data-toggle="tab">Registration</a></li>
              <li><a href="#payment" data-toggle="tab">Payment</a></li>
              <li><a href="#getting_here" data-toggle="tab" onclick="reload('map')">Getting to the White City Campus</a></li>
              <li><a href="#visas" data-toggle="tab">Visas</a></li>
              <li><a href="#cancellations" data-toggle="tab">Cancellations</a></li>
            </ul>
            <div id="infotabscontent" class="span12 tab-content">
              <div id="registration"  class="tab-pane active" >
                <h2>Registration</h2>
<?php if (!$applications_open) { ?>
                <p>The <?= substr($start_date, 0, 4) ?> course is now fully subscribed, and applications are closed. </p>
<?php } else { ?>
                <p><strong>Early booking is strongly advised</strong>. All applications will be acknowledged. Provisional places will only be confirmed when full fee payment has been received. Please submit all applications using the <a href="https://www.infectiousdiseasemodels.org/book.php">online application form</a>.</p>
<?php } ?>

              </div>
    
              <div id="payment" class="tab-pane">
                <h2>Payment</h2>
                <p>The fee for course is &pound;<?=$early_cost ?> if booked before <?=friendly_date($early_booking_date) ?>, and &pound;<?=$standard_cost ?> if booked after that date.</p>

                <p>The optional maths and Excel refresher day the day before the course starts is free of charge. The fee covers tuition, social events and a comprehensive set of digital course notes.</p>
                <p>We can accept payment by credit card (we accept Visa, MasterCard or JCB), debit card (we accept Visa, Visa Electron, Maestro or Solo), or cheque / bank draft. We ask you to indicate your method of payment when you apply for the course. </p>

                <p>We do not require payment details when you apply: we will tell you how to pay once you have been offered a place.</p>
                <p>Payments will be accepted until <?=friendly_date($last_payment_date) ?> (5pm BST)</p>
                <h2>Scholarships available for candidates from LMICs</h2>
<?php if ($today > $scholarship_date) {
?>
                  <p class="alert alert-info"><b>Please Note: </b> The deadline to apply for the LMIC Scholarship has now passed</p>
<?php
                }
?>

               <p>We offer a limited number of scholarships for participants from LMICs; scholarship applications must be received by <?=friendly_date($scholarship_date)?>.</p>

              </div>
              <div id="getting_here" class="tab-pane">
                <h2>Getting to White City</h2>
                <div class="row-fluid">
                  <div class="span7">
      
                    <h3>By Air</h3>
                    <p>The closest airport is Heathrow, from where a taxi or other private road transport will take approximately 35 minutes to reach the Campus. Via the underground, you can take the new Elizabeth Line to Ealing Broadway and then change to the Central line to White City. Alternatively, the Heathrow Express and Hammersmith and City / Circle line trains will take you into Wood Lane station in approximately 45 minutes.</p>

                    <h3>By Public Transport</h3>
                    <p>The nearest Underground station is White City, served by the Central line.

The Campus is also just six minutes walk from Wood Lane station (Circle and Hammersmith and City lines) and just under 20 minutes walk from Shepherd’s Bush station (Central line, Overground and National Rail connections).</p>
                    <p>Plan your route with the 
                <a href="https://tfl.gov.uk/plan-a-journey/">Transport for London journey planner</a>). </p>

                    <h3>By Car</h3>
                    <p>Imperial’s White City Campus is next to the Westway (A40), a key route into the heart of London. It also takes you outwards to the North Circular ring road (A406) surrounding central London, and beyond to the M25 encircling Greater London.

There is parking provision for external, registered visitors and for maintenance contractors who need to access the site. There are also permanent parking spaces for disabled staff and disabled students based at the White City Campus. </p>
                  </div>
                  
                </div>
              </div>
              <div id="visas" class="tab-pane">
                <h2>Visas</h2>
                <p>Overseas delegates requiring Visas for the UK are responsible for their application and should allow sufficient time for the process to be completed.</p>
              </div>
        
              <div id="cancellations" class="tab-pane">
                <h2>Cancellations</h2>
                <p>If you wish to cancel your place on the course please inform us by email. Cancellations made more than four weeks before the start of the course will be be offered an 80% refund. If you cancel within four weeks of the start of the course we may not offer you a refund.</p>
            
                <p>We reserve the right to cancel the course at short notice. We will endeavour to provide participants with as much notice as possible, but will not accept liability for costs incurred by participants or their organisations for the cancellation of travel arrangements and/or accommodation reservations as a result of the course being cancelled or postponed. If a course is cancelled, fees will be refunded in full. We also reserve the right to postpone or make alterations to the content of the course.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php 
  include "footer.php"
?>
