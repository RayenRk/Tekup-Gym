<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
        #[Route('/dherantdash', name: 'adherantdashboard', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        $user = $this->getUser();


        return $this->render('Dashboard/adherantdashboard.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/coachdash', name: 'coachdashboard', methods: ['GET'])]
    public function index1(UserRepository $userRepository): Response
    {
        $user = $this->getUser();


        return $this->render('Dashboard/userdashboard.html.twig', [
            'user' => $user,
        ]);

}}
