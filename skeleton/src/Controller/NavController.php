<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NavController extends AbstractController
{
    public function index(CategorieRepository $repo): Response
    {
        return $this->render('header.html.twig', [
            'categories' => $repo->findAll(),
        ]);
    }
}
