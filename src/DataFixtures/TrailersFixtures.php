<?php

namespace App\DataFixtures;

use App\Entity\Trailer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TrailersFixtures extends Fixture
{
    public $trailers = [
        ['number'=> 'BB123',
        'status' => 'on'],
        ['number'=> 'BB124',
        'status' => 'on'],
        ['number'=> 'BB125',
        'status' => 'off'],
        ['number'=> 'BB126',
        'status' => 'off'],
        ['number'=> 'BB127',
        'status' => 'off']
    ];

    public function load(ObjectManager $manager): void
    {   
        foreach ($this->trailers as $trd) {
            $trailer = new Trailer();
            $trailer->setNumber($trd['number']); 
            $trailer->setStatus($trd['status']); 

            $manager->persist($trailer);
    
            $manager->flush();
        }

    }
}
