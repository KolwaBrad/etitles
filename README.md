<h1 style="text-align: center;">
    eTitles
</h1>

<h2 style="text-align: center;">
   A Secure Online Land Control Platform for Land Title Deeds Validation
</h2>

### Abstract

 An online platform to ensure secure land transactions and monitoring, while
enhancing the validation of title deeds, is crucial in addressing the challenges and inefficiencies
of land related disputes. By leveraging technology and providing a streamlined and accessible
platform, this project aims to revolutionise the way landowners, buyers, sellers, and government
officials interact with land-related processes. The need for such a platform is to reduce the
occurrences of land disputes and fraudulent transactions by providing a secure and reliable
online environment. The online platform offers immense convenience and accessibility for
stakeholders involved since it provides an additional layer of trust and authenticity to land
transactions. Users can easily access and manage their property information, track transaction
history, and communicate with each other, saving time and effort. Government officials can
efficiently monitor and review land transactions, ensuring compliance with regulations and
detecting irregularities easily, increasing transparency in the real estate market.

# Installation Guide

This guide provides step-by-step instructions to install a Laravel project that requires Laravel, Node.js, and MySQL.

## Prerequisites

Before you begin, make sure you have the following software installed on your machine:

- PHP (version >= 7.3)
- Composer 
https://getcomposer.org/download/
- Node.js (version >= 12.x)
- npm
https://nodejs.org/en/download
- MySQL (version >= 5.7)
https://www.mysql.com/downloads/

## Clone the Repository

Clone the project repository from GitHub:
https://github.com/KolwaBrad/etitles.git


```bash
$ git clone <repository-url>
$ cd <project-directory>

## Install PHP Dependencies

Install the required PHP dependencies using Composer:
```bash
$composer install

## Configure Environment Variables

Create a copy of the `.env.example` file and name it `.env`. Update the necessary environment variables such as database credentials, app key, etc.:
```bash
$ cp .env.example .env
$ nano .env


## Generate Application Key

Generate a unique application key using the following command:
```bash
$ php artisan key:generate

## Set Up the Database

Create a new MySQL database for your application and update the `.env` file with the database name, username, and password.

## Migrate the Database

Run the database migrations to create the required tables:
```bash
$ php artisan migrate

## Serve the Application

Start the development server to run your Laravel application:
```bash
$ php artisan serve

## Access the Application

Open your web browser and visit `http://localhost:8000` to access your Laravel application.

Congratulations! You have successfully installed the Laravel project with Laravel, Node.js, and MySQL. Feel free to explore the application and customize it according to your needs.

If you encounter any issues during the installation process, refer to the official documentation or seek help from the Laravel community.

