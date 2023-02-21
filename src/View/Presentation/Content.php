<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\View\Presentation;

/**
 * Item Content.
 *
 * @see https://subugoe.pages.gwdg.de/emo/text-api/page/specs/#content-object
 */
class Content
{
    private string $type;

    private string $url;

    public function getType(): string
    {
        return $this->type;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
