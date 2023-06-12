<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/experience', name: 'app_experience_')]
class ExperienceController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('experience/index.html.twig', [
        ]);
    }

    #[Route('/frame-one', name: 'frame_one', methods: ['GET'])]
    public function frameOne(): Response
    {
        return $this->render('experience/frameOne.html.twig', [
        ]);
    }
    #[Route('/frame-two', name: 'frame_two', methods: ['GET'])]
    public function frameTwo(): Response
    {
        return $this->render('experience/frameTwo.html.twig', [
        ]);
    }

    // TODO Voir les transitions (fade in / fade out / animations / etc) CSS entre les pages !!!
    // TODO Ajouter une musique de fond => !!!
    // TODO Ajouter le choix entre plusieurs sons d'ambiance
    // TODO Sauvegarder le choix de l'utilisateur en session // Cookie

    // TODO Voir comment changer automatiquement le status co / déco de l'admin pour les autres users
}
