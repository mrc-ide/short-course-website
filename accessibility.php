<?php

  include "data/metadata.php";
  include "scripts/utils.php";
  include "header.php";

?>
    <h1>Accessibility</h1>

    This statement applies to content published on <a href="infectiousdiseasemodels.org">infectiousdiseasemodels.org</a><br/>&nbsp;<br/>

    We want as many people as possible to be able to use this website. For example, that means you should be able to:<br/>&nbsp;<br/>

    <ul>
      <li>Resize your window with content being reformatted appropriately</li>
      <li>Adjust your text size without the site becoming less usable</li>
      <li>Read text easily due to sufficient contrast between foreground and background elements</li>
    </ul>

    <a href="https://mcmw.abilitynet.org.uk/">AbilityNet</a> has advice on making your device easier to use if you have a disability.

    <h1>How accessible the website is</h1>

    Parts of this website may not be fully accessible. For example:<br/>&nbsp;<br/>

    <ul>
      <li>It may not be entirely navigable by keyboard</li>
      <li>Some form elements may lack descriptive names or labels</li>
      <li>Some form elements may lack sufficient color contrasts</li>
      <li>Some pages may not have the option to skip navigation and jump to the content</li>
    </ul>

    <h1>What we do about known issues</h1>

    We work to achieve and maintain <a href="https://www.w3.org/TR/WCAG21/">WCAG 2.1 AA standards</a>, but it is not always possible for all our content to be accessible. 
    Where content is not accessible, we will state a reason, warn users and offer alternatives.

    <h1>Technical information about this website's accessibility</h1>

    We are committed to making this website accessible in accordance with the Public Sector Bodies (Websites and Mobile Applications) (No. 2) Accessibility Regulations 2018.

    This website is partially compliant with the <a href="https://www.w3.org/TR/WCAG21/">Web Content Accessibility Guidelines version 2.1</a> AA standard, due to the known 
    issues listed above.

    <h1>Reporting accessibility issues</h1>

    If you need information on this website in a different format like accessible PDF, large print, easy read, audio recording or braille or if you find any accessibility issues not listed on this page then please contact <a href="mailto:reside@imperial.ac.uk">reside@imperial.ac.uk</a>

    We'll consider your request and get back to you in 7 days.


    <h1>Enforcement procedure</h1>

    The Equality and Human Rights Commission (EHRC) is responsible for enforcing the Public Sector Bodies (Websites and Mobile Applications) (No. 2)
    Accessibility Regulations 2018 (the 'accessibility regulations'). If you’re not happy with how we respond to your complaint, 
    <a href="https://www.equalityadvisoryservice.com/">contact the Equality Advisory and Support Service (EASS)</a>.

    <h1>How we test this website</h1>

    This website was last tested for accessibility compliance on <?= friendly_date($acc_compliance_test) ?>, and these tests have been carried out internally using the 
    <a href="https://accessibilityinsights.io/en/">Accessibility Insights</a> tools.

    <h1>Last updated</h1>

    This statement was prepared on <?= friendly_date($acc_policy_created) ?>. It was last updated on <?= friendly_date($acc_policy_updated) ?>.

<?php 
  include "footer.php"
?>
