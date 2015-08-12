<?php

use Slim\Slim;

if (! function_exists('getconfig')) {
    /**
     * Gets the configuration from a file
     * located in the config directory.
     *
     * @param  string $filename
     * @return array
     */
    function getconfig($filename)
    {
        $file = CONFIG_PATH . $filename . '.php';

        if (! file_exists($file)) {
            throw new \RuntimeException('Cannot locate "' . $filename . '"" in "' . CONFIG_PATH . '".');
        }

        return require_once $file;
    }
}

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @link https://github.com/laravel/framework/blob/5.1/src/Illuminate/Foundation/helpers.php#L618
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return ($default instanceof Closure) ? $default() : $default;
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }

        if ($value[0] === '"' && $value[strlen($value) - 1] === '"') {
            return substr($value, 1, -1);
        }

        return $value;
    }
}

if (! function_exists('dd')) {
    /**
     * Dumps all of the variables and kills the page.
     *
     * @return void
     */
    function dd() {
        array_map(function($x) {
            var_dump($x);
        }, func_get_args());

        die();
    }
}

if (! function_exists('view')) {
    /**
     * Renders a template file.
     *
     * @param  string $template The template pathname, relative to the template base directory.
     * @param  array  $data     Optional data passed into the view.
     * @return string  The rendered template.
     * @throws \RuntimeException    If resolved template pathname is not a valid file.
     */
    function view($template, $data = null) {

        if (substr($template, -4) != '.php') {
            $template .= '.php';
        }

        return Slim::getInstance()->render($template, (array) $data);
    }
}
