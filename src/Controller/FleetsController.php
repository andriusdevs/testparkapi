<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Fleet;


class FleetsController extends AbstractController
{

  #[Route('/fleets', name: 'fleets_list', methods: ['get'])]
  public function fleets(EntityManagerInterface $entityManager): JsonResponse
  {
    $fleets = $entityManager
      ->getRepository(Fleet::class)
      ->findAll();

    $data = [];

    foreach ($fleets as $fleet) {
      $data[] = [
        'id' => $fleet->getId(),
        'truck' => $fleet->getTruck()->getNumber(),
        'trailer' => $fleet->getTrailer()->getNumber(),
        'status' => $fleet->getStatus(),
      ];
    }

    return $this->json($data);
  }
}
