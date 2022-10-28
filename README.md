Installation and Deployment Guide
 
 FROM SCRATCH DEPLOYMENT

 => 1st setp: copy the source code from gitlab ()

 => 2nd step: when the source code is  copied ,open  your terminal in the source code folder

 => 3nd step: 
           
           -> composer install    # to install the dependencies of laravel and php

           -> composer update    # to update the dependencies

           -> php artisan key:generate # to settings up the key of laravel's application

           -> configure your database in .env file # your database name and password

           -> php artisan migrate  # this command help you to migrate the databse schema in 
                                   # your database

           # settings up the passport library  to manager your authentcation,authoridation                by   commands bellow

           -> php artisan passport:install 

           -> php artisan config:cache

           -> php artisan route:cache

           -> npm install 
    
=> launch your laravel application;
          
           php artisan serve # in localhost on port 8000
                 
                 or
           php artisan serve --host -p





USING DOCKER TO DEPLOY YOUR APPLICATION

when your finished to copy the laravel source code application

=> Open it in the terminal (folder source code)

=> RUN command bellow:

      -> docker build -t  gohze-service-dist:latest  # to build the docker image of your applicat

      -> docker-compose up  # this command help your to launch your application

 

php artisan passport:client --personal