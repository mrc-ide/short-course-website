<?php

  function load_csv($f) {
    $rows = array_map('str_getcsv', file($f));
    $header = array_shift($rows);
    $csv = array();
    foreach ($rows as $row) {
      $csv[] = array_combine($header, $row);
    }
    return $csv;
  }
  
  $days = load_csv("data/timetable_days.csv");
  $slots = load_csv("data/timetable_slots.csv");

  function count_slots($d) {
    global $slots;
    $count = 0;
    for ($i = 0; $i < count($slots); $i++) {
      if ($slots[$i]['day'] == $d) $count++;
    }
    return $count;
  }
    
  
  function print_day($d, $title) {
    global $slots;
    if ($d == 1) {
      echo "<div id='ttd1' style='text-align:center'>\n";
    } else {
      echo "<div id='ttd".$d."' style='display:none;text-align:center'>\n";
    }
    echo "  <h4>".$title."</h4><br/>\n";
    echo "  <table style='line-height:40px; border-collapse: separate; border-spacing: 2px; font-family:Calibri;font-size:1.2em; width:80% !important; margin:auto; text-align:center' class='table-striped'>\n";
    echo "    <tbody>\n";
    for ($i = 0; $i < count($slots); $i++) {
      if ($slots[$i]['day'] == $d) {
        if (($slots[$i]['class'] == 'break') || ($slots[$i]['class'] == 'lunch')) {
          echo "      <tr><td style='background-color:#f0f0f0'>&nbsp;</td><td style='background-color:#e8e8e8;font-variant: small-caps;'><strong>".$slots[$i]['class']."</strong></td><td style='background-color:#f0f0f0'>&nbsp;</td></tr>\n";
        } else {
          if ($slots[$i]['class'] == 'practical') { $typ = "Practical"; $col = "#b6cfed"; }
          else if ($slots[$i]['class'] == 'qa')   { $typ = "Q &amp; A"; $col = "#f3ec9a"; }
          else if ($slots[$i]['class'] == 'keynote') { $typ = "Keynote Lecture"; $col = "#ebb6b6"; }
          else if ($slots[$i]['class'] == 'lecture') { $typ = "Lecture"; $col = "#b6ebd8"; }
          echo "      <tr><td style='background-color:".$col.";'>&nbsp;&nbsp;".$typ."&nbsp;&nbsp;</td><td style='background-color:".$col.";'>&nbsp;&nbsp;".$slots[$i]['name']."&nbsp;&nbsp;</td><td style='background-color:".$col.";'>&nbsp;&nbsp;".$slots[$i]['presenter']."&nbsp;&nbsp;</td></tr>\n";
        }
      }
    }
    echo "</table></div>\n";
  }

  function print_menu() {
    global $days, $slots;
    echo "<script language='javascript'>\n";
    echo "                  function show_panel(i) {\n";
    for ($i = 0; $i < count($days); $i++) {
      $d = $days[$i]['no'];
      echo "                    document.getElementById('ttd".$d."').style.display = (i == ".$d.") ? 'block' : 'none';\n";
    }
    echo "                  }\n";
    echo "                </script>\n";
    echo "<div class='btn-group' data-toggle='buttons-radio'>\n";
    for ($i = 0; $i < count($days); $i++) {
      $count_slots = count_slots($days[$i]['no']);
      if ($i == 0) $act = "active";
      else $act = "";
      if ($count_slots == 0) {
        echo "  <button type=\"button\" disabled class=\"btn btn-link btn-outline-secondary\">".$days[$i]['day']."</button>\n";
      } else {
        echo "  <button onclick='show_panel(".$days[$i]['no'].");' type=\"button\" class=\"btn btn-link ".$act." btn-outline-primary\">".$days[$i]['day']."</button>\n";
      }
    }
    echo "</div><hr/><br/>\n";
    for ($i = 0; $i < count($days); $i++) {
      print_day($days[$i]['no'], $days[$i]['text']);
    }
    echo "<br/>\n";
  }


 
?>
