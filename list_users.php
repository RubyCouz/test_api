<?php

require_once "bootstrap.php";

//$productRepository = $entityManager->getRepository('EterUsers');
//$products = $productRepository->findAll();

$products = $entityManager->getRepository('EterelzApi\Data\EterUsers')->find(1);

var_dump($products);