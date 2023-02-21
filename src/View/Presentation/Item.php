<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\View\Presentation;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @see https://subugoe.pages.gwdg.de/emo/text-api/page/specs/#item-json
 */
class Item
{
    /** @SerializedName("@context") */
    private string $context = 'https://gitlab.gwdg.de/subugoe/emo/text-api/-/raw/main/jsonld/item.jsonld';

    private string $annotationCollection;

    private array $content;

    private ?Image $image = null;

    private array $lang;

    private ?string $n = null;

    private string $textapi = '3.1.1';

    private Title $title;

    private string $type;

    public function getContext(): string
    {
        return $this->context;
    }

    public function getAnnotationCollection(): string
    {
        return $this->annotationCollection;
    }

    public function getContent(): array
    {
        return $this->content;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function getLang(): array
    {
        return $this->lang;
    }

    public function getN(): ?string
    {
        return $this->n;
    }

    public function getTextapi(): string
    {
        return $this->textapi;
    }

    public function getTitle(): Title
    {
        return $this->title;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setContext(string $context): self
    {
        $this->context = $context;

        return $this;
    }

    public function setAnnotationCollection(string $annotationCollection): self
    {
        $this->annotationCollection = $annotationCollection;

        return $this;
    }

    public function setContent(array $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function setImage(Image $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function setLang(array $lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    public function setN(?string $n): self
    {
        $this->n = $n;

        return $this;
    }

    public function setTextapi(string $textapi): self
    {
        $this->textapi = $textapi;

        return $this;
    }

    public function setTitle(Title $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
