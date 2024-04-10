# Laravel Web Application

## Introduction

This project is a Laravel application with user registration, authentication, and an API endpoint to retrieve user data.

## Requirements

- PHP >= 8.1
- Composer
- MySQL (or any other compatible database)

## Installation

1. Clone the repository to your local machine:

   ```
   git clone https://github.com/AgereJoseph1/laravel_web_app.git
   ```

2. Navigate to the project directory:

   ```
   cd project/directory 
   ```
Note make sure to change the `projct/directory` to your project directory

3. Run the code below in your terminal to install the dependencies:

   ```
   composer install
   ```

4. Create a copy of the `.env.example` file and rename it to `.env`:

   ```
   cp .env.example .env
   ```

5. Generate an application key:

   ```
   php artisan key:generate
   ```

6. Update the `.env` file with your database credentials .
```
DB_CONNECTION = 
DB_HOST=127.0.0.1
DB_PORT=0000
DB_DATABASE=
DB_USERNAME= 
DB_PASSWORD=
```

7. Run database migrations to create the necessary tables:

   ```
   php artisan migrate
   ```

## Usage

To run the application locally, use the following command:

```
php artisan serve
```

The application will be accessible at `http://localhost:8000` by default.

## Deployment on AWS

This Laravel web application has been deployed on AWS (Amazon Web Services) using Elastic Beanstalk, RDS and CodePipeline to automate the deployment process. Elastic Beanstalk provides a platform as a service (PaaS) to deploy and manage web applications.

## Accessing the Deployed Application

You can access the deployed application via the following URL:

[http://laravelapp-env.eba-p3wkujp3.us-east-2.elasticbeanstalk.com/](http://laravelapp-env.eba-p3wkujp3.us-east-2.elasticbeanstalk.com/)

## API Documentation

Please refer to the [API Documentation](api-documentation.md) for details on accessing and using the API.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

