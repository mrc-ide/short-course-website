# short-course-website

This repo contains the website for the short-course,
[www.infectiousdiseasemodels.org](https://www.infectiousdiseasemodels.org/),
refactored in January 2023 to make maintenance a bit easier,
and with MS-SQL dependencies removed in August 2023.

# Server Configuration

The website is currently deployed on a Windows server, and runs on vanilla PHP with no significant dependencies. 

# Deployment

* Clone the repo directly into where you would like the page served from. (eg, within an appropriate `htdocs` folder).

* The server will need write/modify access to this folder for the webhooks to work.

* For the live website, leave the repo on the `main` branch. 

* For the preview website, `git checkout preview`.

* With the [vaultr](https://github.com/vimc/vaultr) package installed, and the environment variables
  `VAULT_ADDR` and `VAULT_AUTH_GITHUB_TOKEN` set, run `deploy.R` in the `data` folder, to create
  the `db_metadata.php`

# Editing and Publishing

* Make changes on the `preview` branch. When you push to that branch, a webhook in this repo will cause those changes to appear on the preview website: https://mrcdata.dide.ic.ac.uk/shortcourse-preview

* When you're happy, make a PR from the latest preview, and merge it, and the live site will be updated.

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

* The second file: `timetable_slots.csv` contains five fields:-
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
