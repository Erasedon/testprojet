<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(UserRepository $userRepo): Response
    {

        $users = $userRepo->findAll();
        foreach($users as $user) {
            dump($user->getEmail());
        };

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'users' => $users,
        ]);
    }
}
