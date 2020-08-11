<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;
// Routes p produtos
//criando grupos de rotas
$app->group('/api/v1', function(){
        
    $this->get('/produtos/lista', function($request, $response){
        $produtos = Produto::get();
        return $response->withJson($produtos);

    });
});

// adiciona um produto

$this->post('/produtos/adiciona', function($request, $response){

    $dados = $request->getParsedBody();
    // validar(tratamento de erros)...
    $produto = Produto::create($dados);
    return $response->withJson($produto);
});

/// recuperar um produto p um determinado ID
$this->post('/produtos/lista/{id}', function($request, $response, $args){
    
    $produto = Produto::findOrFail($args['id']);
    return $response->withJson($produto);
});

// atualizar um id p determinado id(passado por URL)
$this->put('/produtos/atualiza/{id}', function($request, $response, $args){
    $dados = $request->getParsedBody();
    $produto = Produto::findOrFail($args['id']);
    $produto->update($dados);
    return $response->withJson($produto);
});

/// remove um produto p um determinado ID
$this->post('/produtos/remove/{id}', function($request, $response, $args){
    $produto = Produto::findOrFail($args['id']);
    $produto->delete();  
    return $response->withJson($produto);
});


// ****ideia de validação***
// definir um id id->01  e o id_cliente->5656. Assim, a inserção de itens só se dá por conta do id verificado 
//logo, cliente 5656 ele só pode alterar os dados que ele mesmo enviou
// e implementsr o status de envioA

?>