<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BarangR extends JsonResource
{
    public $status;
    public $message;

    public function __construct($status,$message,$resource)
    {
        parent::__construct($resource);
        $this->status=$status;
        $this->message=$message;
    }

    public function toArray($request)
    {
        return [
            'nama_barang' => $this->nama_barang,
            'gambar_barang' => $this->gambar_barang,
            'qty'    => $this->qty,
            'harga' => $this->harga,
            'barcode' => $this->barcode
        ];
    }
}
