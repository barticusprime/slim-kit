# Slim Kit

Slim Kit provides a base structure to start working with the Slim Framework.

It is bundled with [Eloquent](https://github.com/illuminate/database), [phpdotenv](https://github.com/vlucas/phpdotenv), [Slim Views](https://github.com/slimphp/Slim-Views) and [Twig](https://github.com/twigphp/Twig).

If there's any packages the kit provides that you personally don't want to utilize, you can easily remove them or swap them with your packages of choice.

Although the kit provides a directory structure, you can easily tinker it into your liking or expand it.

# Installation

Clone this repository to install the kit:

```
git clone https://github.com/oxyzero/slim-kit.git
```

You may need to update your `composer.json` file and, if so, just do:

```
php composer install
```

And you're set!

# Structure

The kit structure is very easy to get used to. All of the necessary tooling and configurations to boot Slim are located in the `bootstrap` directory. There, you can set your configuration, add or remove modules and add services to your Slim application.

### Configuration

Configuration files are just standard php files that return an array of keys and values. You can set up your configuration files however you want them. 

Further, you have a helper function `getconfig($filename)` to obtain the configuration from the `$filename`.

Example:

```php
$config = getconfig('database'); // Will obtain the configuration located in: bootstrap/config/database.php
```

### Modules

Modules are essentially packages that need to be setup to work with your Slim application.

Only file names that end with  `.active.php` are loaded by the kit, so you can deactivate modules easily if you wish to do so.

#### Services & Middleware

You can register all of your necessary [services](http://docs.slimframework.com/di/overview/) and [middleware](http://docs.slimframework.com/middleware/overview/) in `bootstrap/services.php` and `bootstrap/middleware.php`, respectively.

## Resources

The `resources` directory contains the `assets` and `views` directories. Do not confuse the `resources/assets` directory to be the location to store your css, js or images files.

Instead, the `resources/assets` is meant to store files that complement your `resources/views` such as SASS files.

If you want to store your css, js or image files, `public/assets` is the place to do just that.

# Enviroment

You can easily set up a development enviroment, by creating an `.env` file and defining the necessary enviroment variables that you need.

If you wish to use a production enviroment, the enviroment variables should be set through your host to avoid loading the `.env` file on each request.

* Note: Define `SLIM_MODE=production` to set Slim into production.

# Migrations & Seeding

Since the kit comes bundled with the [Illuminate Database](https://github.com/illuminate/database) package, we can enjoy migrations and seeding.
Although we do not have tools like `Artisan`, we have a basic approach to easily perform simple migrations and seeding.

Using your command line, within the root folder, try using:

```
php slim migrate
```

This will run all of your migrations listed in `database/migrations`.

If you wish to undo your migrations, execute:

```
php slim migrate:reset
```

And you can create your seeds within `database/seeds`, and seed the database with:

```
php slim seed
```

* This functionality is still in development.

# Helpers

The kit also offers a few helper functions to aid your development process.

+ getconfig($filename)
    + Gets the configuration from a file located in the config directory.

+ env($key, $default)
    + Gets the value of an environment variable. Supports boolean, empty and null.
        If the key does not exist, the function returns the provided default value.

+ dd($variables...)
    + Dumps all of the variables and kills the page.

+ view($template, array $data)
    + Renders a template file. This function makes rendering views a bit more convenient and less verbose. Example:

        ```php
            view('welcome', ['message' => 'Welcome!']);
        ```

        This will render the `resources/views/welcome.php` template file.

# Contributing

If you happen to find an error or you might know how to improve the project further, then please do create an Issue or consider creating a Pull Request.

All contributions are appreciated!
