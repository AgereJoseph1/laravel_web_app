# Practical Assessment execution Summary

This document provides concise steps I followed, along with the challenges encountered and how I resolved them during the execution of various tasks

## Task 1: Laravel Web Application Development

- Created a new Laravel project using Composer and Laravel Breeze for authentication scaffolding.

- Configured Laravel to use MySQL as the database backend.

- Implemented user registration and login functionality with proper validation.

- Created an API endpoint `/api/v1/public/users` to retrieve user data in JSON format.


## Task 2: AWS Integration

- Set up an AWS account and navigated to the AWS Management Console.

- Chose AWS services eligible under the AWS Free Tier, including Elastic Beanstalk, RDS, and CodePipeline.

- Used the AWS RDS service to create a MySQL database instance for the Laravel application.

- Configured Elastic Beanstalk environment to use the RDS MySQL database instance for data storage.

- Specified the connection details (such as RDS endpoint, database name, username, and password) in the Elastic Beanstalk environment configuration.

- Included .ebextensions and .platform directories in the main repository to enable environment customization for Elastic Beanstalk, allowing for configurations of ngnix, runtime options, and permissions

  

## Task 3: Git/GitHub Integration

- Initialized local Git repository with git init.

- Created dev branch for feature and bug fix development.

- Added project files and committed changes.

- Set up remote repository on GitHub and pushed the code there 

- Merged dev branch changes into main branch after testing and verification.

  

## Task 4: AWS Application Deployment and API Access

- Set up an IAM role in AWS to provide necessary permissions for accessing AWS services.

- Configured Elastic Beanstalk to automatically create an EC2 instance during deployment.

- Integrated CodePipeline for automating the deployment process.

- Created a CodePipeline pipeline to monitor the GitHub repository for changes.

- Configured the pipeline to trigger a deployment to Elastic Beanstalk whenever changes are pushed to the main branch.

- Verified that the deployment process works seamlessly by pushing changes to the main branch and observing the pipeline trigger and complete the deployment.



## Challenges Faced

- Encountered configuration errors in NGINX server settings affecting application access.


## Solutions and Workarounds

- Identified NGINX configuration errors causing access issues and adjusted the configuration files to resolve them. Ensured correct settings for routing and server configuration.

- Troubleshooted deployment errors by examining logs and adjusting NGINX configuration settings in Elastic Beanstalk environment, including verifying the correct deployment of NGINX configuration files.