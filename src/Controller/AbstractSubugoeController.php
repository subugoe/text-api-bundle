<?php

namespace Subugoe\TextApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AbstractSubugoeController extends AbstractController
{
    protected function customJson(mixed $data): Response
    {
        return $this->json(
            $data,
            200,
            ['Content-Type' => 'application/json'],
            ['json_encode_options' => JSON_UNESCAPED_SLASHES]
        );
    }
}
