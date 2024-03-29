<?php

namespace App\Exceptions;

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

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param Throwable $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws Throwable
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof \Illuminate\Validation\ValidationException) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'status' => 'error',
                'errors' => $e->errors(),
            ], 422);
        }
        if($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException){
            return response()->json([
                'message' => 'The given data was invalid.',
                'status' => 'error',
                'errors' => 'Product not Found!',
            ], 404);
        }
        return parent::render($request, $e);
    }
}
