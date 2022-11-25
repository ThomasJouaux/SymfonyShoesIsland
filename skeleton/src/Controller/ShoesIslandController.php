<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShoesIslandController extends AbstractController
{
    #[Route('/', name: 'app_shoes_island')]
    public function index(): Response
    {
        return $this->render('shoesIsland/index.html.twig', [
            'controller_name' => 'ShoesIslandController',
        ]);
    }

    #[Route('/CategorieHomme' , name:'app_categorieHomme')]
    public function categorieHomme(CategorieRepository $repo):Response
    {
         $categories = $repo -> findBy(array('categorieType' => 'Homme'));

        return $this->render('shoesIsland/CategorieHomme.html.twig' , [
            'controller_name' => 'ShoesIslandController',
            'categories' => $categories,
        ]);

    }

    #[Route('/CategorieFemme' , name:'app_categorieFemme')]
    public function categorieFemme(CategorieRepository $repo):Response
    {
         $categories = $repo->findBy(array('categorieType' => 'Femme'));

        return $this->render('shoesIsland/CategorieFemme.html.twig' , [
            'controller_name' => 'ShoesIslandController',
            'categories' => $categories,
        ]);

    }   
        
        #[Route('/CategorieEnfant' , name:'app_categorieEnfant')]
        public function categorieEnfant(CategorieRepository $repo):Response
    {
         $categories = $repo->findBy(array('categorieType' => 'Enfant'));
    
        return $this->render('shoesIsland/CategorieEnfant.html.twig' , [
            'controller_name' => 'ShoesIslandController',
            'categories' => $categories,
        ]);
    }
        
    #[Route('/CategorieAccessoire' , name:'app_categorieAccessoire')]
    public function categorieAccessoire(CategorieRepository $repo):Response
{
     $categories = $repo->findBy(array('categorieType' => 'Accessoire'));

    return $this->render('shoesIsland/CategorieAccessoire.html.twig' , [
        'controller_name' => 'ShoesIslandController',
        'categories' => $categories,
    ]);
}

// Produit //

#[Route('shoesIsland/categorieHomme/{categorieId}', name: 'app_produit')]
public function produit(int $categorieId, CategorieRepository $repo): Response
{
   $categorie = $repo -> find($categorieId);
    // dd($produit);
    return $this->render('shoesIsland/ProduitHomme.html.twig', [
        'categorie' => $categorie,
    ]);
}


}