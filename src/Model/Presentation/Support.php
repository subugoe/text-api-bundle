<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\Model\Presentation;

/**
 * Manifest support.
 *
 * @see https://subugoe.pages.gwdg.de/emo/text-api/page/specs/#support-object
 */
class Support
{
    private string $mime = 'text/css';

    private string $type = 'css';

    private string $url;

    public function getMime(): string
    {
        return $this->mime;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setMime(string $mime): self
    {
        $this->mime = $mime;

        return $this;
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
