<?php
namespace EterelzApi\Data;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterStreamSupport
 * @package data
 * @ORM\Entity
 * @ORM\Table(name="eter_stream_support")
 */
class EterStreamSupport
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
    private $support_name;

//    /**
//     * @ORM\ManyToMany(targetEntity="EterUSers", mappedBy="user_stream")
//     */
//    private ArrayCollection $users;

    public function __construct(array $data)
    {
//        $this->users = new ArrayCollection();
        Utils::assign($this, $data);
    }
}