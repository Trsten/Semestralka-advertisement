<?php
session_start();

spl_autoload_register(function ($className) {
    // Nahradenie Windows seperatorov za /
    $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';

    // osetrenie aby prva polozka namespacu bola v lowercase
    $namespace = explode(DIRECTORY_SEPARATOR, $fileName);
    $namespace[0] = lcfirst($namespace[0]);
    $fixedFileName = implode(DIRECTORY_SEPARATOR, $namespace);

    if (file_exists($fixedFileName))
        include $fixedFileName;
    else
        throw new Exception('No such file ' . $fixedFileName . ' exists');
});