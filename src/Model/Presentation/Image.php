<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\Model\Presentation;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Item image.
 *
 * @see https://subugoe.pages.gwdg.de/emo/text-api/page/specs/#image-object
 */
class Image
{
    /** @SerializedName("@context") */
    private string $context = 'https://gitlab.gwdg.de/subugoe/emo/text-api/-/raw/main/jsonld/item.jsonld';

    private string $id;

    private string $manifest;

    private License $license;

    public function getContext(): string
    {
        return $this->context;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getManifest(): string
    {
        return $this->manifest;
    }

    public function getlicense(): License
    {
        return $this->license;
    }

    public function setContext(string $context): self
    {
        $this->context = $context;

        return $this;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setManifest(string $manifest): self
    {
        $this->manifest = $manifest;

        return $this;
    }

    public function setlicense(License $license): self
    {
        $this->license = $license;

        return $this;
    }
}
