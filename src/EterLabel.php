<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity @Table(name="eter_label")
 */
class EterLabel
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $label_name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\EterUser", mappedBy="userLabels")
     */
    private $eterUsers;

    public function __construct()
    {
        $this->eterUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabelName(): ?string
    {
        return $this->label_name;
    }

    public function setLabelName(string $label_name): self
    {
        $this->label_name = $label_name;

        return $this;
    }

    public function __toString()
    {
       return $this->label_name;
    }

    /**
     * @return Collection|EterUser[]
     */
    public function getEterUsers(): Collection
    {
        return $this->eterUsers;
    }

    public function addEterUser(EterUser $eterUser): self
    {
        if (!$this->eterUsers->contains($eterUser)) {
            $this->eterUsers[] = $eterUser;
            $eterUser->addUserLabel($this);
        }

        return $this;
    }

    public function removeEterUser(EterUser $eterUser): self
    {
        if ($this->eterUsers->contains($eterUser)) {
            $this->eterUsers->removeElement($eterUser);
            $eterUser->removeUserLabel($this);
        }

        return $this;
    }
}
