<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Fleet;

class OrderController extends AbstractController
{
    #[Route('/orders', name: 'order_list', methods: ['get'])]
    public function orders(EntityManagerInterface $entityManager): JsonResponse
    {
      $fleets = $entityManager
        ->getRepository(Fleet::class)
        ->findBy(
            ['Status' => 'works']
        );
  
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
