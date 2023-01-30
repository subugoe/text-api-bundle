<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\Model\Annotation;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @see https://subugoe.pages.gwdg.de/emo/text-api/page/annotation_specs/#annotation-page
 */
class AnnotationPage
{
    public ?string $next = null;

    /** @SerializedName("@context") */
    private string $context = 'http://www.w3.org/ns/anno.jsonld';

    private string $id;

    private array $items;

    private PartOf $partOf;

    private ?string $prev = null;

    private int $startIndex;

    private string $type = 'AnnotationPage';

    public function getContext(): string
    {
        return $this->context;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getNext(): ?string
    {
        return $this->next;
    }

    public function getPartOf(): PartOf
    {
        return $this->partOf;
    }

    public function getPrev(): ?string
    {
        return $this->prev;
    }

    public function getStartIndex(): int
    {
        return $this->startIndex;
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

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setItems(array $items): self
    {
        $this->items = $items;

        return $this;
    }

    public function setNext(?string $next): self
    {
        $this->next = $next;

        return $this;
    }

    public function setPartOf(PartOf $partOf): self
    {
        $this->partOf = $partOf;

        return $this;
    }

    public function setPrev(?string $prev): self
    {
        $this->prev = $prev;

        return $this;
    }

    public function setStartIndex(int $startIndex): self
    {
        $this->startIndex = $startIndex;

        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
