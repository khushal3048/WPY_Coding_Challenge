## About City Planner API

City's business liasons wants a way to get a few different pieces of information via a restful API endpoints, such as:

- Fetch all people living in your city.
- Fetch all cars when providing a particular street name.
- Fetch the owner(s) of a vehicle when providing a license plate.
- Fetch the full address and street of a house when providing a person's name.

## How to Install

First of all [clone](https://github.com/khushal3048/WPY_Coding_Challenge) the repository and then following commands.

```php
Composer install
php artisan serve
```
## Run API endpoint using Postman

City Planner API is authenticated with API KEY(25E52DA9B217CEA8F768F2249AB8F).

### API endpoints

- **[GET] api/people**

- **[GET] api/cars**

   Query Params (street_name - string)

- **[GET] api/owners**

   Query Params (license_plate - string)

- **[GET] api/house**

   Query Params (person_name - string)
