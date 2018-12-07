<?php

namespace App\Controller;
use App\Repository\SecretariaRepository;
use App\Repository\FuncionarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(SecretariaRepository $totalSecretaria, FuncionarioRepository $totalFuncionario)
    {
     
        $totalSec = $totalSecretaria->countAll();

        $totalFunc = $totalFuncionario->countAll();
       
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'totalSec' => $totalSec,
            'totalFunc' => $totalFunc
        ]);
    }
}
