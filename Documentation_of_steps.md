# API Documentation

## Introduction

This document provides detailed information about the API response format for retrieving a list of users with pagination. The API is deployed on AWS using Elastic Beanstalk for hosting, RDS (Relational Database Service) for database management, and CodePipeline for automating the deployment process.

## Base URL

The base URL for accessing the API is `http://laravelapp-env.eba-p3wkujp3.us-east-2.elasticbeanstalk.com/`.

### Authentication

- **Login**: 
  - **Endpoint**: `POST base_url/api/v1/login`
  - **Description**: Authenticates a user and returns an access token.
  - **Request Body**:
    - `email`: User's email address.
    - `password`: User's password.
  - **Response**:
    - `token`: The access token to be used for subsequent requests.


#### Sample Response
```json
{
  "token": "2|lAt3f8DVPEza5b28jhWEKr4tR52yvLPrYuGj07nbcdf2dfaf"
}
```

## Retrieving Users

### Endpoint

```
GET base_url/api/v1/users
```

### Description

This endpoint retrieves a list of users from the system.

#### Request Headers

`Authorization`: Bearer `token` (the access token received from the login endpoint)


### Response

The API response is in JSON format and includes the following fields:

1. **users**: An array containing user objects. Each user object has the following attributes:
   - `id`: The unique identifier for the user.
   - `name`: The name of the user.
   - `email`: The email address of the user.
   - `created_at`: The timestamp indicating when the user was created.
   - `updated_at`: The timestamp indicating when the user was last updated.

2. **pagination**: An object containing pagination information with the following attributes:
   - `total`: The total number of users in the system.
   - `per_page`: The number of users per page.
   - `current_page`: The current page number.



**Example Request**:

#### Request Headers:

`Authorization`: Bearer `token` (the access token received from the login endpoint)

```
GET http://laravelapp-env.eba-p3wkujp3.us-east-2.elasticbeanstalk.com/api/v1/users
```
#### Sample  Response

```json
{
    "users": [
        {
            "id": 1,
            "name": "Joseph",
            "email": "joe@gmail.com",
            "created_at": "2024-04-10T09:42:12.000000Z",
            "updated_at": "2024-04-10T09:42:12.000000Z"
        },
        {
            "id": 6,
            "name": "Avoka",
            "email": "avoka@gmail.com",
            "created_at": "2024-04-10T12:55:45.000000Z",
            "updated_at": "2024-04-10T12:55:45.000000Z"
        }
        
    ],
    "pagination": {
        "total": 12,
        "per_page": 10,
        "current_page": 1
    }
}
```


### Retrieve a Specific User

**Endpoint**: `GET base_url/api/v1/users/{id}`

**Description**: Fetches details of a specific user by their ID.

**Parameters**:

- `id`: The unique identifier of the user.

**Response**:

- `user`: Object containing user details (`id`, `name`, `email`, `created_at`, `updated_at`).

**Example Request**:

#### Request Headers:

`Authorization`: Bearer `token` (the access token received from the login endpoint)

```
GET http://laravelapp-env.eba-p3wkujp3.us-east-2.elasticbeanstalk.com/api/v1/users/2
```


**Example Response**:

```json
{
    "user": {
        "id": 6,
        "name": "Avoka",
        "email": "avoka@gmail.com",
        "created_at": "2024-04-10T12:55:45.000000Z",
        "updated_at": "2024-04-10T12:55:45.000000Z"
    }
}
```

### Retrieve All Users (Paginated)

**Endpoint**: `GET base_url/api/v1/users`

**Description**: Fetches a paginated list of all users in the system.

**Parameters**:

- `per_page` (optional): Number of users to return per page. Defaults to 10.

**Response**:

- `users`: Array of user objects containing user details (`id`, `name`, `email`, `created_at`, `updated_at`).
- `pagination`: Object containing pagination details.
  - `total`: Total number of users.
  - `per_page`: Number of users per page.
  - `current_page`: Current page number.

**Example Request**:

#### Request Headers:

`Authorization`: Bearer `token` (the access token received from the login endpoint)
```
GET http://laravelapp-env.eba-p3wkujp3.us-east-2.elasticbeanstalk.com/api/v1/users?per_page=2
```

**Example Response**:

```json
{
    "users": [
        {
            "id": 1,
            "name": "John Doe",
            "email": "johndoe@example.com",
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        },
        {
            "id": 2,
            "name": "Jane Doe",
            "email": "janedoe@example.com",
            "created_at": "2023-01-02T00:00:00.000000Z",
            "updated_at": "2023-01-02T00:00:00.000000Z"
        }
    ],
    "pagination": {
        "total": 100,
        "per_page": 2,
        "current_page": 1
    }
}
```

### Status Codes

- `200 OK`: The request was successful, and the response contains the requested data.
- `404 Not Found`: The requested resource was not found.

## Deployment

The API is deployed on AWS using the following services:

- **Elastic Beanstalk**: The API is hosted on Elastic Beanstalk, providing scalable and reliable infrastructure for running web applications.

- **RDS (Relational Database Service)**: The database used by the API is managed by RDS, ensuring high availability, security, and performance.

- **CodePipeline**: Deployment of the API is automated using CodePipeline, which facilitates continuous integration and continuous deployment (CI/CD) processes.

