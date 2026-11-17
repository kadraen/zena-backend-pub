<?php

namespace App\traits;

trait ResponseHandler {
    
    public function sendResponse( mixed $data, string $message = "", $code = 200 ) {

        $response = [
            "success" => true,
            "data" => $data,
            "message" => $message,
        ];

        return response()->json( $response, $code );
    }

    public function sendError() {

    }
}
