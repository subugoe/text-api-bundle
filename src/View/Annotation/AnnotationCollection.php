<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\View\Annotation;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @see https://subugoe.pages.gwdg.de/emo/text-api/page/annotation_specs/#annotation-collection
 */
class AnnotationCollection
{
    /** @SerializedName("@context") */
    private string $context = 'http://www.w3.org/ns/anno.jsonld';

    private string $first;

    private string $id;

    private string $label;

    private string $last;

    private int $total;

    private string $type = 'AnnotationCollection';

    public function getContext(): string
    {
        return $this->context;
    }

    public function getFirst(): string
    {
        return $this->first;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getLast(): string
    {
        return $this->last;
    }

    public function getTotal(): int
    {
        return $this->total;
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

    public function setFirst(string $first): self
    {
        $this->first = $first;

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

    public function setLast(string $last): self
    {
        $this->last = $last;

        return $this;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
