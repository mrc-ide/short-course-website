<?php

  // Duration of course
  
  function friendly_date_span($d1, $d2) {
    $d1 = new DateTime($d1);
    $d2 = new DateTime($d2);
    $day1 = $d1->format('j')."<sup>".$d1->format('S')."</sup> ";
    $day2 = $d2->format('j')."<sup>".$d2->format('S')."</sup> ";
    $month1 = $d1->format('F');
    $month2 = $d2->format('F');
    $year1 = $d1->format('Y');
    $year2 = $d2->format('Y');
    if (($month1 == $month2) && ($year1 == $year2))
      return $day1."- ".$day2." ".$month1." ".$year1;
    if ($year1 == $year2)
      return $day1.$month1." - ".$day2.$month2." ".$year1;
    return $day1.$month1." ".$year1." - ".$day2.$month2." ".$year2;
  }

  function friendly_date($d1) {
    $d1 = new DateTime($d1);
    return $d1->format('j')."<sup>".$d1->format('S')."</sup> ".$d1->format('F Y');
  }

  function year_span($d1, $d2) {
    $d1 = new DateTime($d1);
    $d2 = new DateTime($d2);
    $year1 = $d1->format('Y');
    $year2 = $d2->format('Y');
    if ($year1 == $year2) 
      return $year1;
    return $year1." - ".$year2;
  }
    

  function cost($c) {
    return "&pound;".$c;
  }

?>
