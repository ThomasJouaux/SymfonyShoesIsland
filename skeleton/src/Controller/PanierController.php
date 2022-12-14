<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PanierController extends AbstractController
{
    #[Route('/add/{id}', name: 'app_add')]
    public function add(SessionInterface $session,ProduitRepository $repo, $id): Response
    {

        
        $tab=$session->get("panier",[]);
        
        $p = null;
        foreach ($tab as $produit) {
            if ($produit->getId()==$id) {
                $p = $produit;
            }
        }
      
        if ($p==null) {
            $p = $repo->find($id);
            $p->quantite = 1;
            $tab[] = $p;
            
        }  
        else {
            $p->quantite++;
        }



        $session->set("panier", $tab);

//         dd($tab);

        return $this->redirect("/panier");

    }

    #[Route('/sub/{id}', name: 'app_sub')]
    public function sub(SessionInterface $session,ProduitRepository $repo, $id): Response
    {

        $tab=$session->get("panier",[]);
        
        $p = null;
        foreach ($tab as $produit) {
            if ($produit->getId()==$id) {
                $p = $produit;
            }
        }

        if ($p==null) {
            $p = $repo->find($id);
            $p->quantite = 1;
            $tab[] = $p;
        }
        else {
            $p->quantite--;
            if($p->quantite <= 0){
                array_pop($tab);
            }
        }



        $session->set("panier", $tab);

//         dd($tab);

        return $this->redirect("/panier");

    }

    #[Route('/panier', name: 'app_panier')]
    public function index(SessionInterface $session): Response
    {

        $panier = $session->get("panier", []);

        $nb = 0;
        $tva = 0;

        foreach($panier as $value){
            $nb += $value->getPrixProduit();
            $tva = $value->getTvaProduit();
        };
        $tvaProduit = ($nb * $tva) / 100;
        $prixProduitFinal = $nb + $tvaProduit;
        return $this->render('panier/index.html.twig', [
            'panier' => $panier,
            'total' => $nb,
            'tva' => $prixProduitFinal,
        ]);
    }

    #[Route('/clear', name: 'app_clear')]
    public function clear(SessionInterface $session): Response
    {
        $panier = $session->set("panier", []);

        return $this->redirect("/panier");
    }
}
