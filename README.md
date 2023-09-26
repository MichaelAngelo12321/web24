# Company LARAVEL REST API

## Description
This is a Laravel-based REST API application that allows users to submit information about a company, including the company's name, NIP, address, city, and postcode, as well as information about its employees, such as name, surname, and email. All fields are mandatory except for the phone number, which is optional.
 
## Getting started
To run this project, you'll need Docker and Docker Compose installed on your system.


## Installation
1. After you copy repository web24, you must copy env.example and pate to project as .env;<br>
2. In .env file you must configurate databse conection;<br>
`Maybe to the main one, yes. The password must have an uppercase letter, a lowercase special character and a number`
```json
{
  "DB_CONNECTION": "mysql",
  "DB_HOST": "mysql",
  "DB_PORT": "3306",
  "DB_DATABASE": "web24",
  "DB_USERNAME": "web24",
  "DB_PASSWORD": "Qwerty123!"
}
```
3. Build Docker:</br>
`docker-compose build --no-cache`
5. Start Docker's containers:</br>
`docker-compose up -d`
6. Run database migration to configure the database schema, you need to wait a while before executing this command because the dependencies are being installed:</br>
`docker-compose exec web24 php artisan migrate:refresh `

## Usage
To interact with the API, you can use the following endpoint to create a company with employees:
Create a Company with Employees

Endpoint: `/api/company`</br>
HTTP Method: `POST`

Request Body:
```json
{
  "name": "Company Name",
  "nip": "1234567890",
  "adress": "Company Adress",
  "city": "City",
  "post_code": "00-000",
  "employees": [
    {
      "firstName": "FirstName Employee 1",
      "surName": "SurName Employee 1",
      "email": "employee1@example.com",
      "phone_Number": "123456789"
    },
    {
      "firstName": "FirstName Employee 2",
      "surName": "SurName Employee 2",
      "email": "employee2@example.com",
      "phone_Number": "987654321"
    }
  ]
}
```

Response:
```json
{
  "companyId": "{id of created company}"
}

```
