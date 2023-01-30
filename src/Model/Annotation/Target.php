<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\Model\Annotation;

/**
 * @see https://subugoe.pages.gwdg.de/emo/text-api/page/annotation_specs/#target-object
 */
class Target
{
    private string $format;

    private string $id;

    private string $language;

    private Selector $selector;

    public function getFormat(): string
    {
        return $this->format;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setLanguag(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getSelector(): Selector
    {
        return $this->selector;
    }

    public function setSelector(Selector $selector): void
    {
        $this->selector = $selector;
    }
}
