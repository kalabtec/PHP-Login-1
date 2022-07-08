<?php
/**
 * PHP-login.
 * Adaptado do PHPMailer
 */

/**
 * PHPMailer SPL autoloader.
 * @param string $classname The name of the class to load
 */
function Autoload($classname)
{
    //Can't use __DIR__ as it's only in PHP 5.3+
    $filename = str_replace('\\', DIRECTORY_SEPARATOR, $classname);
    $filename = str_replace('phplogin\\', dirname(__FILE__).DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR, strtolower($classname).'.php');
    //echo "$classname  <br>";
    //$filename = dirname(__FILE__).DIRECTORY_SEPARATOR.'class'.strtolower($classname).'.php';
     $filename = str_replace('\\', DIRECTORY_SEPARATOR, $filename);
    if (is_readable($filename)) {
        require $filename;
    }
}
   
if (version_compare(PHP_VERSION, '5.1.2', '>=')) {
    //SPL autoloading was introduced in PHP 5.1.2
    if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
        spl_autoload_register('Autoload', true, true);
    } else {
        spl_autoload_register('Autoload');
    }
} else {
    /**
     * Fall back to traditional autoload for old PHP versions
     * @param string $classname The name of the class to load
     */
    //function __autoload($classname)
    {
        Autoload($classname);
    }
}