<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

//enviando cabeçalhos a cada nova requisição
$app->add(new Tuupola\Middleware\JwtAuthentication([
    "header" => "X-Token",
    "regexp" => "/(.*)/",
    "path" => "/api", /* or ["/api", "/admin"] */
    "ignore" => ["/api/token", "/admin/ping"],
    "secret" => $container->get('settings')['secretKey']
]));

$app->add(function($req, $res, $next){
    $response = $next($req, $res);
    return $response
            ->withHeader('Acess-Control-Allow-Origin', '*')
            ->withHeader('Acess-Control-Allow-Headers', '
            X-Request-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Acess-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});