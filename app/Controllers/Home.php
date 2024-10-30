<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\KategoriModel;
use App\Models\TournamentModel;

class Home extends BaseController
{
    protected $kategoriModel;
    protected $beritaModel;
    protected $tournamentModel;
    private $isLoggedIn;
    private $popular_news;
    private $recent_news;
    private $tournaments;


    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->kategoriModel = new KategoriModel();
        $this->tournamentModel = new TournamentModel();
        $this->isLoggedIn = auth()->loggedIn();
        $this->popular_news = $this->beritaModel->getBeritaPopularWithRelation(5);
        $this->recent_news = $this->beritaModel->getBeritaWithRelation(9);
        $this->tournaments = $this->tournamentModel->getTournamentWithRelation(5);
    }

    public function index(): string
    {
        $data['isLoggedIn'] = $this->isLoggedIn;
        $data['hideSidebar'] = false;

        $data['tournaments'] = $this->tournaments;
        $data['popular_news'] = $this->popular_news;
        $data['recent_news'] = $this->recent_news;

        $kategoriModel = new KategoriModel();
        $data['categories'] = $kategoriModel->findAll();

        return view('pages/home', $data);
    }
}
