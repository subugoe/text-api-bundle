<?php

namespace Subugoe\TextApiBundle\Model;

interface PageInterface
{
    public function getArticleId(): ?string;
    
    public function getId(): ?string;
}
