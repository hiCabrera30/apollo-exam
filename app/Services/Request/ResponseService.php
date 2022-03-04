<?php

namespace App\Services\Request;

use App\Exceptions\PreciseException;
use Exception;
use Log;

class ResponseService {

    /**
     * Resolves the response for successful API calls
     *
     * @author Ian C. Cabrera
     * @param  string $message
     * @param  array $data = []
     * @param  int $statusCode
     * @return \Illuminate\Http\Response
     */
    public function resolve(string $message, array $data = [], int $statusCode = 200) {
        $response = $this->formatResponse($this->resolveMessage($message), $data, $statusCode);

        return response()->json($response, $statusCode);
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
    public function reject(Exception $exception, $errorMessage = "", ?array $data = null, int $statusCode = 404) {
        if (get_class($exception) === PreciseException::class || strtolower(config('app.env')) != 'production') {
            $errorMessage = $exception->getMessage();
        } else {
            Log::error($exception);
        }

        $data     = $data ? $data + ['exception' => $exception->getMessage()] : ['exception' => $exception->getMessage()];
        $response = $this->formatResponse($this->resolveMessage($errorMessage, false), $data, $statusCode);

        return response()->json($response, $statusCode);
    }

    /**
     * Resolves the message to be returned in the response
     *
     * @author Ian C. Cabrera
     * @param  mixed $message
     * @param  bool $isSuccess
     * @return array
     */
    private function resolveMessage($message, bool $isSuccess = true) {
        return gettype($message) === "string"
        ? [
            'title'   => $isSuccess ? "Successful" : "Something went wrong",
            'message' => __($message),
        ]
        : $message;
    }

    /**
     * Formats the response
     *
     * @author Ian C. Cabrera
     * @param  mixed $message
     * @param  array $data
     * @param  int $statusCode
     * @return array
     */
    private function formatResponse($message, $data, int $statusCode) {
        return [
            'message'    => $message,
            'result'     => $data,
            'statusCode' => $statusCode,
        ];
    }

}