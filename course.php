<?php

  include "data/metadata.php";
  include "scripts/utils.php";
  include "header.php";
  if ($show_timetable) {
    include "timetable.php";
  }

?>

      <!-- Kick off the carousel //-->

      <script type="text/javascript">
        function load_presenters() {
          $.ajax({
            url:'data/presenters.json', 
            success : function(presenters) {
              for (var i = 0 ; i < presenters.length; i++) {
                var pres = presenters[i];

                //create and load tab link
                var link = '<li><a href="#' + pres.identifier +'" data-toggle="tab">' + 
                           ([pres.title].concat(pres.forenames).concat(pres.surname)).join(' ') +  '</a></li>';
                if(pres.title == "Professor") {
                  $('#prestabs .divider').before(link);
                } else {
                  $('#prestabs').append(link);
                }

                //Create and load div
                var div = '<div id="' + pres.identifier +'"  class="tab-pane" >'
                  + '<h2>' + pres.title + ' ' + pres.forenames.join(' ') + ' ' + pres.surname + ' ' + pres.postnominals.join(' ') + '</h2>'
                  + '<div class="row-fluid">'
                  + '<div class="span3"><img src="' + (pres.photo ? pres.photo : 'holder.js/150x200') + '" class="img-polaroid pull-left headshot" /></div>' 
                  + '<div class="span9"><ul class="unstyled positions"><li>' + pres.positions.join('</li><li>') + '</li></ul>'
                  + '<p>'+ pres.description +'</p>'
                  + '<a href="'+pres.pubs+'" class="btn btn-primary">View ' + pres.title + ' ' + pres.surname + '\'s Publications</a></div>'
                  + '</div></div>';

                $('#prestabscontent').append(div);
              }
              $('#prestabscontent').append('<div class="row-fluid"><p class="span12 footnote"><small>The list of speakers on this page is provisional, we reserve the right to change presenters without notice.</small></p></div>');
              $('#prestabs a:first').tab('show');
            }, error: function() {
              alert("Error with presenter data");
            }
          });
        }
    
        $(load_presenters());
      </script>

      <header class="page-header">
        <h1>Course Information</h1>
      </header>            
      <div class="row-fluid">
        <div class="span12">
          <div class="row-fluid tabbable">
            <ul id="coursetabs" class="nav nav-tabs span12">
              <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
              <li><a href="#courseaims" data-toggle="tab">Course aims</a></li>
              <li><a href="#who" data-toggle="tab">Who should attend</a></li>
              <li><a href="#content" data-toggle="tab">Course Structure</a></li>
