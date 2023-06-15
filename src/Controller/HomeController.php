<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(UserRepository $userRepository): Response
    {
        dd($userRepository->findAll());
        return $this->render('home/index.html.twig', []);
    }

    /**
     * @Route("/dashboard", name="app_dashboard")
     */
    public function dashboard(): Response
    {
        return $this->render('dashboard/index.html.twig', []);
    }

    /**
     * @Route("/cr/profile", name="app_create_profile")
     */
    public function profile(): Response
    {
        return $this->render('dashboard/profile.html.twig', []);
    }
}
