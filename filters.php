<?php
$map = new \Twig\TwigFilter('map', function ($array, $callback) {
    return array_map($callback, $array);
});

$filter = new \Twig\TwigFilter('filter', function ($array, $callback = null) {
    if (!is_array($array)) {
        throw new InvalidArgumentException('The input must be an array.');
    }
    
    if ($callback === null) {
        return array_filter($array);
    }
    
    if (!is_callable($callback)) {
        throw new InvalidArgumentException('The callback must be callable.');
    }
    
    return array_filter($array, $callback);
});