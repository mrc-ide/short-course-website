<?php
  include "data/db_metadata.php";

  function run() {
    global $github_secret;
 
    //////////////////////////////////////
    // What's my branch?
    //////////////////////////////////////

    $branch = shell_exec('git status 2>&1');
    $branch = preg_split("/\r\n|\n|\r/", $branch)[0];
    $branch = preg_replace("/On branch /", "", $branch);

    ///////////////////////////////////////////
    // Is this not a github payload?
    ///////////////////////////////////////////

    if (!isset($_POST['payload'])) {
      http_response_code(400);
      die("Not a github payload");
    }

    //////////////////////////////////////////
    // Check the secret key matches ours
    //////////////////////////////////////////

    $post_data = file_get_contents('php://input');
    $my_sig = "sha256=".hash_hmac('sha256', $post_data, $github_secret);
    $gh_sig = $_SERVER['HTTP_X_HUB_SIGNATURE_256'];

    if ($my_sig != $gh_sig) {
      http_response_code(401);
      die("Signature did not match");
    }

    ////////////////////////////////////////////////////////
    // Deal with pull request event (only on main branch)
    ////////////////////////////////////////////////////////

    $event = $_SERVER('HTTP_X_GITHUB_EVENT');
    if ($event == "pullrequest") {
      if ($branch == "main") {
        
        $action = $payload->{'action'};
        if ($action != "closed") {
          http_response_code(200);
          echo "PR not yet closed.";
          exit();
        }

        $merged = $payload->{'merged_at'};
        if ($merged == "null") {
          http_response_code(200);
          echo "PR was closed without merging. No action.");
          exit();
        }

        $out = shell_exec("git pull 2>&1");
        http_response_code(200);
        echo $out;
      }
      
      exit();
    }

    
    /////////////////////////////////////////////////////
    // Not on master. Check the ref matches our branch
    /////////////////////////////////////////////////////

    $payload = json_decode($_POST['payload']);
    $ref = $payload->{'ref'};
    $ref = str_replace("refs/heads/", "", $ref);
    if ($ref != $branch) {
      http_response_code(200);
      echo "Different branch (I am ".$branch.", not ".$ref.")\n";
      exit();
    }

    
    ///////////////////
    // Do the update
    ///////////////////

    $out = shell_exec("git pull origin ".$branch." 2>&1");
    http_response_code(200);
    echo $out;

  }

  run();

?>