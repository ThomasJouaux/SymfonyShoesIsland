<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\SousCategorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

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


        $categorieHomme = new Categorie();
        $categorieHomme->setCategorieNom("Categorie homme")
            ->setCategorieType("Homme")
            ->setCategorieImg('http://placehold.it/350x150');
        $manager->persist($categorieHomme);

        $categorieFemme = new Categorie();
        $categorieFemme->setCategorieNom("Categorie femme")
            ->setCategorieType("Femme")
            ->setCategorieImg('http://placehold.it/350x150');

        $manager->persist($categorieFemme);

        $categorieEnfant = new Categorie();
        $categorieEnfant->setCategorieNom("Categorie enfant")
            ->setCategorieType("Enfant")
            ->setCategorieImg('http://placehold.it/350x150');

        $manager->persist($categorieEnfant);



        $categorieAccessoire = new Categorie();
        $categorieAccessoire->setCategorieNom("Categorie accessoire")
            ->setCategorieType("Accessoire")
            ->setCategorieImg('http://placehold.it/350x150');

        $manager->persist($categorieAccessoire);


                $SousCategorieHomme = new SousCategorie();
                $SousCategorieHomme->setSousCategorieNom("Sous Categorie homme")
                    ->setSousCategorieSexe("Homme")
                    ->setSousCategorieType("Sport");
                $SousCategorieHomme->setCategorie($categorieHomme);

                $manager->persist($SousCategorieHomme);

                $SousCategorieFemme = new SousCategorie();
                $SousCategorieFemme->setSousCategorieNom("Sous Categorie Femme")
                    ->setSousCategorieSexe("Femme")
                    ->setSousCategorieType("Sport");
                $SousCategorieFemme->setCategorie($categorieFemme);

                $manager->persist($SousCategorieFemme);

                $SousCategorieEnfant = new SousCategorie();
                $SousCategorieEnfant->setSousCategorieNom("Sous Categorie Enfant")
                    ->setSousCategorieSexe("Enfant")
                    ->setSousCategorieType("Sport");
                    $SousCategorieEnfant->setCategorie($categorieEnfant);


                $manager->persist($SousCategorieEnfant);


                $SousCategorieAccessoire = new SousCategorie();
        $SousCategorieAccessoire->setSousCategorieNom("Sous Categorie Accessoire")
            ->setSousCategorieSexe('Accessoire')
            ->setSousCategorieType("Sport");
                    $SousCategorieAccessoire->setCategorie($categorieAccessoire);

                    $manager->persist($SousCategorieAccessoire);

                        $produit1 = new Produit();
                        $produit1->setSexeProduit("Homme")
                            ->setImgProduit('img')
                            ->setNomProduit("Sneakers Homme")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Sport")
                            ->setQteStock(125)
                            ->setPrixProduit(250)
                            ->setCouleurProduit('Gris');
                        $produit1->setSousCategorie($SousCategorieHomme);
                        $manager->persist($produit1);

                        $produit2 = new Produit();
                        $produit2->setSexeProduit("Homme")
                            ->setImgProduit('img')
                            ->setNomProduit("Chaussure de ville Homme")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Ville")
                            ->setQteStock(125)
                            ->setPrixProduit(250)
                            ->setCouleurProduit('Gris');
                        $produit2->setSousCategorie($SousCategorieHomme);
                        $manager->persist($produit1);

                        $produit3 = new Produit();
                        $produit3->setSexeProduit("Femme")
                            ->setImgProduit('img')
                            ->setNomProduit("Sneakers Femme")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Sport")
                            ->setQteStock(125)
                            ->setPrixProduit(250)
                            ->setCouleurProduit('Gris');
                        $produit3->setSousCategorie($SousCategorieFemme);
                        $manager->persist($produit3);

                        $produit4 = new Produit();
                        $produit4->setSexeProduit("Femme")
                            ->setImgProduit('img')
                            ->setNomProduit("Ville Femme")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Ville")
                            ->setQteStock(125)
                            ->setPrixProduit(250)
                            ->setCouleurProduit('Gris');
                        $produit4->setSousCategorie($SousCategorieFemme);
                        $manager->persist($produit4);


                        $produit5 = new Produit();
                        $produit5->setSexeProduit("Enfant")
                            ->setImgProduit('img')
                            ->setNomProduit("Sneakers Enfant")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Sport")
                            ->setQteStock(125)
                            ->setPrixProduit(250)
                            ->setCouleurProduit('Gris');
                        $produit5->setSousCategorie($SousCategorieEnfant);
                        $manager->persist($produit5);


                        $produit6 = new Produit();
                        $produit6->setSexeProduit("Enfant")
                            ->setImgProduit('img')
                            ->setNomProduit("Chaussure de ville Enfant")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Ville")
                            ->setQteStock(125)
                            ->setPrixProduit(250)
                            ->setCouleurProduit('Gris');
                        $produit6->setSousCategorie($SousCategorieEnfant);
                        $manager->persist($produit6);


        $manager->flush();
    }
}
