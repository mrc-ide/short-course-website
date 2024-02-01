<?php

  include "data/metadata.php";
  include "scripts/utils.php";
  include "header.php";

?>

      <!-- Kick off the carousel //-->

      <script>
        $(function() {
          $('.carousel').carousel({
              interval: 5000
          });
        });
      </script>

      <!-- Style for the front page big banner //-->


      <!-- The actual large banner //-->

      <header class="page-header hero">
        <h1>Introduction to Mathematical Models of the </h1>
        <h1>Epidemiology &amp; Control of Infectious Diseases</h1>
        <p class="lead">An interactive short course for professionals</p>
        <p class="lead"><?= friendly_date_span($start_date, $end_date) ?></p>
      </header>

      <div class="row-fluid">
        <div class="span8">
          <p class="lead"><span style="color:#800000"><strong><u>IN-PERSON COURSE FOR 2024:</u></strong></span><span style="color:#800000"> We look forward to welcoming delegates in person in 2024, circumstances permitting. If a move to remote teaching is necessary for any reason, we will keep delegates informed regarding logistics and fees.
          </span></p>

          <hr>
          <p class="lead"> Taught by leading researchers who advise policy-makers internationally. Topics include HIV, TB, malaria, outbreak response, COVID-19, health economics, vaccination programmes, stochastic models &amp; more.</p>

          <h3>Organised by:</h3>
          <ul class="unstyled">
          <li><a href="https://www.imperial.ac.uk/school-public-health/infectious-disease-epidemiology/" target="_blank">Department of Infectious Disease Epidemiology  Imperial College London</a></li>
          <li> School of Public Health, White City</li>
          </ul>

          <h3>Incorporating:</h3>
          <ul class="unstyled">
            <li><a href="https://www.imperial.ac.uk/mrc-global-infectious-disease-analysis" target="_blank">MRC Centre for Global Infectious Disease Analysis</a></li>
            <li><a href="http://www.epidem.org/" target="_blank">UNAIDS Epidemiology Reference Group secretariat</a></li>
            <li><a href="https://www.imperial.ac.uk/hpru-modelling/" target="_blank">NIHR HPRU in Modelling and Health Economics</a></li>
          </ul>

          <div class="row-fluid">
            <div class="span6">
              <h3>Presenters include</h3>

              <ul class="unstyled">
                <li>Prof Neil Ferguson OBE FMedSci</li>
                <li>Prof Azra Ghani MBE FMedSci</li>
                <li>Prof Tom Churcher</li>
                <li>Prof Maria-Gloria Basáñez</li>
                <li>Prof Nicholas Grassly</li>
                <li>Prof Katharina Hauck</li>
                <li>Prof Peter White</li>
                <li>Prof Tim Hallett</li>
              </ul>
            </div>
            <div class="span6">
              <h3>Directed by</h3>
              <ul class="unstyled">
                <li>Dr Anne Cori</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="span4">
          <div id="myCarousel" class="carousel slide visible-desktop">
            <div class="carousel-inner">
<?php
        for ($i = 1; $i <= 23; $i++) {
          echo "              <div class='item".($i == 1 ? " active" : "")."'>".
               "<img alt='' src='images/carousel/".$i.".jpg' class='img-polaroid'></div>\n";
        }
?>
            </div>
          </div>
        </div>
        <ul>
          <li><?= friendly_date_span($start_date, $end_date) ?></li>
          <li><strong>Free Maths and Excel Refresher Day:<br></strong><?= friendly_date($maths_date) ?></li>
          <li>Cost: <?= cost($early_cost) ?> before <?= friendly_date($early_booking_date) ?>, <?= cost($standard_cost) ?> after. </li>
          <li><strong>Applications for <?= year_span($start_date, $end_date) ?> are now <?= ($applications_open) ? "open" : "closed" ?></strong></li>
         <li><strong>A limited number of full scholarships</strong> (covering course fees, flights and accommodation) are available for candidates from LMICs. The deadline for scholarship applications is <?= friendly_date($scholarship_date) ?>.</li>
           <!--       <li><strong>Please note the scholarship deadline has now passed <br></strong></li> -->
        </ul>
        <p>
          <strong>Contact: <a href="https://www.imperial.ac.uk/people/l.whittles">Dr Lilith Whittles</a> or <a href="https://www.imperial.ac.uk/people/c.mccormack14">Dr Clare McCormack</a></strong><br>
          <strong>Email:</strong> <a href="mailto:infectiousdiseasemodels@imperial.ac.uk">infectiousdiseasemodels@imperial.ac.uk</a><br>
          <strong>APPLY NOW:</strong> <a class="nav" href="<?= $cpath ?>book.php"><br>
        </p>
      </div>

<?php
  include "footer.php"
?>
