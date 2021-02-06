<?php


namespace data;

use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * @ORM\Entity
 * @ORM\Table(name="eter_categorie")
 * Class EterCategorie
 * @package data
 */
class EterCategorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $cat_id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $cat_name;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}