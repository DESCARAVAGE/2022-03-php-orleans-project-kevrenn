<?php

namespace App\Controller;

use App\Model\EventManager;

class AdminEventController extends AbstractController
{
    public function index(): string
    {
        if ($this->getUser() === null) {
            echo 'Pas autorisé';
            header('HTTP/1.0 403 Forbidden');
            return '';
        }

        $eventManager = new EventManager();
        $events = $eventManager->selectAll('date', 'DESC');

        return $this->twig->render('Admin/Event/index.html.twig', ['events' => $events]);
    }
}
