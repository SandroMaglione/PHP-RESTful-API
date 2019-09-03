<h1>PHP RESTful API</h1>
<p>
  <img src="https://img.shields.io/badge/version-1.0.0-blue.svg" />
  <a href="https://twitter.com/SandroMaglione">
    <img alt="Twitter: SandroMaglione" src="https://img.shields.io/twitter/follow/SandroMaglione.svg?style=social" target="_blank" />
  </a>
</p>

Simple **RESTful API in PHP**, easy to import and set up. It handles all the main types of http requests using a RESTful approach. Designed for **SQL database**.

## Getting started
All the main functionalities come from the `/config/database.php` file. You first need to add your configuration parameters at the beginning of this file.

Then you will create an object file in the `/objects` directory. This file will be the class from which you will write and run all the queries related to the object itself. The file needs a `$conn` variable and a constuctor to initialize the connection to the database (check out `/objects/collection.php` for a concrete example). You will then write all your queries into their own functions.

Finally, you should create a directory with the same name of the object. Each file inside this directory will be an endpoint for your api calls. You should take a look at the `/collection/get-all-collection.php` file for an example on how to structure the file. You first import the config files (the object and the type of request config file (GET, POST, PUT[update], DELETE). Then you retrieve the call parameters and launch the query from the object file. The api will respond based on the result received from the database.

## Built with
- PHP 7.0

## Versioning
- v1.0.0 - 03 September 2019

## Author
- **Sandro Maglione**
* Website: [sandromaglione.com](https://www.sandromaglione.com/)
* Linkedin: [Sandro Maglione](https://www.linkedin.com/in/sandro-maglione97/)
* Twitter: [@SandroMaglione](https://twitter.com/SandroMaglione)
* Github: [@SandroMaglione](https://github.com/SandroMaglione)

## License
GNU General Public License v3.0, see the [LICENSE.md](https://github.com/SandroMaglione/PHP-RESTful-API/blob/master/LICENSE) file for details.
