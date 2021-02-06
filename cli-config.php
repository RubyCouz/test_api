<?php
// cli-config.php
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Symfony\Component\Console\Helper\HelperSet;

require_once "bootstrap.php";

$helperSet = new HelperSet(array(
    'em' => new EntityManagerHelper($entityManager)
));

return $helperSet;
