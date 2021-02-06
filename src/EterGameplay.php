<?php


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterGameplay
 * @package data
 * @ORM\Entity
 * @ORM\Table(name="eter_gameplay")
 */
class EterGameplay
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $gameplay_id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $gameplay_type;

    /**
     * @ORM\ManyToMany(targetEntity="EterClan", mappedBy="gameplay")
     */
    private ArrayCollection $clan;

    public function __construct(array $data)
    {
        $this->clan = new ArrayCollection();
        Utils::assign($this, $data);
    }
}