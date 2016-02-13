<?php

/**
 * COPY THIS FILE TO YOUR PROJECT ROOT TO GET STARTED.
 */

require 'vendor/autoload.php';

/**
 * The path to the ist-coding-standard xml file. If you followed the README instructions, it should be symlinked
 * in the root of your project directory.
 */
$istStandardPath = "ist-standard.xml";

/**
 * A list of files and folders that you want to perform code style checking on. This should include the application folder
 * any Domain-specific folders, as well as your tests. If any directories are provided, they will be looked through recursively.
 */
$filesAndFolders = [
    'app/',
    'tests/'
];


$fileString = implode(" ", $filesAndFolders);

$ignoreWarnings = (in_array("--ignore-warnings", $argv)) ? "-n" : "";

$status = 0;
if (in_array("--fix", $argv)) {
    passthru("phpcbf --standard={$istStandardPath} {$fileString} {$ignoreWarnings}", $status);
} else {
    passthru("phpcs --standard={$istStandardPath} {$fileString} {$ignoreWarnings}", $status);
}

exit($status);
