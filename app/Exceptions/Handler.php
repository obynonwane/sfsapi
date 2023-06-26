<?php

namespace App\Exceptions;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

protected function unauthenticated($request, AuthenticationException $exception)
{
    return response()->json(['error' => 'Unauthenticated'], 401);
}

/**
 * Render an exception into an HTTP response.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Throwable  $exception
 * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
 */
public function render($request, Throwable $exception)
{
    if ($exception instanceof UnauthorizedHttpException || $exception instanceof AuthenticationException) {
        return response()->json(['error' => 'Unauthenticated'], 401);
    } elseif ($exception instanceof AuthorizationException) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    return parent::render($request, $exception);
}

}
