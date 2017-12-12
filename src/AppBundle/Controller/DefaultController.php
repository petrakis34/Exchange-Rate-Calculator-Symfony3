<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\BaseCurrency;
use AppBundle\Entity\TargetCurrency;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    //Create Base Currency
        public function createBaseCurrencyAction()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: createAction(EntityManagerInterface $em)
        $em = $this->getDoctrine()->getManager();

        $baseCurrency = new BaseCurrency();
        $baseCurrency->setBaseName('EURO');
        $baseCurrency->setBasePrice(1);


        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($baseCurrency);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new baseCurrency with id '.$baseCurrency->getBaseId());
    }



    //Create Target Currency
     public function createTargetCurrencyAction()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: createAction(EntityManagerInterface $em)
        $em = $this->getDoctrine()->getManager();

        $targetCurrency = new TargetCurrency();
        $targetCurrency->setTargetName('USD');
        $targetCurrency->setTargetPrice(1.2079);

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($targetCurrency);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new targetCurrency with id '.$targetCurrency->getTargetId());
    }




    // if you have multiple entity managers, use the registry to fetch them
    // public function editAction()
    // {
    //     $doctrine = $this->getDoctrine();
    //     $em = $doctrine->getManager();
    //     $em2 = $doctrine->getManager('other_connection');
    // }



    // public function showAction($productId)
    //     {
    //     $product = $this->getDoctrine()
    //         ->getRepository(Product::class)
    //         ->find($productId);

    //     if (!$product) {
    //         throw $this->createNotFoundException(
    //             'No product found for id '.$productId
    //         );
    //     }

    //     //return new Response($product->getName());
    //     // ... do something, like pass the $product object into a template

    //     return $this->render('default/show.html.twig', array ('product' => $product));
    // }



    // public function updateAction($productId)
    // {
    // $em = $this->getDoctrine()->getManager();
    // $product = $em->getRepository(Product::class)->find($productId);

    // if (!$product) {
    //     throw $this->createNotFoundException(
    //         'No product found for id '.$productId
    //     );
    // }

    // $product->setName('NEWKEYBOARD');
    // $em->flush();

    // return $this->redirectToRoute('homepage');
    // }
}
