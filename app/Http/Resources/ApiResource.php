<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public $code;
    public $status;
    public $message;
    public $resource;

    public function __construct($code, $status, $message, $resource)
    {
        $this->code = $code;
        $this->status = $status;
        $this->message = $message;
        $this->resource = $resource;
    }

    public function toArray(Request $request): array
    {
        return [
            'code' => $this->code,
            'success' => $this->status,
            'message' => $this->message,
            'resource' => $this->resource,
        ];
    }
}
