<?php

class Todo {
    public $id;
    public $judul;
    public $deskripsi;
    public $status;
    public $created_at;

    public function __construct($id, $judul, $deskripsi, $status, $created_at) {
        $this->id = $id;
        $this->judul = $judul;
        $this->deskripsi = $deskripsi;
        $this->status = $status;
        $this->created_at = $created_at;
    }
}
