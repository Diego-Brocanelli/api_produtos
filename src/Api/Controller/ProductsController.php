<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

$products = $app['controllers_factory'];
//list all products
$products->get('/produtos', function () use ($app) {
    $sql = 'SELECT * FROM produtos;';
    $produtos = $app['db']->fetchAssoc($sql);
    //empty table products
    if($produtos === false)
        $produtos = json_encode(['mensagem:'=>' Nenhum produto cadastrado']);

    return $app->json($produtos);
});

return $products;