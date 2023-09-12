# Script to create db_metadata.php from vault

create_db_metadata <- function(path = "./db_metadata.php") {
  vault <- vaultr::vault_client(login = "github")
  data <- vault$read("/secret/infectiousdiseasemodels.org")
  
  script <- paste(
    '<?php ',
    '  // Created by deploy.R ', '',
    '',
    sprintf('  $upload_path = "%s";', data$upload_path), '',
    sprintf('  $github_secret = "%s";', data$github_secret), '',
    '?>',
    sep = "\n")
  
  writeLines(text = script, con = path)
}

create_db_metadata()
