<?php
// Create and configure Slim app
$config = ['settings' => [
    'addContentLengthHeader' => false,
]];
$app = new \Slim\App($config);

// Define app routes
$app->get('http://techphant.online/bus/cities/getCityInfo', function ($request, $response, $args) {
    return $response->write("Hello " . $args['data']);
});

// Run app
$app->run();