<?php

namespace App\Controller;

use App\Entity\Region;
use App\Repository\DonneeRepository;
use App\Repository\MonthRepository;
use App\Repository\PrecipitationRepository;
use App\Repository\RegionRepository;
use App\Repository\SolRepository;
use App\Repository\TemperatureRepository;
use App\Repository\YearRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FooController extends AbstractController
{
    /**
     * @Route("/espace-vulgarisateur", name="vulgarisateur")
     */
    public function index(): Response
    {
        
        return $this->render('foo/index.html.twig', [
            'controller_name' => 'FooController',
        ]);
    }
    /**
     * @Route("/espace-vulgarisateur/liste", name="vulgarisateur-liste")
     */
    public function listTechnicians(){

    }

    /**
     * @Route("/espace-vulgarisateur/donnees-brutes/{region}/{annee}", name="donnees-brutes")
     */
    public function aboutDonnee(DonneeRepository $data, PrecipitationRepository $precipitation, TemperatureRepository $temperature, SolRepository $sol, RegionRepository $region, MonthRepository $month, YearRepository $year, Request $request): Response
    {
        $regions = $region->findAll();
        $mois =  $month->findAll();
        $annees = $year->findAll();

        $region = $request->query->get('region');
        $annee = $request->query->get('annee');

        $donnee = $data->findOneBy(['region' => $region, 'annee' => intval($annee)]);

        return $this->render('foo/detailDonnee.html.twig', [
            'regions' => $regions,
            'mois' => $mois,
            'annees' => $annees,
            'donnee' => $donnee
        ]);
    }
}
