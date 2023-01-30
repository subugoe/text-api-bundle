<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\Model\Annotation;

/**
 * @see https://subugoe.pages.gwdg.de/emo/text-api/page/annotation_specs/#partof-object
 */
class PartOf
{
    private string $id;

    private string $label;

    private int $total;

    public function getId(): string
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getTotal(): int
    {
        return $this->total;
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

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }
}
