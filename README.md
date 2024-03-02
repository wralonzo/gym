# CodeIgniter 4 Framework

## What is CodeIgniter?



## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

## Requerimientos

PHP version 8 or higher is required, with the following extensions installed:

- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- Copiar la carpeta del  proyecto en htdocs de apacha
- Modificar las credenciales de la base de datos en el archivo aap/config/Database.php 
- Modicicar el archivo app/config/App.php la linea 19 public string $baseURL = 'http://localhost:8080/'; reemplazar la URL local y el puerto

