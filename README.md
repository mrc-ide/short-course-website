# short-course-website

This repo contains the website for the short-course, 
[infectiousdiseasemodels.org](https://www.infectiousdiseasemodels.org/), 
refactored in January 2023 to make maintenance a bit easier.

# Server Configuration

The website is currently deployed on a Windows server. This is the working configuration:-

* PHP 7.4
* The current IC database seems to work only with ODBC Driver 11. 
  This may be already installed, but if not, see [here](https://learn.microsoft.com/en-us/sql/connect/odbc/windows/release-notes-odbc-sql-server-windows?view=sql-server-ver16#previous-releases)
* Version 5.8 of the MS-SQL driver for PHP 7.4 - the thread-safe 64-bit version [here](https://pecl.php.net/package/sqlsrv/5.8.1/windows)
* Save `php_sqlsrv_74_ts_x64.dll` in `php/ext` folder, and insert `extension php_sqlsrv_74_ts_x64.dll` in the extensions section of `php.ini`

# Deployment

* With the [vaultr](https://github.com/vimc/vaultr) page installed, and the environment variables
  `VAULT_ADDR` and `VAULT_AUTH_GITHUB_TOKEN` set, run `deploy.R` in the `data` folder, to create
  the `db_metadata.php`

# Editing

Create PRs on this repo to make changes to the website, so we can review and merge. In due
course, some better editing/previewing options will be added.

## Dates/costs/basic enabling or disabling of booking:

* Edit the `data/metadata.php` file. 
  This is (currently) a `PHP` file, so lines must end with a `semicolon`.

## Presenters

* Edit the `data/presenters.json` file - a bit fiddly, but perhaps choose a similar person in the list,
  and copy and paste a section within curly braces, and include the comma after the close-brace unless
  it is the last entry. The list is sorted by surname. Current conventions:- 
  * `identifier` is unique, containing lower-case letters and underscores
  * `title` is currently `Professor` or `Dr`
  * `forenames` in the form `['Wes']`, or one exception: `['Sir', 'Roy']`
  * `postnominals` for example `['OBE', 'FMedSci']`. PhD or lower not included currently.
  * `surname` is a simple string
  * `positions` is a list of the main roles, not necessarily exhaustive. 
  * `descriptopn` has some short bio written in the third person.
  * `photo` - links to a `jpg` such as `images/presenters/p_erson.jpg`. Current size is 150x200, 
    or proportional to that.
  * `pubs` - links to the presenter's personal publications page, usually within 
    `https://www.imperial.ac.uk/people/`.

## The timetable

* The first file: `timetable_days.csv` contains three fields:-
  * `no` is the day number in order, starting at 1, including 7 and 8 for the weekend.
  * `day` is the three-lettered day name
  * `text` is a one-line title, for example `Sunday: Maths and Excel refresher day`.

* The second file: `timetable_slots.csv` contains five fieldes:-
  * `day` is the numerical day, matching `no` in the previous file.
  * `slot` is a numberical slot number - just an ordering of what happens. The timetable 
    hasn't included times so far, which we could change.
  * `class` is the type of activity, one of `practical`, `break`, `lunch`, `qa`, `lecture` 
    or `keynote`.
  * `name` is the one-line text for the title of the session.
  * `presenter` are the presenters, Currently comma-separated, in the form `"A. Person, B. Person"`

## Other text

The remaining text is included in PHP files at present, as it is not expected to change significantly.
Should that change, we'll do some more refactoring to make it easier to edit that text without
getting stuck into the code for the website. Get in touch, or file issues on the repo to request
changes to how editing occurs, or any other aspect of the site.
