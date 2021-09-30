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
    public function vulgarisateur(): Response
    {
        
        return $this->render('foo/index.html.twig');
    }

    /**
     * @Route("/espace-vulgarisateur/donnees-traitees/{region}/{annee}", name="donnees-brutes")
     */
    public function aboutDonnee(DonneeRepository $data, PrecipitationRepository $precipitations, TemperatureRepository $temperatures, SolRepository $sols, RegionRepository $region, MonthRepository $month, YearRepository $year, Request $request): Response
    {
        $regions = $region->findAll();
        $mois =  $month->findAll();
        $annees = $year->findAll();

        $region = $request->query->get('region');
        $annee = $request->query->get('annee');

        $donnee = $data->findOneBy(['region' => $region, 'annee' => intval($annee)]);

        $temperature = $temperatures->findOneBy(['donnee_id' => $donnee->getId()]);
        $precipitation = $precipitations->findOneBy(['donnee_id' => $donnee->getId()]);
        $sol = $sols->findOneBy(['donnee_id' => $donnee->getId()]);

        return $this->render('foo/detailDonnee.html.twig', [
            'regions' => $regions,
            'mois' => $mois,
            'annees' => $annees,
            'donnee' => $donnee,
            'temperature' => $temperature,
            'precipitation' => $precipitation,
            'sol'=> $sol 
        ]);
    }

    /**
     * @Route("/espace-vulgarisateur/liste", name="vulgarisateur-liste")
     */
    public function listTechnicians(){

    }
    /**
     * @Route("/espace-vulgarisateur/apropos/{id}", name="foo-about")
     */
    public function fooAbout(): Response
    {
        
        return $this->render('$fooAbout.html.twig', []);
    }
}
