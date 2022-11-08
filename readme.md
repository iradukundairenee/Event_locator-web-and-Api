# Event locator

This is a simple web application and API for events locator. It is built using  [Laravel](https://laravel.com/). Check the hosted application [here](http://eventlocate.herokuapp.com)

- Web based
- REST API

It is built using laravel. Check out client android application **[Here](https://github.com/muhozi/EventLocator)**

## Requirements

- PHP, Composer

- MySQL database


## Set up the application 🛠

### Clone the repo

`git clone git@github.com:muhozi/Eventlocator-api.git`

### Install the dependencies

This project uses laravel (php framework) and you need to have a php package manager installed which is [Composer](https://getcomposer.org/)

`cd Eventlocator-app`

`composer install`

### Set up project configurations

#### Create configuration file (.env)

Copy the contents of `.env.example` by running the following:

`cp .env.examle .env`

#### Generate application key

Run the following command to generate the application key(for encryption and hashing)

`php artisan key:generate`

#### Set up Database

Create database and replace DB connnection details section in `.env` 

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=db_username
DB_PASSWORD=db_password
```

#### Run migrations

Run migration by running the following command:

`php artisan migrate`

## Run the application 🚀

Run the application using the following command:

`php artisan serve`

## Authors

[Emery Muhozi](https://twitter.com/EmeryMuhozi)

## Licence

[MIT License](http://opensource.org/licenses/mit-license.html).