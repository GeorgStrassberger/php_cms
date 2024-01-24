<?php

namespace App\Controller;

use App\Pages\PagesRepository;

class PagesController extends AbstractController{

    public function __construct(protected PagesRepository $pagesRepository){
        parent::__construct($this->pagesRepository);
    }

    public function showPage(string $pageKey) {

        $page = $this->pagesRepository->fetchPage($pageKey);

        if (empty($page)){
            return $this->showError404();
        }

        $this->render('pages/showPage', [
            'page' => $page
        ]);
    }
}