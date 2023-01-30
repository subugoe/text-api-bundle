<?php

namespace Subugoe\TextApiBundle\Model\Annotation;

/**
 * @see https://subugoe.pages.gwdg.de/emo/text-api/page/annotation_specs/#target-object
 */
class Selector
{
    private string $type;
    private string $value;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
