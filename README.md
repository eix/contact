# The Eix documentation and sample website

This Eix web application, available at http://eix.nohex.com/, serves the purposes of both documenting and showcasing [Eix]()'s capabilities, and as an example of how to build Eix applications.

Feel free to peruse the source code to get acquainted with Eix's philosophy.

## Folder structure

Eix applications are organised in a folder structure that facilitates separation of concerns.

For instance, in order to deploy an Eix application in production, only the `public/`, `data/`, `src/` and `system/` folders are needed. The latter can even be deployed separately.

### `public/`

This folder houses the web application's document root — in other words, the publicly available parts of the web application. Whatever the web server is supposed to deliver directly must be here: images, stylesheets, scripts, and the web application index page (i.e. `index.php`).

### `src/`

The application's business logic lives under that folder. It is usually separated by language, which is the reason why a `php` folder is found there.

The `src/php/` folder must be added to PHP's `include_path` for the application to work in the intended way. This task is usually taken care of by `public/index.php`.

### `data/`

Any files required by the application which are not source code can be left here. Typically, the application settings are to be found under `data/environment`, the templates under `data/pages/`, etc.

### `test/`

The unit tests and other testing facilities are stored in the `test/` folder.

### `build/`

When the application is built, the results end up somewhere in the `build/` folder hierarchy. Its contents are volatile, and must never be considered part of the source.

### `system/`

All external system configurations, such as web server settings, must be stored under the `system/` folder.