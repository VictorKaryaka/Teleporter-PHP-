<?php

define('START_RUNTIME', microtime(true));

/**
 * @param $className
 *
 * Autoload classes
 */
function __autoload($className)
{
    $extension = ".class.php";
    $paths = array('src\application', 'src\util');
    $className = str_replace("_", DIRECTORY_SEPARATOR, $className);
    foreach ($paths as $path) {
        $filename = $path . DIRECTORY_SEPARATOR . $className;
        if (is_readable($filename . $extension)) {
            include_once $filename . $extension;
            break;
        }
    }
}

/**
 * Parcing .ini file
 */
try {
    $persons = parse_ini_file("persons.ini");
} catch (Exception $e) {
    die($e->getMessage());
}

/**
 * Check for the presence of at least two children
 */
if (array_key_exists('Son', $persons) && (array_key_exists('Daughter', $persons))) {
    $action = new Action();
} else {
    die('Add at least two children!');
}

//Add participants
foreach ($persons as $key => $value) {
    //If there is a comma, then parsing the names
    if (strpos($value, ',')) {
        $exp = explode(',', $value);
        foreach ($exp as $item) {
            $action->addBody(new $key($item));
        }
    } else {
        $action->addBody(new $key($value));
    }
}

$action->move();
