<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Tournament extends BaseController
{
    protected $kategoriModel;
    protected $tournamentModel;

    public function __construct()
    {
        $this->kategoriModel = new \App\Models\KategoriModel();
        $this->tournamentModel = new \App\Models\TournamentModel();
    }
    public function index()
    {
        $data['user'] = auth()->user();
        $data['roles'] = auth()->user()->getGroups();
        $data['title'] = 'List Tournament';

        $data['tournaments'] = $this->tournamentModel->getTournamentWithRelation(9999);

        return view('pages/admin/tournament/list', $data);
    }

    public function new()
    {
        $data['user'] = auth()->user();
        $data['roles'] = auth()->user()->getGroups();
        $data['title'] = 'Tambah Tournament';
        $data['kategori'] = $this->kategoriModel->findAll();

        return view('pages/admin/tournament/create-tournament', $data);
    }

    public function create()
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'kategori_id' => 'required',
            'registerDates' => 'required',
            'eventDates' => 'required',
            'picture' => 'uploaded[picture]|max_size[picture,1024]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]',
            'slot' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'registerDates' => $this->request->getPost('registerDates'),
            'eventDates' => $this->request->getPost('eventDates'),
            'htm' => $this->request->getPost('htm'),
            'slot' => $this->request->getPost('slot'),
            'location' => $this->request->getPost('location'),
            'prize' => $this->request->getPost('prize'),
            'rules' => $this->request->getPost('rules'),
            'organizer' => $this->request->getPost('organizer'),
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
        if ($this->tournamentModel->insert($data)) {
            return redirect()->to('/admin/tournament')->with('success', 'Tournament berhasil ditambahkan.')->with('title', 'List Tournament');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan tournament. Silakan coba lagi.');
        }
    }

    public function show($id)
    {
        $data['isLoggedIn'] = auth()->loggedIn();
        $data['title'] = 'Detail Tournament';
        $data['tournament'] = $this->tournamentModel
            ->select('tournaments.*, kategori.name as kategori_name')
            ->join('kategori', 'kategori.id = tournaments.kategori_id')
            ->find($id);
        $data['categories'] = $this->kategoriModel->findAll();
        $data['hideSidebar'] = true;

        return view('pages/tournament', $data);
    }

    public function edit($id)
    {
        $data['user'] = auth()->user();
        $data['roles'] = auth()->user()->getGroups();
        $data['title'] = 'Edit Tournament';
        $data['tournament'] = $this->tournamentModel->find($id);
        $data['kategori'] = $this->kategoriModel->findAll();

        return view('pages/admin/tournament/edit-tournament', $data);
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'kategori_id' => 'required',
            'registerDates' => 'required',
            'eventDates' => 'required',
            'picture' => 'max_size[picture,1024]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]',
            'slot' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'registerDates' => $this->request->getPost('registerDates'),
            'eventDates' => $this->request->getPost('eventDates'),
            'htm' => $this->request->getPost('htm'),
            'slot' => $this->request->getPost('slot'),
            'location' => $this->request->getPost('location'),
            'prize' => $this->request->getPost('prize'),
            'rules' => $this->request->getPost('rules'),
            'organizer' => $this->request->getPost('organizer'),
            'cp' => $this->request->getPost('cp'),
            'link' => $this->request->getPost('link'),
            'champions' => $this->request->getPost('champions'),
        ];

        $picture = $this->request->getFile('picture');

        if ($picture && $picture->isValid() && !$picture->hasMoved()) {
            $newName = $picture->getRandomName();
            $picture->move(ROOTPATH . 'public/uploads', $newName);

            $data['picture'] = $newName;
        }

        // Save the news
        if ($this->tournamentModel->update($id, $data)) {
            return redirect()->to('/admin/tournament')->with('success', 'Tournament berhasil diubah.')->with('title', 'List Tournament');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah tournament. Silakan coba lagi.');
        }
    }

    public function delete($id)
    {
        $tournament = $this->tournamentModel->find($id);

        if ($tournament) {
            // Delete the image file
            // if ($tournament['picture'] && file_exists(ROOTPATH . 'public/uploads/' . $tournament['picture'])) {
            //     unlink(ROOTPATH . 'public/uploads/' . $tournament['picture']);
            // }

            // Delete the tournament
            if ($this->tournamentModel->delete($id)) {
                return redirect()->to('/admin/tournament')->with('success', 'Tournament berhasil dihapus.')->with('title', 'List Tournament');
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal menghapus tournament. Silakan coba lagi.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Tournament tidak ditemukan.');
        }
    }
}
