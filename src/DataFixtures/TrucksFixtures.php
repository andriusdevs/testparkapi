<?php

namespace App\DataFixtures;

use App\Entity\Truck;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TrucksFixtures extends Fixture
{
    public $trucks = [
        ['number'=> 'AAA123',
        'status' => 'on'],
        ['number'=> 'AAA124',
        'status' => 'on'],
        ['number'=> 'AAA125',
        'status' => 'on'],
        ['number'=> 'AAA126',
        'status' => 'off'],
        ['number'=> 'AAA127',
        'status' => 'off']
    ];

    public function load(ObjectManager $manager): void
    {   
        foreach ($this->trucks as $trd) {
            $truck = new Truck();
            $truck->setNumber($trd['number']); 
            $truck->setStatus($trd['status']); 

            $manager->persist($truck);
    
            $manager->flush();
        }

    }
}
