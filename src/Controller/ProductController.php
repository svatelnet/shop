<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProductController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('base.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }

    /**
     * @Route("/test", name="test", methods={"GET"})
     */
    public function index1(ProductRepository $productRepository): Response
    {
        return $this->render('base.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="product_show", methods={"GET"})
     */
    public function show(Product $product): Response
    {
        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }

//    /**
//     * @Route("/test", name="product_index", methods={"GET"})
//     */
//    public function index1(ProductRepository $productRepository): Response
//    {
//        return $this->render('base.html.twig', [
//            'products' => $productRepository->findAll(),
//        ]);
//    }

}
