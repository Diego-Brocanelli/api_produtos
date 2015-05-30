<?php

$docs = $app['controllers_factory'];

//documentação
$docs->get('/docs', function () use ($app) {
    return $app['twig']->render('doc.html', array());
});

return $docs;