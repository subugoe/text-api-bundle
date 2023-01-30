<?php

namespace Subugoe\TextApiBundle\Model;

/**
 * Document for holding generic data.
 */
interface DocumentInterface
{
    public function getAuthor(): ?string;

    public function getContent(): string;

    public function getId(): ?string;

    public function getImageUrl(): ?string;

    public function getLicense(): ?string;

    public function getMetadata(): array;

    public function getOriginDate(): ?string;

    public function getOriginPlace(): ?string;

    public function getTitle(): ?string;

    public function setAuthor(?string $author): DocumentInterface;

    public function setContent(string $content): DocumentInterface;

    public function setId(string $id): DocumentInterface;

    public function setImageUrl(?string $imageUrl): DocumentInterface;

    public function setLicense(?string $license): DocumentInterface;

    public function setMetadata(array $metadata): DocumentInterface;

    public function setOriginDate(?string $originDate): DocumentInterface;

    public function setOriginPlace(?string $originPlace): DocumentInterface;

    public function setTitle(?string $title): DocumentInterface;
}
