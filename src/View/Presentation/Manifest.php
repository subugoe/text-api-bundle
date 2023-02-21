<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\View\Presentation;

/**
 * @see https://subugoe.pages.gwdg.de/emo/text-api/page/specs/#manifest-json
 */
class Manifest
{
    private string $annotationCollection;

    private string $id;

    private string $label;

    private array $license;

    private array $metadata;

    private array $sequence;

    private array $support;

    private string $textapi = '3.1.1';

    public function getAnnotationCollection(): string
    {
        return $this->annotationCollection;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getLicense(): array
    {
        return $this->license;
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function getSequence(): array
    {
        return $this->sequence;
    }

    public function getSupport(): array
    {
        return $this->support;
    }

    public function getTextapi(): string
    {
        return $this->textapi;
    }

    public function setAnnotationCollection(string $annotationCollection): self
    {
        $this->annotationCollection = $annotationCollection;

        return $this;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function setLicense(array $license): self
    {
        $this->license = $license;

        return $this;
    }

    public function setMetadata(array $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function setSequence(array $sequence): self
    {
        $this->sequence = $sequence;

        return $this;
    }

    public function setSupport(array $support): self
    {
        $this->support = $support;

        return $this;
    }

    public function setTextapi(string $textapi): self
    {
        $this->textapi = $textapi;

        return $this;
    }
}
