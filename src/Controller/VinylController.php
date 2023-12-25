<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        $tracks = [
            [
                'song' => 'Gangsta\'s Paradise',
                'artist' => 'Coolio',
            ],
            [
                'song' => 'Waterfalls',
                'artist' => 'TLC',
            ],
            [
                'song' => 'Yesterday',
                'artist' => 'The Beatles',
            ],
            [
                'song' => 'The Final Countdown',
                'artist' => 'Europe',
            ],
        ];


        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'Part-time Junkie',
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if ($slug) {
            $title = 'Genre: ' . u(str_replace('-', ' ', $slug))->title(true);
        } else {
            $title = 'All Genre';
        }

        return new Response($title);
    }
}