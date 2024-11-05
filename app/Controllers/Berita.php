<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\CommentModel;
use App\Models\KategoriModel;
use App\Models\LikeModel;
use App\Models\TournamentModel;

class Berita extends BaseController
{
    protected $kategoriModel;
    protected $beritaModel;
    protected $tournamentModel;
    private $isLoggedIn;
    private $popular_news;
    private $tournaments;
    private $likeModel;
    private $commentModel;
    private $hideSidebar = false;


    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->kategoriModel = new KategoriModel();
        $this->tournamentModel = new TournamentModel();

        $this->isLoggedIn = auth()->loggedIn();
        $this->popular_news = $this->beritaModel->getBeritaPopularWithRelation(5);
        $this->tournaments = $this->tournamentModel->getTournamentWithRelation(5);

        $this->likeModel = new LikeModel();
        $this->commentModel = new CommentModel();
    }

    public function index()
    {
        $data['user'] = auth()->user();
        $data['roles'] = auth()->user()->getGroups();
        $data['title'] = 'List Berita';

        $data['berita'] = $this->beritaModel->getBeritaWithRelation(9999);

        return view('pages/admin/berita/list', $data);
    }

    public function listByCategory($slug)
    {
        $kategori = $this->kategoriModel->where(['slug' => $slug])->first();
        $data['isLoggedIn'] = $this->isLoggedIn;
        $data['tournaments'] = $this->tournaments;
        $data['popular_news'] = $this->popular_news;
        $data['categories'] = $this->kategoriModel->findAll();
        $data['title'] = $kategori['name'];
        $data['hideSidebar'] = $this->hideSidebar;

        $data['news'] = $this->beritaModel->getBeritaByCategory($kategori['id'], 9999);

        return view('pages/berita/kategori', $data);
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
        $uploadPath = (ENVIRONMENT === 'production') 
            ? ROOTPATH . '/../public_html/uploads' 
            : ROOTPATH . 'public/uploads';

        if ($picture->isValid() && !$picture->hasMoved()) {
            $newName = $picture->getRandomName();
            $picture->move($uploadPath, $newName);

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
        $data['isLoggedIn'] = $this->isLoggedIn;

        $data['tournaments'] = $this->tournaments;

        $data['popular_news'] = $this->popular_news;

        $data['categories'] = $this->kategoriModel->findAll();

        $data['berita'] = $this->beritaModel
            ->select('berita.*, users.username as author_name')
            ->join('users', 'users.id = berita.author_id')
            ->orderBy('created_at', 'DESC')
            ->find($id);

        $data['hideSidebar'] = false;

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

    public function show($slug)
    {
        $data['isLoggedIn'] = $this->isLoggedIn;
        $data['tournaments'] = $this->tournaments;
        $data['popular_news'] = $this->popular_news;
        $data['categories'] = $this->kategoriModel->findAll();
        $data['hideSidebar'] = $this->hideSidebar;

        if ($slug == 'all') {
            $data['news'] = $this->beritaModel->getBeritaWithRelation(9999);

            return view('pages/berita/list', $data);
        }

        $data['berita'] = $this->beritaModel
            ->select('berita.*, kategori.name as kategori_name, users.username as author_name')
            ->join('kategori', 'kategori.id = berita.kategori_id')
            ->join('users', 'users.id = berita.author_id')
            ->where('berita.slug', $slug)
            ->first();
        $beritaId = $data['berita']['id'];
        $data['isLiked'] = $this->isLoggedIn ? ($this->likeModel->where('userId', auth()->user()->id)->where('beritaId', $beritaId)->first() ? true : false) : false;
        $data['likes'] = $this->likeModel->where('beritaId', $beritaId)->countAllResults();
        $data['comments'] = $this->commentModel->select('comments.*, users.username as user_name')->join('users', 'users.id = comments.userId')->where('beritaId', $beritaId)->findAll();

        return view('pages/berita/show', $data);
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

    public function like($id)
    {
        if (!$this->isLoggedIn) {
            return redirect()->back()->with('error', 'Login untuk memberikan like.');
        }

        $userId = auth()->user()->id;
        $data = [
            'userId' => $userId,
            'beritaId' => $id,
        ];

        $this->likeModel->insert($data);
        return redirect()->back();
    }

    public function dislike($id)
    {
        if (!$this->isLoggedIn) {
            return redirect()->back()->with('error', 'Login untuk memberikan like.');
        }

        $userId = auth()->user()->id;

        $this->likeModel->where('userId', $userId)->where('beritaId', $id)->delete();
        return redirect()->back();
    }

    public function comment($id)
    {
        if (!$this->isLoggedIn) {
            return redirect()->back()->with('error', 'Login untuk memberikan komentar.');
        }

        $userId = auth()->user()->id;
        $text = $this->request->getPost('text');

        $data = [
            'userId' => $userId,
            'beritaId' => $id,
            'text' => $text,
        ];

        $this->commentModel->insert($data);
        return redirect()->back();
    }
}
