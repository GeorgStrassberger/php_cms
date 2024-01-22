<?php

require_once __DIR__ . '/inc/all.php';


$page = @(string) ($_GET['page'] ?? 'index'); // $page = isset($_GET['page']) ? $_GET['page'] : 'index';


if ($page === 'index'){
    $pagesContoller = new App\Controller\PagesController(
        new \App\Pages\PagesRepository()
    );
    $pagesContoller->showPage('index');
}else{
    // var_dump("Hier gebe die Fehlerseite aus (Error 404)");
    $notFoundController = new \App\Controller\NotFoundController();
    $notFoundController->error404();
}

