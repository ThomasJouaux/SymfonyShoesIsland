<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    public function getDependencies()
    {
        return [
            CategorieFixtures::class,
        ];
    }
    public function load(ObjectManager $manager): void
    {
        
        $nomCategorie = array('Sneakers' , 'Chaussure de Ville' , 'Chaussure haut de gamme' , 'Chaussure de sport'  );
        foreach ($nomCategorie as $key => $value) {
            $categorieHomme = new Categorie();
            $categorieHomme->setCategorieNom("Categorie : ".$value)
                            ->setCategorieType("Homme")
                            ->setCategorieImg('http://placehold.it/350x150');
            
            $manager->persist($categorieHomme);

            $categorieFemme = new Categorie();
            $categorieFemme ->setCategorieNom("Categorie : ".$value)
            ->setCategorieType("Femme")
            ->setCategorieImg('http://placehold.it/350x150');

            $manager->persist($categorieFemme);

            $categorieEnfant = new Categorie();
            $categorieEnfant ->setCategorieNom("Categorie : ".$value)
            ->setCategorieType("Enfant")
            ->setCategorieImg('http://placehold.it/350x150');

            $manager->persist($categorieEnfant);

            $this->setReference($value, $categorieHomme);

        
        }
        $nomCategorieAccessoire = array("Lacets" , "Cirage" , "Semelles" );
     
        foreach ($nomCategorieAccessoire as $key => $value) {
                    
            $categorieAccessoire = new Categorie();
            $categorieAccessoire ->setCategorieNom("Categorie : ".$value)
            ->setCategorieType("Accessoire")
            ->setCategorieImg('http://placehold.it/350x150');

            $manager->persist($categorieAccessoire);
    
        }
        $manager->flush();
        
    }
    
}
