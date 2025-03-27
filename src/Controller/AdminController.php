<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminController extends AbstractController{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/admin.html.twig');
    }

    #[Route('/admin/films', name: 'app_admin_films')]
    public function films(): Response
    {
        return $this->render('admin/admin_films.html.twig');
    }

    #[Route('/admin/users', name: 'app_admin_users')]
    public function users(): Response
    {
        return $this->render('admin/admin_users.html.twig');
    }

    #[Route('/admin/add_films', name: 'app_admin_add_films')]
    public function addFilms(): Response
    {
        return $this->render('admin/admin_add_films.html.twig');
    }
}

