<?php

require_once "bootstrap.php";

$productRepository = $entityManager->getRepository('EterUser');
$products = $productRepository->findAll();

var_dump($products);