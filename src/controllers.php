<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//documentação 
$app->get('/', function () use ($app) {
    return $app['twig']->render('doc.html', array());
})
->bind('homepage');
//lista de produtos
$app->get('/api/v1/produtos', function () use ($app) {
    $sql = 'SELECT * FROM produtos;';
    $produtos = $app['db']->fetchAssoc($sql);
    //em caso de nenhum produto cadastrado
    if($produtos === false)
        $produtos = json_encode(['mensagem:'=>' Nenhum produto cadastrado']);

    return $app->json($produtos);
});
//documentação
$app->get('/api/v1/docs', function () use ($app) {
    return $app['twig']->render('doc.html', array());
});

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html',
        'errors/'.substr($code, 0, 2).'x.html',
        'errors/'.substr($code, 0, 1).'xx.html',
        'errors/default.html',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
