<?php

namespace App\Controller;
use App\Http\ResponseInterface;

interface ControllerInterface
{
    /**
     * Bind data in templates then build response
     *
     * @param string $path
     * @param array $data
     * @return Response
     */
    public function render(string $path, array $data): ResponseInterface;
}
