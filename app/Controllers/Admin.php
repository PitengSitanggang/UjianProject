<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Admin extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        $this->menuModel = new MenuModel();
        // Auth check
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/login')->send();
        }
    }

    public function index()
    {
        $keyword = $this->request->getGet('search');
        
        if ($keyword) {
            $menus = $this->menuModel->search($keyword);
        } else {
            $menus = $this->menuModel->orderBy('created_at', 'DESC')->findAll();
        }

        $data = [
            'title'    => 'Dashboard Admin - Warung Sitanggang',
            'menus'    => $menus,
            'keyword'  => $keyword,
            'total'    => $this->menuModel->countAll(),
            'available'=> $this->menuModel->where('is_available', 1)->countAllResults(),
        ];

        return view('admin/index', $data);
    }

    public function create()
    {
        return view('admin/create', ['title' => 'Tambah Menu - Warung Sitanggang']);
    }

    public function store()
    {
        $rules = [
            'nama_menu'    => 'required|min_length[3]|max_length[200]',
            'kategori'     => 'required|in_list[Soto,Lauk,Minuman,Dessert,Paket]',
            'deskripsi'    => 'required|min_length[10]',
            'harga'        => 'required|numeric|greater_than[0]',
            'gambar'       => 'if_exist|is_image[gambar]|max_size[gambar,2048]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        $messages = [
            'nama_menu' => ['required' => 'Nama menu wajib diisi.', 'min_length' => 'Nama menu minimal 3 karakter.'],
            'kategori'  => ['required' => 'Kategori wajib dipilih.', 'in_list' => 'Kategori tidak valid.'],
            'deskripsi' => ['required' => 'Deskripsi wajib diisi.', 'min_length' => 'Deskripsi minimal 10 karakter.'],
            'harga'     => ['required' => 'Harga wajib diisi.', 'numeric' => 'Harga harus berupa angka.', 'greater_than' => 'Harga harus lebih dari 0.'],
            'gambar'    => ['is_image' => 'File harus berupa gambar.', 'max_size' => 'Ukuran gambar maksimal 2MB.'],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $gambarName = null;
        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $gambarName = $gambar->getRandomName();
            $gambar->move(FCPATH . 'uploads/menu', $gambarName);
        }

        $this->menuModel->save([
            'nama_menu'    => $this->request->getPost('nama_menu'),
            'kategori'     => $this->request->getPost('kategori'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'harga'        => $this->request->getPost('harga'),
            'gambar'       => $gambarName,
            'is_available' => $this->request->getPost('is_available') ? 1 : 0,
        ]);

        return redirect()->to('/admin')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $menu = $this->menuModel->find($id);
        if (!$menu) {
            return redirect()->to('/admin')->with('error', 'Menu tidak ditemukan.');
        }
        return view('admin/edit', ['title' => 'Edit Menu - Warung Sitanggang', 'menu' => $menu]);
    }

    public function update($id)
    {
        $menu = $this->menuModel->find($id);
        if (!$menu) {
            return redirect()->to('/admin')->with('error', 'Menu tidak ditemukan.');
        }

        $rules = [
            'nama_menu'    => 'required|min_length[3]|max_length[200]',
            'kategori'     => 'required|in_list[Soto,Lauk,Minuman,Dessert,Paket]',
            'deskripsi'    => 'required|min_length[10]',
            'harga'        => 'required|numeric|greater_than[0]',
            'gambar'       => 'if_exist|is_image[gambar]|max_size[gambar,2048]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        $messages = [
            'nama_menu' => ['required' => 'Nama menu wajib diisi.'],
            'kategori'  => ['required' => 'Kategori wajib dipilih.'],
            'deskripsi' => ['required' => 'Deskripsi wajib diisi.'],
            'harga'     => ['required' => 'Harga wajib diisi.', 'numeric' => 'Harga harus berupa angka.'],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $gambarName = $menu['gambar'];
        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            // Delete old image
            if ($gambarName && file_exists(FCPATH . 'uploads/menu/' . $gambarName)) {
                unlink(FCPATH . 'uploads/menu/' . $gambarName);
            }
            $gambarName = $gambar->getRandomName();
            $gambar->move(FCPATH . 'uploads/menu', $gambarName);
        }

        $this->menuModel->update($id, [
            'nama_menu'    => $this->request->getPost('nama_menu'),
            'kategori'     => $this->request->getPost('kategori'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'harga'        => $this->request->getPost('harga'),
            'gambar'       => $gambarName,
            'is_available' => $this->request->getPost('is_available') ? 1 : 0,
        ]);

        return redirect()->to('/admin')->with('success', 'Menu berhasil diperbarui!');
    }

    public function delete($id)
    {
        $menu = $this->menuModel->find($id);
        if (!$menu) {
            return redirect()->to('/admin')->with('error', 'Menu tidak ditemukan.');
        }

        // Delete image file
        if ($menu['gambar'] && file_exists(FCPATH . 'uploads/menu/' . $menu['gambar'])) {
            unlink(FCPATH . 'uploads/menu/' . $menu['gambar']);
        }

        $this->menuModel->delete($id);
        return redirect()->to('/admin')->with('success', 'Menu berhasil dihapus!');
    }
}
