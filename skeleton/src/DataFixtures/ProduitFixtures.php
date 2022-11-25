<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProduitFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            CategorieFixtures::class,
        ];
    }
    public function load(ObjectManager $manager): void
    {
        $typeProduit = array('Sneakers' => 'a' , 'Chaussure de Ville' => 'b' , 'Chaussure haut de gamme' => 'c' , 'Chaussure de sport' => 'd'  );
        $sexeProduit = array('Enfant' =>'a' , 'Femme'=>'b' , 'Homme' => 'c');
        $couleurProduit = array('gris' => 'a', 'blanc'=>'b' , 'bleu'=>'c' , 'vert'=>'d' , 'jaune'=>'e' , 'orange'=>'f' );
       
        $prixMax = 1300;
        $prixMin= 20;
        $qteStockMin = 0;
        $qteStockMax = 500;

        for ($i = 0 ; $i<=30 ; $i++){
            $randCouleurProduit = array_rand($couleurProduit , 1);
            $randSexeProduit = array_rand($sexeProduit, 1);
            $randTypeProduit = array_rand($typeProduit, 1);
            $produit = new Produit();
            $produit ->setSexeProduit($randSexeProduit)
            ->setImgProduit('img')
            ->setNomProduit("Produit n°".$i)
            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
            ->setTypeProduit($randTypeProduit)
            ->setQteStock(rand($qteStockMin , $qteStockMax))
            ->setPrixProduit(rand($prixMin , $prixMax))
            ->setCouleurProduit($randCouleurProduit)
            ->setCategory($this->getReference("Sneakers"));
            $manager->persist($produit);
        }

        $manager->flush();
    }
}
