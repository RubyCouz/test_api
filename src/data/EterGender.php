<?php


namespace data;

use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterGender
 * @package data
 * @ORM\Entity
 * @ORM\Table(name="eter_gender")
 */
class EterGender
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $gender_id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $gender_name;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}