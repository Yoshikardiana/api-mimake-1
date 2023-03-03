<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiR extends JsonResource
{
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
            'id_barang' => $this->id_barang,
            'tanggal_jual' => $this->tanggal_jual,
            'pembeli'    => $this->pembeli,
            'nama_barang' => $this->nama_barang,
            'qty' => $this->qty,
            'harga_awal'    => $this->harga_awal,
            'harga_jual' => $this->harga_jual,
            'laba' => $this->laba
        ];
    }
}
