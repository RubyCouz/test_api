<?php
namespace EterelzApi\Data;


use Doctrine\Common\Collections\ArrayCollection;
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
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $grade_name;

    /**
     * @ORM\OneToMany(targetEntity="EterMember", mappedBy="grade")
     */
    private $member;

    public function __construct(array $data)
    {
        $this->member = new ArrayCollection();
        Utils::assign($this, $data);
    }
}