<?php if ($show_timetable) { ?>
              <li><a href="#timetable" data-toggle="tab">Timetable</a></li>
<?php } ?>
              <li><a href="#presenters" data-toggle="tab">Presenters</a></li>
              <li><a href="#social" data-toggle="tab">Social Activities</a></li>
              <li><a href="#comments" data-toggle="tab">Comments</a></li>
            </ul>
            <div id="coursetabscontent" class="span12 tab-content">
              <div id="overview"  class="tab-pane active">
                <h2>Overview</h2>
                <p>In recent years our understanding of infectious-disease epidemiology and control has been greatly increased through mathematical modelling. With infectious diseases frequently dominating news headlines, public health and pharmaceutical industry professionals, policy makers and infectious disease researchers increasingly need to understand the transmission patterns of infectious diseases. This allows them to interpret and critically evaluate both epidemiological data and the findings of mathematical modelling studies.</p>
                <p>The transmissible nature and resulting non-linear dynamics of infectious diseases make them fundamentally different from non-infectious diseases. As a result, techniques from 'classical' epidemiology are often invalid and are likely to lead to misleading conclusions.</p>
                <p>Over the last 30 years there has been rapid progress in developing models and techniques for the analysis of epidemic data. Those techniques have been applied to a variety of pathogens such as HIV, SARS, avian influenza, pandemic influenza, Ebola and malaria. The Department of Infectious Disease Epidemiology, Imperial College London has been the world leader in mathematical modelling of the epidemiology and control of infectious diseases of humans and animals, for many years. Our department is actively engaged in research and regularly advises public health professionals, policy-makers, governments, international organisations and pharmaceutical companies, often during real-time outbreak situations.</p>
                <p>Our course has been taught since 1990 by leading researchers in infectious disease epidemiology, who provide a thorough, but accessible and demystifying introduction to the essential elements of modelling and an update of the most practically-relevant aspects of this fast-moving field. The course is revised every year to reflect the most recent developments in the field. Diseases covered include COVID-19, avian influenza, SARS, HIV, TB, Influenza A (H1N1), Ebola, malaria and other vector-borne diseases. Past participants have included hospital clinicians, public health executives, health economists, veterinary researchers, biologists, and mathematicians who have come from 42 countries.</p>
              </div>
        
              <div id="courseaims" class="tab-pane">
                <h2> Course Aims</h2>
                <p>This course will enable you to:</p>
            
                <ul>
                  <li>Understand the key concepts of infectious disease transmission and control - and the differences with non-infectious diseases, taught by people who apply those concepts every day.</li>
                  <li>Learn how modelling informs policy-making, from case-studies presented by the individuals who advise public health professionals and governments, nationally and internationally.</li>
                  <li>Learn about cutting-edge developments, taught by leaders of the field.</li>
                  <li>Read modelling papers to critically-evaluate and interpret their findings.</li>
                  <li>Understand how different control measures (e.g. vaccination, treatment, isolation, quarantine, travel restrictions) will be effective, or ineffective, for different diseases.</li>
                  <li>Explore models of different types of infectious disease, including influenza, TB, HIV, Ebola and vector-borne diseases.</li>
                  <li>Design and use simple but powerful models, using Excel and other user-friendly software.</li>
                  <li>Collaborate effectively with mathematical modellers.</li>
                </ul>
              </div>
              <div id="who" class="tab-pane">
                <h2>Who Should Attend?</h2>
                <div class="row-fluid">
                  <div class="span8">
                    <p>The course caters for:</p>
                    <ul>
                      <li>Policy-makers, public-health and disease-control professionals who need to
                        <ul>
                          <li>(i) set appropriate goals for, and monitor performance of, infection-control programmes</li>
                          <li>(ii) interpret the findings of mathematical modelling studies; or</li>
                          <li>(iii) question modelling experts effectively.</li>
                        </ul>
                      </li>
                      <li>All who need to apply modern methods of analysis in the epidemiology and control of infectious diseases, in medical, veterinary and conservation contexts.</li>
                      <li>Health economists who need to develop appropriate models of infectious-disease control programmes.</li>
                      <li>Researchers who need experience of using modern quantitative approaches to infectious disease epidemiology.</li>
                      <li>Professionals planning to use novel vector control measures.</li>
                      <li>Mathematicians who wish to learn key biological concepts and how they are translated into modelling. </li>
                    </ul>
                  </div>
                  <img class="span4 img-polaroid" src="images/who.jpg" />
                </div>

                <div class="row-fluid">
                  <img class="span4 img-polaroid" src="images/who2.jpg" />
                  <div class="span8">
                    <h2>What is the required level of mathematical ability?</h2>
                    <p>Course participants require only a <strong>very basic mathematical ability</strong> (high school level is more than sufficient), as the fundamental principles of infectious-disease transmission behaviour are simple to grasp. Since most participants do not use maths regularly, if at all, we introduce concepts gently, step-by-step, and we offer the reassurance of an optional maths refresher on the Sunday before the course.</p>
                    <p>Course participants do not require any coding abilities. Calculation is done using Excel (With an optional Excel refresher day on the Sunday before the course) and a user-friendly modelling package. Hence manipulation of equations is not required, and participants are not expected to know any programing languages. </p>
                    <p>We emphasise how to express biological and clinical principles in a model and how to interpret results from a biological and clinical perspective.</p>
                  </div>
                </div>
              </div>

              <div id="content" class="tab-pane">
                <h2>Course Structure</h2>
                <div class="row-fluid">
                  <div class="span8">
                    <p>While the key concepts are introduced in lectures, most of the learning takes place in computer practical sessions, question-and-answer sessions and small-group discussions of key topics and published papers. This interactive teaching is designed to encourage reflection and consolidation of the key concepts.</p>
                    <p>In the first week, the basic conceptual, mathematical, statistical and simple computational tools needed for a rigorous approach to infectious disease epidemiology are introduced. Keynote lectures and case studies covering a wide range of topics place the current use of mathematical modelling in context, illustrating how it contributes in a number of ways to epidemiological studies, policy-making and evaluation. </p>
                    <p>The focus of the second week is on extended, in-depth, hands-on, small-group projects, complemented by lectures addressing practical case studies.</p>
                  </div>
                  <img class="span4 img-polaroid" src="images/content.jpg" alt="Professer Sir Roy Anderson delivers a lecture" />
                </div>
                <div class="row-fluid">
                  <div class="span12">
                    <p>This course does not merely illustrate examples of models, but rather we maximise your learning by helping you to make your own and applying them to real-world data, for example data from the recent Ebola epidemic in West Africa.</p>
                  </div>
                </div>

                <div class="row-fluid">
                <img class="img-polaroid span4" src="images/invited.jpg" alt="Invited speaker" />
                  <div class="span8">
                
                    <p>Each year, we also invite a speaker from outside the department. Past speakers have included Dr. Chris Dye (Director of Strategy in the Office of the Director General at the WHO), Prof. Harald Zur Hausen (2008 Nobel Prize in Medicine), Prof. Barry Marshall (2005 Nobel Prize in Medicine), Prof. Peter Piot (former Executive Director of UNAIDS), Dr Robert Newman (former Director of the Global Malaria Programme at the World Health Organization), Dame Anne Johnson (Chair of Population and Lifelong Health at UCL), and Prof. Charlotte Watts (Chief Scientific Advisor, UK Department for International Development).</p>
                    <p>Every participant is allocated a computer with internet access throughout the course and is given an extensive course manual and permanent access to user-friendly modelling software, along with all the models used and developed on the course.</p>
                    <p>The course also provides many opportunities to talk with department staff during numerous social events, including a dinner banquet and special buffet lunches. In the past those informal exchanges have lead to various scientific collaborations. </p>
                    <p>There is no formal assessment but a certificate of attendance is issued.</p>
                  </div>
                </div>
              </div>
