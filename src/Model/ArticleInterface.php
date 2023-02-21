<?php

namespace Subugoe\TextApiBundle\Model;

/**
 * An article usually a container object that represents a single medium (book, letter, manuscript).
 * It references pages (PageInterface) that it is composed of
 * and provides usually meta information about the medium itself.
 */
interface ArticleInterface
{
    public function getId(): ?string;

    public function getPageIds(): array;

    public function getTitle(): ?string;
}
