<?php


namespace data;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterLabel
 * @package data
 * @ORM\Table(name="eter_label")
 */
class EterLabel
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $label_id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $label_name;

    /**
     * @ORM\ManyToMany(targetEntity="EterUser", mappedBy="user_label")
     */
    private ArrayCollection $users;

    public function __construct(array $data)
    {
        $this->users = new ArrayCollection();
        Utils::assign($this, $data);
    }
}