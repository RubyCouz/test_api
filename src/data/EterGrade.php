<?php


namespace data;

use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterGrade
 * @package data
 * @ORM\Entity
 * @ORM\Table(name="eter_grade")
 */
class EterGrade
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $grade_id;

    /**
     * @var string
     * @ORM\Column(type="string)
     */
    private $grade_name;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}