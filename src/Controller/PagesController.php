<?php

namespace App\Controller;

use App\Pages\PagesRepository;

class PagesController extends AbstractController
{
    protected PagesRepository $pagesRepository;
    public function __construct(PagesRepository $pagesRepository)
    {
        $this->pagesRepository = $pagesRepository;
    }
    public function showPage(string $pageKey):void
    {
        $page = $this->pagesRepository->fetchPage($pageKey);
        $this->render('pages/showPage', [
            'page' => $page
        ]);
    }
}