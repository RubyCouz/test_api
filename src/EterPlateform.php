<?php




use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\Column(type="string")
     * @var string
     */
    private $plateform_name;

    /**
     * @ORM\ManyToMany(targetEntity="EterGame", mappedBy="game_plateform")
     */
    private ArrayCollection $games;

    public function __construct(array $data)
    {
        $this->games = new ArrayCollection();
        Utils::assign($this, $data);
    }
}