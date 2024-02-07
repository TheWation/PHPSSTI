<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';
require_once 'filters.php';

// Get the username from the query string
$username = $_GET['username'] ?? 'Guest';

// Create a new Twig environment
$loader = new \Twig\Loader\ArrayLoader();
$twig = new \Twig\Environment($loader);
$twig->addFilter($map);
$twig->addFilter($filter);

// Vulnerable Implementation
$templateString = 'Welcome {{ "' . $username . '" }}!';

// Create a Twig template from the string
$template = $twig->createTemplate($templateString);

// Render the template with the provided data
$output = $template->render(['secret' => 'Pass@123']);

// Send the rendered HTML as the response
echo $output;