<?php

namespace Subugoe\TextApiBundle\Model;

interface PageInterface
{
    public function getArticleId(): ?string;

    public function getArticleTitle(): ?string;

    public function getId(): ?string;

    public function getImageUrl(): ?string;

    public function getLanguages(): ?array;

    public function getTitle(): ?string;

    public function getImageLicense(): ?string;

    public function getImageLicenseUrl(): ?string;

    public function getEnumeration(): ?string;

    public function getContentTypes(): ?array;

    public function getContentByType(string $type): ?string;

    public function getAnnotationCollectionLabel(): ?string;

    public function getPageNumber(): ?int;
}