<?php if ($show_timetable) { ?>
              <div id="timetable" class="tab-pane" style="text-align:center">
                <h2>Provisional Timetable</h2>
             
                <p>This is a provisional timetable for the course. Exact details may change before the start of the course.</p>

                <?php print_menu(); ?>

              </div>
<?php } ?>
            
              <div id="presenters" class="tab-pane">
                <div class="row-fluid tabbable">
                  <div id="prestabscontent" class="span8 tab-content">
                  </div>
                  <ul id="prestabs" class="nav nav-pills nav-stacked span4">  
                    <li class="divider"></li>
                  </ul>
                </div>
              </div>
          
              <div id="social" class="tab-pane">
                <h2>Social Activities</h2>
                <div class="row-fluid">
                  <p class="span8">The course offers numerous occasions to socialise with fellow participants and to get to know staff and students within our very friendly department. Delegates will get to enjoy a flight on the London Eye, offering spectacular views across London and its many famous landmarks, followed by a formal meal with members of the department. We will host a welcome reception following the first day of teaching, two buffet lunches during the course, as well as farewell drinks and a quiz on the final evening. The central London location of the Imperial College St Mary's Campus also provides an ideal opportunity to explore the city, we will be more than happy to recommend our favourite restaurants and activities!</p>

                  <div class="span4">
                    <img src="images/LondonEye.jpg" class="span12 img-polaroid" />
                    <p class="alert alert-info">2019 delegates taking a flight on the London Eye</p>
                  </div>
                </div>
              </div>

              <div id="comments" class="tab-pane">
                <div class="row-fluid">
                  <div class="span8">
                    <h2>Comments From Previous Attendees</h2>
                    <p>Past participants have included hospital clinicians, senior public health executives, health economists, veterinary researchers, biologists and mathematicians. They have come from 42 countries worldwide.</p>

                
                    <blockquote>Great course, I'm really amazed by how much I've learnt in two weeks</blockquote>
                    <blockquote>Fantastic course, excellent practical introduction to mathematical modelling</blockquote>
                    <blockquote>This course has just opened my eyes in the understanding of the dynamic of infectious diseases.</blockquote>
                    <blockquote>It was a fantastic experience. I would recommend to anyone with an interest in modelling, an amazing experience</blockquote>
                    <blockquote>The course gives you an insight in how to use mathematical models to address questions that are almost impossible to predict without.</blockquote>
                    <blockquote>Excellent and insightful approach to public health. Certainly all public health professionals need to understand the role of models</blockquote>
                    <blockquote>An excellent overview of the field of mathematical modelling of infectious diseases and how it can help in control of infections</blockquote>
                    <blockquote>Great people and experience</blockquote>
                    <img class="img" src="images/comments2.jpg" />
                  </div>
                  <img class="span4 img-polaroid" src="images/comments.jpg" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php
  include "footer.php"
?>
