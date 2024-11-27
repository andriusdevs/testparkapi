<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Truck;
use App\Entity\Trailer;


class TrucksController extends AbstractController
{

  #[Route('/trucks', name: 'trucks_list', methods: ['get'])]
  public function trucks(EntityManagerInterface $entityManager): JsonResponse
  {
    $trucks = $entityManager
      ->getRepository(Truck::class)
      ->findAll();

    $data = [];

    foreach ($trucks as $truck) {
      $data[] = [
        'id' => $truck->getId(),
        'number' => $truck->getNumber(),
        'status' => $truck->getStatus(),
      ];
    }

    return $this->json($data);
  }
}
