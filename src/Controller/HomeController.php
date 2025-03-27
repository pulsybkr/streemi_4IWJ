<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

final class HomeController extends AbstractController{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig'); 
    }
    #[Route('/upload', name: 'app_upload')]
    public function upload(): Response
    {
        return $this->render('home/upload.html.twig');
    }

    #[Route('/lists', name: 'app_lists')]
    public function lists(): Response
    {
        return $this->render('home/lists.html.twig');
    }

    #[Route('/detail', name: 'app_detail')]
    public function detail(): Response
    {
        return $this->render('home/detail.html.twig');
    }

    #[Route('/category', name: 'app_category')]
    public function category(): Response
    {
        return $this->render('home/category.html.twig');
    }

    #[Route('/discover', name: 'app_discover')]
    public function discover(): Response
    {
        return $this->render('home/discover.html.twig');
    }

    #[Route('/detail_serie', name: 'app_detail_serie')]
    public function detailSerie(): Response
    {
        return $this->render('home/detail_serie.html.twig');
    }  
}
