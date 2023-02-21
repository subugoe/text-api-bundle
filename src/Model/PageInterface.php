<?php

namespace Subugoe\TextApiBundle\Model;

/**
 * A page is usually part of a medium (book, letter, manuscript) that is composed of one or more pages.
 * It references back to the article and holds meta information about the "position" within the medium.
 * It references the text (Content) and the corresponding image (Image)
 * as well as possible annotations (AnnotationCollection).
 */
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
