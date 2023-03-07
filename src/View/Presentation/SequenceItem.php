<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\View\Presentation;

/**
 * Manifest sequence.
 *
 * @see https://subugoe.pages.gwdg.de/emo/text-api/page/specs/#sequence-object
 */
class SequenceItem
{
    private string $id;

    private string $type = 'item';
    
    private string $label;

    public function __construct(string $id)
    {
      $this->id = $id;
    }

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
    
    public function getLabel(): string
    {
        return $this->label;
    }
    
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }
}
