<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PageRepository")
 */
class Page
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
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Image")
     */
    private $featuredImage;

    /**
     * @ORM\Column(type="string", length=255, options={"default"="default"})
     */
    private $template;

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
     * @return Page
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     *
     * @return Page
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return Page
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Image|null
     */
    public function getFeaturedImage(): ?Image
    {
        return $this->featuredImage;
    }

    /**
     * @param Image|null $featuredImage
     *
     * @return Page
     */
    public function setFeaturedImage(?Image $featuredImage): self
    {
        $this->featuredImage = $featuredImage;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTemplate(): ?string
    {
        return $this->template;
    }

    /**
     * @param string $template
     *
     * @return Page
     */
    public function setTemplate(string $template): self
    {
        $this->template = $template;

        return $this;
    }
}
