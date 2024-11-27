<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Driver;

class DriverFixtures extends Fixture
{
    public $drivers = [
        ['name'=> 'Dname1',
        'surname' => 'Dsurname1'],
        ['name'=> 'Dname2',
        'surname' => 'Dsurname2'],
        ['name'=> 'Dname3',
        'surname' => 'Dsurname3'],
        ['name'=> 'Dname4',
        'surname' => 'Dsurname4']
    ];

    public function load(ObjectManager $manager): void
    {   
        foreach ($this->drivers as $d) {
            $driver = new Driver();
            $driver->setName($d['name']); 
            $driver->setSurname($d['surname']); 

            $manager->persist($driver);
    
            $manager->flush();
        }

    }
}
