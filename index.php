<?php

require_once __DIR__ . '/inc/all.php';


$route = @(string) ($_GET['page'] ?? 'page'); // $page = isset($_GET['page']) ? $_GET['page'] : 'index';


if ($route === 'page'){
    $pagesContoller = new App\Controller\PagesController(
        new \App\Pages\PagesRepository()
    );

    $page = @(string) ($_GET['page'] ?? 'index');
    $pagesContoller->showPage($page);
}else{
    // var_dump("Hier gebe die Fehlerseite aus (Error 404)");
    $notFoundController = new \App\Controller\NotFoundController();
    $notFoundController->error404();
}

