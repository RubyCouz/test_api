<?php



use Doctrine\Common\Collections\ArrayCollection;
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
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $statut_state;

    /**
     * @ORM\OneToMany(targetEntity="EterContent", mappedBy="statut")
     */
    private ArrayCollection $content;

    public function __construct(array $data)
    {
        $this->content = new ArrayCollection();
        Utils::assign($this, $data);
    }
}