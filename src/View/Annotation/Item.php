<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\View\Annotation;

/**
 * @see https://subugoe.pages.gwdg.de/emo/text-api/page/annotation_specs/#annotation-item-object
 */
class Item
{
    private ?Body $body = null;

    private string $id;

    private ?Target $target = null;

    private string $type = 'Annotation';

    public function getBody(): Body
    {
        return $this->body;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTarget(): Target
    {
        return $this->target;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setBody(Body $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setTarget(Target $target): self
    {
        $this->target = $target;

        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
