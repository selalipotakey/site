# site

Monorepo for Doc Films' website and screening database.

## Maintained by Doc Films' web chairs:

Selali Potakey 2023-Present

Cameron Poe 2021-2023

Lindsey Qian 2021-2023

## To-do:

## Contents of the repo

### `/public`

This is the root directory `/` of the website, which corresponds to `www.docfilms.org`. All files outside of this directory cannot be (directly/easily) viewed by website visitors.

#### `/public/about`

Directory that holds both "About" pages. `index.php` corresponds to the "About" page on the website (`www.docfilms.org/about`). This page details how to contact Doc, all the people on the Board, some history about the organization, and specs of our theater. `the-site.php` corresponds to the "About the Site" page, available in the footer of each page. It details how the website was built and how it runs. 

#### `/public/archive`

This directory holds all the previous quarter's pages (instead of just scrapping them) as well as all the pages that interact with the database.

TBC

#### `/public/calendar`

This directory holds all the series pages for the current quarter. 

##### `/public/calendar/archive`

This directory holds some files that allow for a custom Google calendar embedded in the `index.php` page in `/public/calendar`. These files are no longer used, since I (Cameron, 2022) was not able to get the custom Google calendar working. We still used an embedded Google calendar, but it has less customization features as the attempt in this directory.

#### `/public/fonts`

Should be self-explanatory. Holds the font files for the website. The `style.css` has lines that allow all the webpages to import font styling from this directory.

#### `/public/images`

Directory that contains directories corresponding to each series' images as well as directories that have images used by non-series web pages.

##### `/public/images/about`

Contains the WHO FRAMED ROGER RABBIT? image used in the `/public/about/index.php` page.

##### `/public/images/site`

Directory that contains images used by the header, dropdown, footer, etc. These are used on every web page of the website.

#### `/public/includes`

Directory that contains sub-webpages that are "included" in each webpage. These are the header, the footer, and the drop down. Stored here so that instead of repeating code on each webpage, the webpage can do a `php` include to import the header, footer, dropdown code.

### `/database`

This directory contains all the relevant files for insertion of new entries into the database. It contains capsule spreadsheets, python code to render those capsule spreadsheets insertable, and code to insert into the database.

## How the repo works:

### Github Actions

The Doc repo includes a Github action that pushes all changes in the repo to the remote server. Basically, upon any push or pull request to the repo, a script runs on one of Github's virtual machines that sends an `rsync` command to the Doc remote server. This `rsync` command attempts to push the entire repo hosted on Github to the corresponding repo instance on the Doc server. The `rsync` command also checks for any files that are on the Doc server's instance of the repo that aren't in the Github repo, and deletes those. This way, a push from a web chair's machine to the Github will automatically trigger the Action which causes the Doc server to receive any changes.  

## How to set up the Doc Films repo on your local machine:
pre-reqs:
`git`
`gh` - github cli


pick directory you want the repo to be in
run the gh clone command in that directory
you have the site cloned
may have to run `git init`














## Quick  `git` how-to
`git` is a command line package that allows you to interface with the GitHub locally. I'm not going to go into all the detail of how to actually download all this stuff but the form is such:

1. Download `git` through your terminal on OS of choice
2. Set up Git CLI and authenticate your device using `gh auth login`
3. Create a directory somewhere on your computer and copy the repo into it using `gh repo clone docfilms/site` or something like that (can be found by clicking on the "Code" drop down in the main menu for the repo)

From the command line, edit files locally and push/pull to the repo by:

4. Edit, create files in the command line using `pico` or `mkdir` (Linux only, but there are Windows and Mac equivalents).
5. Navigate to the root directory of the repo in the command line and enter `get add .` to stage a change
6. To commit that change enter `git commit`
7. To push that change to main `git push origin commit`
8. To pull any changes from the repo use `git pull`

By using a text editor:

test to see if deleting stuff didn't mess anything up
