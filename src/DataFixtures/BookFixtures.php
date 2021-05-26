<?php
use Faker\Factory;
use App\Entity\Books;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('FR-fr');

        for($a =1; $a<=10; $a++){
            $books = new Books();
            $title = $faker->sentence($nbWords = 1, $variableNbWords = true);
            $author = $faker->sentence($nbWords = 1, $variableNbWords = true);
            $genre = $faker->sentence($nbWords = 1, $variableNbWords = true);
            $resume = '<p>'.join('</p><p>',$faker->paragraphs(1)).'</p>';
            $format = $faker->sentence($nbWords = 1, $variableNbWords = true);
            $date = $faker->year($max = 'now');
            

            $books->setTitle($title)
                  ->setCoverImage('https://picsum.photos/150/350')
                    ->setAuthor($author)
                    ->setGenre($genre)
                    ->setResume($resume)
                    ->setFormat($format)
                    ->setDate($date)
                    ->setPrice(rand(6,15))
                
                ;
                    


            $manager->persist($books);


          
           
        }

        $manager->flush();
    }
}
