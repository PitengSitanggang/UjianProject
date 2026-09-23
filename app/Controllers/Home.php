<?php

namespace App\Controllers;

use App\Models\MenuModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        $this->menuModel = new MenuModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('search');
        
        if ($keyword) {
            $menus = $this->menuModel->search($keyword);
        } else {
            $menus = $this->menuModel->getAvailable();
        }

        // Group by kategori
        $grouped = [];
        foreach ($menus as $menu) {
            $grouped[$menu['kategori']][] = $menu;
        }

        $data = [
            'title'   => 'Warung Sitanggang - Soto Banjar Khas Kalimantan',
            'menus'   => $menus,
            'grouped' => $grouped,
            'keyword' => $keyword,
            'totalMenu' => count($this->menuModel->getAvailable()),
        ];

        return view('home/index', $data);
    }

    public function detail($id)
    {
        $menu = $this->menuModel->find($id);
        if (!$menu) {
            return redirect()->to('/')->with('error', 'Menu tidak ditemukan.');
        }

        // Related menu (same kategori)
        $related = $this->menuModel
                        ->where('kategori', $menu['kategori'])
                        ->where('id !=', $id)
                        ->where('is_available', 1)
                        ->findAll(3);

        $data = [
            'title'   => $menu['nama_menu'] . ' - Warung Sitanggang',
            'menu'    => $menu,
            'related' => $related,
        ];

        return view('home/detail', $data);
    }
}
