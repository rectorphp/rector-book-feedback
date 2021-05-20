<?php

declare(strict_types=1);

use Symfony\Component\HttpFoundation\Request;

final class SomeController
{
    public function action(Request $request, Response $response)
    {
        $request->oldMethod();
        $response->oldMethod();
    }
}
