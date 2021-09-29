<?php

namespace App\DataFixtures;

use App\Entity\Region;
use App\Entity\User;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('FR-fr');

        $user = new User;

        for($i=1; $i<=10; $i++){
            $region = new Region();

            $region->setNom($faker->state); ;
            $region->setPopulation(); 
        }

        $manager->flush();
    }
}
