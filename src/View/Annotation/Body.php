<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\View\Annotation;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @see https://subugoe.pages.gwdg.de/emo/text-api/page/annotation_specs/#body-object
 */
class Body
{
    private string $format = 'text/plain';

    private string $type = 'TextualBody';

    private ?string $value = null;

    #[SerializedName("x-content-type")]
    private string $xContentType;

    public function getFormat(): string
    {
        return $this->format;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getXContentType(): string
    {
        return $this->xContentType;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function setXContentType(string $xContentType): self
    {
        $this->xContentType = $xContentType;

        return $this;
    }
}
