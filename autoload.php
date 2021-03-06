<?php
function __autoload($class)
{
    if (file_exists(__DIR__ . '/controllers/' . $class . '.php')) {
        require __DIR__ . '/controllers/' . $class . '.php';
    }
    elseif (file_exists(__DIR__ . '/models/' . $class . '.php')) {
        require __DIR__ . '/models/' . $class . '.php';
    }
    elseif (file_exists(__DIR__ . '/views/' . $class . '.php')) {
        require __DIR__ . '/views/' . $class . '.php';
    }
    elseif (file_exists(__DIR__ . '/core/' . $class . '.php')) {
        require __DIR__ . '/core/' . $class . '.php';
    }
    elseif (file_exists(__DIR__ . '/views/layout/' . $class . '.php')) {
        require __DIR__ . '/views/layout/' . $class . '.php';
    }
}
