<?php

namespace App\Traits\Requests;

use App\Services\Request\ResponseService;
use Exception;

trait ResponseTrait {

    /**
     * Resolves the response for successful API calls
     *
     * @author Ian C. Cabrera
     * @param  string $message
     * @param  array $data = []
     * @param  int $statusCode
     * @return \Illuminate\Http\Response
     */
    protected function resolve(string $message, array $data = [], int $statusCode = 200) {
        return (new ResponseService)->resolve($message, $data, $statusCode);
    }

    /**
     * Resolves the response for failed API calls
     *
     * @author Ian C. Cabrera
     * @param  \Exception $exception
     * @param  string $errorMessage
     * @param  array|null $data
     * @param  int $statusCode
     * @return \Illuminate\Http\Response
     */
    protected function reject(Exception $exception, string $errorMessage, ?array $data = null, $statusCode = 403) {
        return (new ResponseService)->reject($exception, $errorMessage, $data, $statusCode ?: 403);
    }

}