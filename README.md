# Magasinet Filter
A replacement website for [Magasinet Filter](https://magasinetfilter.se)
[![StyleCI](https://styleci.io/repos/147302076/shield?style=for-the-badge)](https://styleci.io/repos/147302076/)
## Setup
1. Clone or download the repository and follow the steps below. You'll also need to have [Composer](https://getcomposer.org/) and [npm](https://www.npmjs.com/) installed for the following steps.
2. Run `npm install` in your CLI to install all the required npm packages for the project.
3. Run `composer install` in your CLI to install all the required Composer packages for the project.
4. Rename/copy `.env.example` to `.env`, and edit the values inside it to connect to a database. Also create keys and salts with the link provided inside the file.
5. If you just want to view the project run `npm run prod` to build the JS and CSS files from source, and using a web server set the root folder to `wordplate/public`. If you're looking to develop the theme further you may instead run `npm run watch`, which will in turn build the JS and CSS once a change and save is detected in the source files located in `wordplate/resources/`.
#
> This project is using the WordPress stack [WordPlate](https://wordplate.github.io/).
