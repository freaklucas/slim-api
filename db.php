<?php

if (PHP_SAPI != 'cli') {
    exit('Rodar via CLI');
}

require __DIR__ . '/vendor/autoload.php';

// session_start();

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

//set up dependencies

require __DIR__ . '/src/dependencies.php';

$db = $container->get('db'); // error nesta linha

$schema = $db->schema();
$tabela = 'produtos';

$schema->dropIfExists($tabela); 

// criando tabela produtos
$schema->create($tabela, function($table){
    $table->increments('id');
    $table->string('titulo', 100);
    $table->text('descricao');
    $table->decimal('preco', 11,2);
    $table->string('fabricante', 60);
    $table->timestamps();
});

//preenchendo a tabela
$db = table($tabela)->insert([
    'titulo' => 'Smartphone Motorola G6 32GB Dual Chip',
    'descricao' => 'Android Oreo - 8.0 Tela de 5.7 Octa-Core',
    'preco' => 899.00,
    'fabricante' => 'Motorola',
    'create_at' => '2020-10-12',
    'updated_at' => '2020-10-22'
    ]);
  
$db = table($tabela)->insert([
    'titulo' => 'Iphone X 128 GB Dual Chip',
    'descricao' => 'Ios 12 Tela de 5.8 Câmera de 12MP Octa-Core',
    'preco' => 3899.00,
    'fabricante' => 'Apple',
    'create_at' => '2020-10-12',
    'updated_at' => '2020-10-22' 
]);

$db = table($tabela)->insert([
    'titulo' => 'Redmi Note 8 128GB Dual Chip',
    'descricao' => 'Android 12 Tela de 5.8 Câmera de 22MP Octa-Core',
    'preco' => 1899.00,
    'fabricante' => 'Xiaomi',
    'create_at' => '2020-10-12',
    'updated_at' => '2020-10-22' 
]);






?>