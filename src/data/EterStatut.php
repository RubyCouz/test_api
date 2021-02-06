<?php


namespace data;

use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * @ORM\Entity
 * @ORM\Table(name="eter_statut")
 * Class EterStatut
 * @package data
 */
class EterStatut
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $statut_id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $statut_state;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}