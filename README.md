# Company Information REST API

## Description
This is a Symfony-based REST API application that allows users to submit information about a company, including the company's name, NIP, address, city, and postcode, as well as information about its employees, such as name, surname, and email. All fields are mandatory except for the phone number, which is optional.
 
## Getting started
To run this project, you'll need Docker and Docker Compose installed on your system.


## Installation
1. Clone this repository to your local machine:</br>
`git clone https://github.com/Mariusz225/company_info_rest_api.git`
2. Navigate to the project directory:<br/>
`cd web24`
3. Build Docker:</br>
`docker-compose build --no-cache`
4. Start Docker's containers:</br>
`docker-compose up --d`
5. Install project dependencies using Composer:</br>
`docker exec -it company_info_rest_api-php-1 composer install`
6. Run database migrations to set up the database schema:</br>
`docker exec -it company_info_rest_api-php-1 php bin/console doctrine:migrations:migrate`


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
  "postCode": "00-000",
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
