

## Installation Instructions


- CREATE .env file specify hostname DB Name user name and password
- Create the Database specified in the .env file
- php artisan migrate
- php arthisan db:seed


## REST API. 
 - http://127.0.0.1:8010/api/videos/ get all the videos
 - http://127.0.0.1:8010/api/videos/1
 - Have supported get post put and delete in the End point and have tested using postman

##TEST CASES 18 both Functional and Unit Test
 - Run Unit test  ./vendor/phpunit/phpunit/phpunit

##Completed all the use cases as per WWE Technical Test pdf

##Hosted it in aws url
 - http://ec2-13-59-176-50.us-east-2.compute.amazonaws.com/WWE/public/
 - Not All the functionalities are available because Linux ami has out dated PHP version
