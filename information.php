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
              <li><a href="#getting_here" data-toggle="tab" onclick="reload('map')">Getting to St. Mary's</a></li>
              <li><a href="#accomodation" data-toggle="tab">Accommodation</a></li>
              <li><a href="#visas" data-toggle="tab">Visas</a></li>
              <li><a href="#cancellations" data-toggle="tab">Cancellations</a></li>
            </ul>
            <div id="infotabscontent" class="span12 tab-content">
              <div id="registration"  class="tab-pane active" >
                <h2>Registration</h2>
<?php if (!$applications_open) { ?>
                <p>The <?= substr($start_date, 0, 4) ?> course is now fully subscribed, and applications are closed. </p>
<?php } else { ?>
                <p><strong>Early booking is strongly advised</strong>. All applications will be acknowledged. Provisional places will only be confirmed when full fee payment has been received. Please submit all applications using the <a href="http://www.infectiousdiseasemodels.org/book/">online application form</a>.</p>
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

            <!--   <p class="alert alert-info"><b>Please Note: </b> The deadline to apply for the LMIC Scholarship has now passed</p> -->

                <p>We offer a limited number of scholarships for participants from LMICs; scholarship applications must be received by <?=friendly_date($scholarship_date)?>.</p>

              </div>
              <div id="getting_here" class="tab-pane">
                <h2>Getting to St. Mary's</h2>
                <div class="row-fluid">
                  <div class="span7">
      
                    <h3>By Air</h3>
                    <p><strong>Heathrow</strong> - St. Mary's is situated close to Paddington Station which is in easy reach of Heathrow Airport via the Heathrow Express or Elizabeth line.  </p>
                    <p>Gatwick, Stansted, Luton and City Airports are all easily accessible via tube connections.</p>

                    <h3>By Rail and Tube</h3>
                    <p>Paddington Station is on the Circle, Disrict, Bakerloo, Elizabeth, and Hammersmith &amp; City Underground Lines which are easily accessible from mainline rail stations.</p>
                    <p>For timetable and journey planning please visit the Transport for London Website.</p>

                    <h3>By Car</h3>
                    <a href="http://maps.google.co.uk/maps?f=q&hl=en&geocode=&q=w2+1pg&sll=53.800651,-4.064941&sspn=25.410451,64.423828&ie=UTF8&ll=51.517763,-0.173163&spn=0.006336,0.015728&z=17&g=w2+1pg&iwloc=addr">Please click here for journey planning routes.</a>
                  </div>
                  <div class="span5">
                    <iframe id="map" style="border: 1px solid black; margin: 0px 0px 0px 0px; overflow:hidden;" width="425" height="350" src="https://www.openstreetmap.org/export/embed.html?bbox=-0.17644107341766357%2C51.51592028776117%2C-0.16936004161834717%2C51.518958004956936&amp;layer=mapnik&amp;marker=51.51743750260857,-0.17317414283752441"></iframe><br><small><a href="https://www.openstreetmap.org/?mlat=51.51744&amp;mlon=-0.17317#map=18/51.51744/-0.17317">View Larger Map</a></small>
                  </div>
                </div>
              </div>
              
              <div id="accomodation" class="tab-pane">
                <h2>Accommodation</h2>
                <p>Single bedroom accommodation is available in local hotels within easy access to the St. Mary's Hospital Campus. Student accommodation at the South Kensington campus is also available (<a href="https://www.imperial.ac.uk/visit/summer-accommodation/">https://www.imperial.ac.uk/visit/summer-accommodation/</a>).</p>    
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
