<?php

namespace App\Controller;

use App\Entity\PieceJointe;
use App\Repository\CultureRepository;
use App\Repository\PieceJointeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CultureController extends AbstractController
{
    /**
     * @Route("/culture", name="list-cultures")
     */
    public function show(Request $request, CultureRepository $culture, PieceJointeRepository $piece): Response
    {
        $images = array();
        $i = 0;
        $cultures = $culture->findAll();
        while($i<count($cultures)){
            $images[$i] = $piece->findOneBy(['culture_id' => $i+1]);
        }

        return $this->render('culture/cultures.html.twig', [
            'cultures' => $cultures,
            'images' => $images 
        ]);
    }
}
