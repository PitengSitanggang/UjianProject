<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table      = 'menu';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'nama_menu', 'kategori', 'deskripsi', 'harga', 'gambar', 'is_available'
    ];

    protected $useTimestamps = true;

    public function search($keyword)
    {
        return $this->like('nama_menu', $keyword)
                    ->orLike('deskripsi', $keyword)
                    ->orLike('kategori', $keyword)
                    ->findAll();
    }

    public function getAvailable()
    {
        return $this->where('is_available', 1)->findAll();
    }

    public function getByKategori($kategori)
    {
        return $this->where('kategori', $kategori)->where('is_available', 1)->findAll();
    }
}
