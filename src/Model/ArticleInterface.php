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

    public function getPageIds(): array;

    public function getTitle(): ?string;
}
