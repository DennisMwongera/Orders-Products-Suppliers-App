Mwongera, [19.03.21 23:40]
## Backend Agent Service

### The endpoints ready are:

- /api/orders (Orders)
    - /api//order{id}'
    - /api/create
    - /api/order{id}'
    - /api/order{id}'

            {
                "order_number": "",
                "order_id": "",
            }

- /api/V1/order_details
    - /V1/order{id}'
    - /V1/create
    - /V1/order_detail{id}'
    - /V1/order_detail{id}'

           {
               "order_id": "",
               "product_id": "",
            }

- /api/V2/products
    get by Id- /api/product{id}'
    create - /api/create
    update - /api/product{id}'
    delete - /api/product{id}'

            {
                "name": "",
               "description": "",
               "quantity: ""
            }

- /api/V3/suppliers
    - /V3/supplier{id}'
    - /V3/create
    - /V3/supplier{id}'
    - /V3/supplier{id}'
            {
                 "id": "",
                 "name": "",
            }

- /api/V4/supplierproducts
    - /V3/supplierproducts{id}'
    - /V3/create
    - /V3/supplierproduct{id}'
    - /V3/supplierproduct{id}'

           {
               "supply_id":"",
               "product_id": "",
            }

## Tools
- Vue Js
- Laravel Framework


## Common commands

- http://127.0.0.1:8000

- npm run dev && php artisan serve


## Runnning process

- Run WampServer - phpmyadmin to get acces to the backend named Laravel

- Inside the Project build the latest Javascript code using "npm run dev" that will be compiled to the public js

- Then again on the project folder run "php artisan serve" to fire up the backend

- Open the http://127.0.0.1:8000 link and view the app




## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
