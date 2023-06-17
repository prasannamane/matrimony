<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class DBError extends Exception
{
    public function render(Request $request): Response
    {
        return response(["status" => 500, "message" => $this->message .'. Please contact customer service.'], 500);
    }
}
