<?php

// src/Controller/ImcController.php

namespace App\Controller;

use App\Entity\Imc;
use App\Form\ImcType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImcController extends AbstractController
{

    #[Route(path: '/imctest', name: 'imccontroller')]
    public function calculateImc(Request $request): Response
    {
        $imc = new Imc();
        $form = $this->createForm(ImcType::class, $imc);

        $form->handleRequest($request);
        $imcValue = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $weight = $imc->getWeight();
            $height = $imc->getHeight();

            $imcValue = $weight / (($height / 100) ** 2);
        }

        return $this->render('imcvue/result.html.twig', [
            'form' => $form->createView(),
            'imcvue' => $imcValue,
        ]);
    }

}
