<?php
// Routes

$app->get('/', function ($request, $response) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'login.phtml');

});

$app->get('/login', function ($request, $response) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'login.phtml');

});


$app->get('/login/twitter/', function ($request, $response) {
	$obj = new Twitter($this->tw);
    $url = $obj->login();

    // return $url;
    return $response->withRedirect($url);

});