<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KategoriModel;

class Berita extends BaseController
{
    protected $kategoriModel;
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data['user'] = auth()->user();
        $data['roles'] = auth()->user()->getGroups();
        $data['title'] = 'List Berita';

        $data['berita'] = $this->beritaModel->getBeritaWithRelation();

        return view('pages/admin/berita/list', $data);
    }

    public function new()
    {   
        $data['user'] = auth()->user();
        $data['roles'] = auth()->user()->getGroups();
        $data['title'] = 'Tambah Berita';
        $data['kategori'] = $this->kategoriModel->findAll();

        return view('pages/admin/berita/create-news', $data);
    }

    public function create()
    {
        helper('url');

        $rules = [
            'title' => 'required|min_length[3]|max_length[255]|is_unique[berita.title]',
            'description' => 'required|min_length[3]|max_length[255]',
            'kategori_id' => 'required',
            'picture' => 'uploaded[picture]|max_size[picture,1024]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]',
            'content' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => url_title($this->request->getPost('title'), '-', true),
            'description' => $this->request->getPost('description'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'content' => $this->request->getPost('content'),
            'author_id' => auth()->user()->id,
        ];

        $picture = $this->request->getFile('picture');

        if ($picture->isValid() && !$picture->hasMoved()) {
            $newName = $picture->getRandomName();
            $picture->move(ROOTPATH . 'public/uploads', $newName);

            $data['picture'] = $newName;
        }

        // Save the news
        if ($this->beritaModel->insert($data)) {
            return redirect()->to('/admin/berita')->with('success', 'Berita berhasil ditambahkan.')->with('title', 'List Berita');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan berita. Silakan coba lagi.');
        }
    }

    public function preview($id)
    {
        $data['isLoggedIn'] = auth()->loggedIn();

        $data['tournaments'] = [
          ["id" => 1, "name" => "League of Legends World Championship", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIe9oqSqALyMSr3kMBA4lJJlnOz4wJBpnKNw&s", "start_date" => "October 10, 2024"],
          ["id" => 2, "name" => "Dota 2 The International", "image" => "https://www.blibli.com/friends-backend/wp-content/uploads/2023/12/B1100936-Cover-Juara-The-International-DOTA-2-1536x806.jpg", "start_date" => "August 15, 2024"],
          ["id" => 3, "name" => "CS:GO Major Championship", "image" => "https://res.cloudinary.com/pley-gg/image/upload/c_fill,w_900/v1/teams/astralis/Copyright_-_Bart-Oerbekke_-_astralis4_rgezkp", "start_date" => "November 1, 2024"],
        ];

        $data['popular_news'] = [
          [
            "id" => 1, 
            "title" => "Mobile Legends Tournament 2024 Announced", 
            "image" => "https://www.adobomagazine.com/wp-content/uploads/2024/01/Bang-Bang-Esports-unveils-2024-Roadmap-HERO.jpg", 
            "description" => "The biggest Mobile Legends tournament is back with exciting new rules and huge prizes.", 
            "category" => "Mobile Legends", 
            "date_posted" => "September 1, 2024"
          ],[
            "id" => 2, 
            "title" => "PUBG Mobile Pro League: New Champions Crowned", 
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzSYtXl4pUceAIG_-R-9F_eJ0DaJkWbjXChw&s", 
            "description" => "The latest PUBG Mobile Pro League wrapped up with a thrilling finale as new champions emerge.", 
            "category" => "PUBG Mobile", 
            "date_posted" => "August 29, 2024"
          ],[
            "id" => 3, 
            "title" => "eFootball 2024 Season Kickoff Update", 
            "image" => "https://staticg.sportskeeda.com/editor/2024/04/da58a-17128455260023-1920.jpg?w=640", 
            "description" => "Konami has released a major update to kickstart the new eFootball 2024 season.", 
            "category" => "eFootball", 
            "date_posted" => "August 15, 2024"
          ],
        ];

        $data['categories'] = $this->kategoriModel->findAll();

        $data['berita'] = $this->beritaModel
                               ->select('berita.*, users.username as author_name')
                               ->join('users', 'users.id = berita.author_id')
                               ->orderBy('created_at', 'DESC')
                               ->find($id);

        return view('pages/berita/preview', $data);
    }

    public function edit($id)
    {
        $data['user'] = auth()->user();
        $data['roles'] = auth()->user()->getGroups();
        $data['title'] = 'Edit Berita';
        $data['kategori'] = $this->kategoriModel->findAll();

        $data['berita'] = $this->beritaModel->find($id);

        return view('pages/admin/berita/edit-news', $data);
    }
    
    public function update($id)
    {
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[3]|max_length[255]',
            'kategori_id' => 'required',
            'picture' => 'max_size[picture,1024]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]',
            'content' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => url_title($this->request->getPost('title'), '-', true),
            'description' => $this->request->getPost('description'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'content' => $this->request->getPost('content'),
            'author_id' => auth()->user()->id,
        ];

        $picture = $this->request->getFile('picture');

        if ($picture && $picture->isValid() && !$picture->hasMoved()) {
            $newName = $picture->getRandomName();
            $picture->move(ROOTPATH . 'public/uploads', $newName);

            $data['picture'] = $newName;
        }

        if ($this->beritaModel->update($id, $data)) {
            return redirect()->to('/admin/berita')->with('success', 'Berita berhasil diubah.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah berita. Silakan coba lagi.');
        }
    }

    public function delete($id)
    {
        $berita = $this->beritaModel->find($id);

        if ($berita) {
            if ($this->beritaModel->delete($id)) {
                // $pathImage = ROOTPATH . 'public/uploads/' . $berita['picture'];
                // if (is_file($pathImage)) {
                //     // Hapus file gambar dari folder
                //     unlink($pathImage);
                // }
                
                return redirect()->to('/admin/berita')->with('success', 'Berita berhasil dihapus.');
            } else {
                return redirect()->back()->with('error', 'Gagal menghapus berita. Silakan coba lagi.');
            }
        } else {
            return redirect()->back()->with('error', 'Berita tidak ditemukan.');
        }
    }
}
