# Phonebook 

This is a test case application based on Phalcon framework. You can see a simple REST API to work with phone book items 

The master branch will always contain the latest stable version.
If you wish to check older versions or newer ones currently under development, please switch to the relevant branch.

## Get Started

### Requirements

* docker-compose up --build
* install dependencies via composer: *composer install*
* Then you'll need to create the database and initialize schema:

# Routes

* GET /contacts/{page}/{limit}
* GET /contacts/{page}/{limit}/{name_query}
* GET /contacts/{id}
* POST /contacts
* DELETE /contacts/{id}
* PUT /contacts/{id}
* /countries
* /timezones
