<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Fleet;
use App\Entity\Truck;
use App\Entity\Trailer;
use App\Entity\Driver;
use App\DataFixtures\TrucksFixtures;
use App\DataFixtures\TrailersFixtures;
use App\DataFixtures\DriverFixtures;

class FleetsFixtures extends Fixture implements DependentFixtureInterface
{
    public $fleets = [
        ['truck' => 'AAA123',
        'trailer' => 'BB123',
        'driver' => ['Dsurname1', 'Dsurname2']
        ],
        ['truck' => 'AAA124',
        'trailer' => 'BB124',
        'driver' => ['Dsurname3']
        ],
        ['truck' => 'AAA125',
        'trailer' => 'BB125',
        'driver' => ['Dsurname4']
        ],
        ['truck' => 'AAA126',
        'trailer' => 'BB126',
        'driver' => []
        ]

    ];


    public function load(ObjectManager $manager): void
    {   
        $truckRepository = $manager->getRepository(Truck::class);
        $trailerRepository = $manager->getRepository(Trailer::class);
        $driverRepository = $manager->getRepository(Driver::class);

        foreach ($this->fleets as $f) {
            $fleet = new Fleet();

            $truck = $truckRepository->findOneBy(['Number' => $f['truck']]);
            if( $truck){
                $fleet->setTruck($truck); 
            }
            
            
            $trailer = $trailerRepository->findOneBy(['Number' => $f['trailer']]);
            if( $trailer){
                $fleet->setTrailer($trailer); 
            }

            if ($f['driver']){
                foreach ($f['driver'] as $driverSurname){
                    $driver = $driverRepository->findOneBy(['Surname' => $driverSurname]);
                    if($driver){
                        $fleet->setDriver($driver); 
                    }
                }
            }

            if($truck->getStatus() == 'on' && $trailer->getStatus() == 'on'){
                $fleet->setStatus('free');
            }else{
                $fleet->setStatus('works');
            }

            
           

            $manager->persist($fleet);
    
            $manager->flush();
        }

    }

    public function getDependencies(): array
    {
        return [
            TrucksFixtures::class,
            TrailersFixtures:: class,
            DriverFixtures::class,
        ];
    }
}
