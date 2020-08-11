<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;
use App\Models\Usuario;
use \Firebase\JWT\JWT;
// API REST NÃO GUARDA ESTADO, CADA REQUISICAO TEM INICIO MEIO E FIM



// rota p geracao de token
$app->post('/api/token', function($request, $response){
    
    $dados = $request->getParsedBody();

    $email = $dados['email'] ?? null;
    $email = $dados['senha'] ?? null;

    $usuario = Usuario::where('email', $email)->first();
    
    if(!is_null($usuario) && (md5($senha) === $usuario->senha) ){
        //gerar token
        $secretKey = '$this->get(settings)'['secretKey'];
        $chaveAcesso = JWT::encode($usuario, $secretKey);

        return $response->withJson([
            'chave' => $chaveAcesso
        ]);
    }

    return $response->withJson([
        'chave' => 'erro'
    ]);

});


?>