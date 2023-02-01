# Script to create db_metadata.php from vault

create_db_metadata <- function(path = "./db_metadata.php") {
  vault <- vaultr::vault_client(login = "github")
  data <- vault$read("/secret/infectiousdiseasemodels.org")
  
  script <- paste(
    '<?php ',
    '  // Created by deploy.R ', '',
    sprintf('  $db_host = "%s";', data$db_host),
    sprintf('  $db_info = array("Database" => "%s",', data$db_name),
    sprintf('                   "UID"      => "%s",', data$db_user),
    sprintf('                   "PWD"      => "%s");', data$db_password),
    '',
    sprintf('  $upload_path = "%s";', data$upload_path), '',
    '?>',
    sep = "\n")
  
  writeLines(text = script, con = path)
}

create_db_metadata()
