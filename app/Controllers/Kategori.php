<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data['user'] = auth()->user();
        $data['roles'] = auth()->user()->getGroups();
        $data['title'] = 'List Kategori';

        $data['kategori'] = $this->kategoriModel->findAll();

        return view('pages/admin/kategori/list', $data);
    }
    public function new()
    {
        $data['user'] = auth()->user();
        $data['roles'] = auth()->user()->getGroups();
        $data['title'] = 'Tambah Kategori';

        return view('pages/admin/kategori/create-kategori', $data);
    }

    public function create()
    {
        helper('url');

        $rules = [
            'name' => 'required|min_length[3]|max_length[255]|is_unique[kategori.name]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        // Get the input data
        $data = [
            'name' => $this->request->getPost('name'),
            'slug' => url_title($this->request->getPost('name'), '-', true),
        ];

        // Save the category
        if ($this->kategoriModel->insert($data)) {
            return redirect()->to('/admin/kategori')->with('success', 'Kategori berhasil ditambahkan.')->with('title', 'List Kategori');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan kategori. Silakan coba lagi.');
        }
    }

    public function edit($id)
    {
        $data['user'] = auth()->user();
        $data['roles'] = auth()->user()->getGroups();
        $data['title'] = 'Edit Kategori';

        $data['kategori'] = $this->kategoriModel->first($id);
        
        return view('pages/admin/kategori/edit-kategori', $data);
    }

    public function update($id)
    {
        helper('url');

        $rules = [
            'name' => 'required|min_length[3]|max_length[255]|is_unique[kategori.name,id,' . $id . ']',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'slug' => url_title($this->request->getPost('name'), '-', true),
        ];

        if ($this->kategoriModel->update($id, $data)) {
            return redirect()->to('/admin/kategori')->with('success', 'Kategori berhasil diubah.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah kategori. Silakan coba lagi.');
        }
    }

    public function delete($id)
    {
        $kategori = $this->kategoriModel->find($id);

        if ($kategori) {
            if ($this->kategoriModel->delete($id)) {
                return redirect()->to('/admin/kategori')->with('success', 'Kategori berhasil dihapus.');
            } else {
                return redirect()->back()->with('error', 'Gagal menghapus kategori. Silakan coba lagi.');
            }
        } else {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan.');
        }
    }
}
