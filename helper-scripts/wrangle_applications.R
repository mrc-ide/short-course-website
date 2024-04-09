## Short course application wrangling function
## Takes .csv exported from website and re-formats to correct for line-breaks in
## the free-text fields

wrangle_applications <- function(filepath) {

  raw <- readLines(filepath)
  data <- raw[raw != ""]
  idx_newapp <- grepl("^[0-9]{6}", data) # find first line of each application
  
  # collapse all entries pertaining to same app into one line
  ret <- tapply(data, cumsum(idx_newapp), paste, collapse = " ")

  # check each row has the same number of columns
  ncols <- lengths(strsplit(ret, "\t"))
  stopifnot(all(ncols == ncols[1]))

  ret
}

filepath <- "~/Downloads/shortcourse_export_0409.tsv"
data <- wrangle_applications(filepath)
readr::write_lines(data, "shortcourse_export.tsv")

