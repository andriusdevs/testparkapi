<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Trailer;


class TrailersController extends AbstractController
{

  #[Route('/trailers', name: 'trailers_list', methods: ['get'])]
  public function trailers(EntityManagerInterface $entityManager): JsonResponse
  {
    $trailers = $entityManager
      ->getRepository(Trailer::class)
      ->findAll();

    $data = [];

    foreach ($trailers as $trailer) {
      $data[] = [
        'id' => $trailer->getId(),
        'number' => $trailer->getNumber(),
        'status' => $trailer->getStatus(),
      ];
    }

    return $this->json($data);
  }
}
