# Users-Hierarchy

## Requirements
- To run locally, PHP 7 and composer is required to be installed.
- If want to run in docker, ensure docker is installed.

## Let's get this running - clone this Repo!
1. Open terminal
1. Clone the repo `git clone git@github.com:rajashekharans/users-hierarchy.git`
1. `cd user-hierarchy`

## To run locally
1. Run `composer install`, to install dependencies
1. To run the application, `php bin\console app:run`
1. To run tests, `vendor\bin\phpunit tests`


## To run in docker
1. If `composer` is installed in host, then run `composer install`, to install dependencies
1. else run `docker run --rm -v $(PWD):/app composer install` 
1. Build and run the application `docker-compose up --build`
1. To run test, `docker-compose -f docker-compose-test.yaml up --build`
