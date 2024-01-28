<?php

require_once __DIR__ . '/inc/all.php';

$container = new \App\Support\Container();
$container->add('pdo', function () {
    return require __DIR__ . '/inc/db-connect.inc.php';
});
$container->add('pagesRepository', function () use ($container) {
    return new \App\Pages\PagesRepository($container->get('pdo'));
});
$container->add('pagesController', function () use ($container) {
    return new \App\Controller\PagesController($container->get('pagesRepository'));
});
$container->add('notFoundController', function () use ($container) {
    return new \App\Controller\NotFoundController($container->get('pagesRepository'));
});


$route = @(string) ($_GET['route'] ?? 'page'); // $page = isset($_GET['page']) ? $_GET['page'] : 'index';

if ($route === 'page') {
    $pagesController = $container->get('pagesController');
    $page = @(string) ($_GET['page'] ?? 'index');
    $pagesController->showPage($page);
} else {
    $notFoundController = $container->get('notFoundController');
    $notFoundController->error404();
}
