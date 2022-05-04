## VIPL

Aplicación web  + API (Usuarios mobiles y banners)

### Pasos a seguir

- composer install
- composer du
- npm install
- npm run dev
- php artisan migrate
- php artisan db:seed

El seed carga los datos iniciales de la base de datos como la tabla usuarios y usuarios mobiles

- La contraseña de la tabla usuario queda encriptado por default es 123456.

- Se registro el usuario default al sistema 
INSERT INTO `users` (`id`, `email`, `password`, `username`) VALUES
(1, 'cctvsolucion@gmail.com', '123456', 'eduarladds');

- Se registro los usuarios mobiles:
INSERT INTO `users_mobile` (`id`, `name`, `email`, `phone`, `date_of_birth`, `date_register`, `type_login`, `active`) VALUES
(1, 'EDUARDO GONZALEZ C', 'eduardo@gmail.com', '+525511223344', '20/03/1990', '29/04/2022', 'email', 1),
(2, 'JONH', 'john@gmail.com', '+52550011223344', '20/03/1980', '29/04/2022', 'email', 0),
(3, 'JAMES THOMAS', 'thomas@gmail.com', '+525590087812', '20/03/1980', '29/04/2022', 'email', 0);




## API

- Con la sección de api se podra dar de alta a usuarios mobiles

### api/register
- El agregar el json para crear nuevos usuarios

{
    "name": "Cesar Chab",
    "email": "admin2@demo.com",
    "phone": "9995048783",
    "date_of_birth": "27/01/1989",
    "date_register": "03/05/2022",
    "type_login": "email"
}

- El resultado de la petición sera de esta forma:

{
    "success": true,
    "data": {
        "name": "Cesar Chab",
        "email": "admin2@demo.com",
        "phone": "9995048783",
        "date_of_birth": "27/01/1989",
        "date_register": "03/05/2022",
        "type_login": "email",
        "active": 1,
        "updated_at": "2022-05-04T04:24:05.000000Z",
        "created_at": "2022-05-04T04:24:05.000000Z",
        "id": 4
    },
    "message": "User saved successfully"
}

## api/banners

- Con este endpoint se filtra de 10 en 10 de forma descendente obteniendo el banner más actual en el sistema. El resultado sera de esta forma:


    {
        "success": true,
        "data": {
            "current_page": 1,
            "data": [
                {
                    "id": 1,
                    "title": "Test",
                    "description": "Hello world!",
                    "image": "RJXv2ePenv.jpg",
                    "deleted_at": null,
                    "created_at": "2022-05-04T04:31:40.000000Z",
                    "updated_at": "2022-05-04T04:31:40.000000Z",
                    "image_path": "http://127.0.0.1:8000/banners/RJXv2ePenv.jpg"
                }
            ],
            "first_page_url": "http://127.0.0.1:8000/api/banners?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "http://127.0.0.1:8000/api/banners?page=1",
            "links": [
                {
                    "url": null,
                    "label": "&laquo; Previous",
                    "active": false
                },
                {
                    "url": "http://127.0.0.1:8000/api/banners?page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": null,
                    "label": "Next &raquo;",
                    "active": false
                }
            ],
            "next_page_url": null,
            "path": "http://127.0.0.1:8000/api/banners",
            "per_page": 10,
            "prev_page_url": null,
            "to": 1,
            "total": 1
        },
        "message": "Banners retrievied successfully"
    }




## License

The Laravel framework is open-sourced software licensed under the **MIT license**.
