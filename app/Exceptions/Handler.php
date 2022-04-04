<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    public function render($request, Exception $exception)
    {
        if ($exception instanceof LoginException) {
            return $this->errorResponse('No Tienes Permisos', 404, $exception->getMessage());
        }
        return parent::render($request, $exception);
    }

    public function errorResponse($title, $code, $description = '')
    {
        $error = [
            'errors' => [
                [
                    'code' => $code,
                    'title' => $title,
                    'description' => $description,
                ],
            ],
        ];

        return response()->json($error, $code)
        ->header('Content-Type', 'application/vnd.api+json');
    }
}
