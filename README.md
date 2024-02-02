# EcommerceAPI

This project deals with product data, performing CRUD operations on product data through an API. Laravel technology is used with a MySQL database.

## Installation Guide

1. Clone this repository: `git clone https://github.com/blackdevelopa/ProjectSupport.git`
2. Open VS Code through the command prompt using the command: `code .`
3. Open an `.env` file in your project root folder and add your MySQL database variables.

## Usage

1. Run `php artisan serve` to start the application.
2. Connect to the API using Postman on the specified port.

## API Endpoints

- **POST** `/api/products`: Create a new product
- **GET** `/api/products`: Retrieve all products
- **GET** `/api/products/{id}`: Retrieve details of a single product
- **PATCH** `/api/products/{id}`: Edit the details of a single product
- **DELETE** `/api/products/{id}`: Delete a single product
- **Search** `127.0.0.1:8000/api/products/search?query=search_item`: Search for a product by name, description, or variant name

## Technologies Used

- Laravel 9
- XAMPP 8.2.12-0-VS16
- PHP
- VS Code Editor
- MySQL
- Postman Tool
