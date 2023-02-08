<?php


namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Category;
use App\Entity\Livre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager ;
use Faker\Factory;

class LivreFixture extends Fixture 
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }
	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param \Doctrine\Persistence\ObjectManager $manager
	 * @return mixed
	 */
	public function load(ObjectManager $manager) {
        $categories = ['polar', 'science-fiction', 'biographie', 'nouvelles', 'roman'];


        foreach ($categories as $key => $category){
            $cat = new Category();
            $cat->setLabel($category);
            $manager->persist($cat);
            $this->addReference("cate-" . $key, $cat);
        }

        for ($u = 0; $u < 200; $u++){
            $auteur = new Author();
            $auteur->setName($this->faker->lastName())
                ->setFirstname($this->faker->firstName())
                ->setDate($this->faker->dateTime('2000_01_01'))
                ->setEstPrime($this->faker->boolean());
            $manager->persist($auteur);
            $this->addReference("auteur-" . $u, $auteur);
            
        }
        


        for($i = 0 ; $i < 50 ; $i++)
        {
            $livre = new Livre();
            $livre->setTitre($this->faker->sentence(7, true))
                ->setResume($this->faker->paragraph(3, true))
                ->setText($this->faker->paragraph(1, true))
                ->setCategory($this->getReference('cate-'.rand(0,count($categories)-1)))
                ->setEditor($this->faker->word())
                ->setDate(new \DateTime($this->faker->date('Y-m-d','now'))) ;
                
            for ($z = 0; $z < rand(1,3); $z++)
            {
                    $test = rand(0, 199);
                    $livre->addAuthor($this->getReference('aut-' . $test));
            }
            
            $manager->persist($livre);
            
        }
        $manager->flush();
	}
}
