<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity @Table(name="eter_streamer")
 */
class EterStreamer
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $stream_url;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $stream_support;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterUser", inversedBy="userStreams")
     */
    private $eterUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStreamUrl(): ?string
    {
        return $this->stream_url;
    }

    public function setStreamUrl(string $stream_url): self
    {
        $this->stream_url = $stream_url;

        return $this;
    }

    public function getStreamSupport(): ?string
    {
        return $this->stream_support;
    }

    public function setStreamSupport(string $stream_support): self
    {
        $this->stream_support = $stream_support;

        return $this;
    }

    public function getEterUser(): ?EterUser
    {
        return $this->eterUser;
    }

    public function setEterUser(?EterUser $eterUser): self
    {
        $this->eterUser = $eterUser;

        return $this;
    }

    public function __toString()
    {
        return $this->stream_url;
    }
}
