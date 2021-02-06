<?php


namespace data;

use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterPlateform
 * @package data
 * @ORM\Entity
 * @ORM\Table(name="eter_plateform")
 */
class EterPlateform
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $plateform_id;

    /**
     * @ORM\Column(type)"string")
     * @var string
     */
    private $plateform_name;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}