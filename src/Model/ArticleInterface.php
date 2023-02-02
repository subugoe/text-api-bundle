<?php

namespace Subugoe\TextApiBundle\Model;

/**
 * Document for holding generic data.
 */
interface ArticleInterface
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

    public function setAuthor(?string $author): void;

    public function setContent(string $content): void;

    public function setId(string $id): void;

    public function setImageUrl(?string $imageUrl): void;

    public function setLicense(?string $license): void;

    public function setMetadata(array $metadata): void;

    public function setOriginDate(?string $originDate): void;

    public function setOriginPlace(?string $originPlace): void;

    public function setTitle(?string $title): void;
}
