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

Endpoint: `http://localhost:8000/api/company`</br>
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
      "phone_number": "123456789"
    },
    {
      "firstName": "FirstName Employee 2",
      "surName": "SurName Employee 2",
      "email": "employee2@example.com",
      "phone_number": "987654321"
    }
  ]
}
```

Response:
```json
{
  "Company Added"
}

```

Create a Company without Employees

Endpoint: `http://localhost:8000/api/company`</br>
HTTP Method: `POST`

Request Body:
```json
{
  "name": "Company Name2",
  "nip": "1234567891",
  "adress": "Company Adress",
  "city": "City",
  "post_code": "00-000"
}
```

Response:
```json
{
  "Company Added"
}

```

Update Company

Endpoint: `http://localhost:8000/api/company/{id}`</br>
HTTP Method: `PUT`

Request Body:
```json
{
  "name": "Company Name2",
  "nip": "1234567891",
  "adress": "Company Adress",
  "city": "City",
  "post_code": "00-000"
}
```

Response:
```json
{
  "Company Updated"
}

```

Delete Company

Endpoint: `http://localhost:8000/api/company/{id}`</br>
HTTP Method: `DELETE`

Response:
```json
{
  "Company Deleted"
}

```

Get Company

Endpoint: `http://localhost:8000/api/company`</br>
HTTP Method: `GET`

Response:
```json
{
    "data": [
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
                    "phone_number": null
                },
                {
                    "firstName": "FirstName Employee 2",
                    "surName": "SurName Employee 2",
                    "email": "employee2@example.com",
                    "phone_number": null
                }
            ]
        }
    ]
}

```

Add Employee

Endpoint: `http://localhost:8000/api/employee`</br>
HTTP Method: `POST`

Request Body:
```json
{
  "firstName": "Employee FirstName",
  "surName": "Employee LastName",
  "email": "email@gmail.com",
  "phone_number": "123456789",
  "company_id": "1"
}

```

Response:
```json
{
  "Employee Added"
}

```

Update Employee

Endpoint: `http://localhost:8000/api/employee/{id}`</br>
HTTP Method: `PUT`

Request Body:
```json
{
  "firstName": "Employee FirstName2",
  "surName": "Employee LastName2",
  "email": "email@gmail.com",
  "phone_number": "123456789",
  "company_id": "1"
}

```

Response:
```json
{
  "Employee Updated"
}

```
Update Employee

Endpoint: `http://localhost:8000/api/employee/{id}`</br>
HTTP Method: `DELETE`

Request Body:
```json
{
  "firstName": "Employee FirstName2",
  "surName": "Employee LastName2",
  "email": "email@gmail.com",
  "phone_number": "123456789",
  "company_id": "1"
}

```

Response:
```json
{
  "Employee Deleted"
}

```

Get Employee

Endpoint: `http://localhost:8000/api/employee`</br>
HTTP Method: `GET`

Response:
```json
{
    "data": [
        {
            "firstName": "FirstName Employee 1",
            "surName": "SurName Employee 1",
            "email": "employee1@example.com",
            "phone_number": null
        },
        {
            "firstName": "FirstName Employee 2",
            "surName": "SurName Employee 2",
            "email": "employee2@example.com",
            "phone_number": null
        }
    ]
}

```
