<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\View\Presentation;

/**
 * Manifest sequence.
 *
 * @see https://subugoe.pages.gwdg.de/emo/text-api/page/specs/#sequence-object
 */
class Sequence
{
    private string $id;

    private string $type = 'item';

    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
