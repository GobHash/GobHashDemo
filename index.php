<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Application.php';

use Symfony\Component\HttpFoundation\Request;

$app = new Application();

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__.'/views',
]);

$app->extend('twig', function($twig, $app) {
    $twig->addGlobal('nombreEmpresa', 'Lotería Santa Lucía');
    return $twig;
});


$app->get('/', function() use ($app) {
    return $app->render('welcome.twig');
});

$app->get('/feed', function() use ($app) {
    return $app->render('index.twig');
});

$app->get('/profile', function() use ($app) {
    return $app->render('profile.twig');
});

$app->get('/feed/1', function() use ($app) {
    return $app->render('single_hash.twig');
});

// $app->get(
//     '/pais/{paisId}/departamento',
//     function($paisId) use ($app) {
//         return $app->render(
//             'maestro/departamento/index.twig',
//             ['paisId' => $paisId]
//         );
//     }
// );

$app->run();
