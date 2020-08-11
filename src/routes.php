<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->options('/{routes:.+}', function($request, $response, $args){
    return $response;
});

// Routes
require __DIR__ . '/../routes/autenticacao.php';

require __DIR__ . '/../routes/produtos.php';

// retorno do slim p uma rota inexistente(404):
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res){
    $handler = $this->notFoundHeadler;
    return $handler($req, $res);
});


?>