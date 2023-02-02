<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\Model;

/**
 * Document for holding generic data.
 */
class Article implements ArticleInterface
{
    private ?string $author = null;

    private string $content;

    private string $id;

    private ?string $imageUrl = null;

    private ?string $license = null;

    private array $metadata;

    private ?string $originDate = null;

    private ?string $originPlace = null;

    private ?string $title = null;

    private ?string $imageLicense = null;

    private ?string $imageLicenseLink = null;


    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function getLicense(): ?string
    {
        return $this->license;
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function getOriginDate(): ?string
    {
        return $this->originDate;
    }

    public function getOriginPlace(): ?string
    {
        return $this->originPlace;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getImageLicense(): ?string
    {
        return $this->imageLicense;
    }

    public function getImageLicenseLink(): ?string
    {
        return $this->imageLicenseLink;
    }

    public function setAuthor(?string $author): ArticleInterface
    {
        $this->author = $author;

        return $this;
    }

    public function setContent(string $content): ArticleInterface
    {
        $this->content = $content;

        return $this;
    }

    public function setId(string $id): ArticleInterface
    {
        $this->id = $id;

        return $this;
    }

    public function setImageUrl(?string $imageUrl): ArticleInterface
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function setLicense(?string $license): ArticleInterface
    {
        $this->license = $license;

        return $this;
    }

    public function setMetadata(array $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function setOriginDate(?string $originDate): ArticleInterface
    {
        $this->originDate = $originDate;

        return $this;
    }

    public function setOriginPlace(?string $originPlace): ArticleInterface
    {
        $this->originPlace = $originPlace;

        return $this;
    }

    public function setTitle(?string $title): ArticleInterface
    {
        $this->title = $title;

        return $this;
    }

    public function setImageLicense(?string $imageLicense): ArticleInterface
    {
        $this->imageLicense = $imageLicense;

        return $this;
    }

    public function setImageLicenseLink(?string $imageLicenseLink): ArticleInterface
    {
        $this->imageLicenseLink = $imageLicenseLink;

        return $this;
    }
}
