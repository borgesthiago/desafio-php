<?php

namespace App\Controller;
use App\Repository\SecretariaRepository;
use App\Repository\FuncionarioRepository;
use App\Repository\RemuneracaoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(SecretariaRepository $totalSecretaria, FuncionarioRepository $totalFuncionario, RemuneracaoRepository $totalRemuneracao)
    {
     
        $totalSec = $totalSecretaria->countAll();

        $totalFunc = $totalFuncionario->countAll();

        $totalRem = $totalRemuneracao->countSal();
       
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'totalSec' => $totalSec,
            'totalFunc' => $totalFunc,
            'totalRem'  => $totalRem
        ]);
    }
}
