<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\View\Presentation;

/**
 * Manifest metadata.
 *
 * @see https://subugoe.pages.gwdg.de/emo/text-api/page/specs/#metadata-object
 */
class Metadata
{
    private string $key;

    private string $value;

    public function getKey(): string
    {
        return $this->key;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function setValue($value): self
    {
        $this->value = $value;

        return $this;
    }
}
