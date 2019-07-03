<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SliderItemRepository")
 */
class SliderItem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean", options={"default"= 1})
     */
    private $shouldDisplayTitle;

    /**
     * @ORM\Column(type="boolean", options={"default"= 1})
     */
    private $shouldDisplayDescription;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Image")
     * @ORM\JoinColumn(nullable=false)
     */
    private $image;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return SliderItem
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     *
     * @return SliderItem
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShouldDisplayTitle(): ?bool
    {
        return $this->shouldDisplayTitle;
    }

    /**
     * @param bool $shouldDisplayTitle
     *
     * @return SliderItem
     */
    public function setShouldDisplayTitle(bool $shouldDisplayTitle): self
    {
        $this->shouldDisplayTitle = $shouldDisplayTitle;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShouldDisplayDescription(): ?bool
    {
        return $this->shouldDisplayDescription;
    }

    /**
     * @param bool $shouldDisplayDescription
     *
     * @return SliderItem
     */
    public function setShouldDisplayDescription(bool $shouldDisplayDescription): self
    {
        $this->shouldDisplayDescription = $shouldDisplayDescription;

        return $this;
    }

    /**
     * @return Image|null
     */
    public function getImage(): ?Image
    {
        return $this->image;
    }

    /**
     * @param Image|null $image
     *
     * @return SliderItem
     */
    public function setImage(?Image $image): self
    {
        $this->image = $image;

        return $this;
    }
}
