<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\KategoriModel;

class Home extends BaseController
{
    protected $kategoriModel;
    protected $beritaModel;
    private $isLoggedIn;
    private $popular_news;
    private $recent_news;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->kategoriModel = new KategoriModel();
        $this->isLoggedIn = auth()->loggedIn();
        $this->popular_news = $this->beritaModel->getBeritaPopularWithRelation(5);
        $this->recent_news = $this->beritaModel->getBeritaWithRelation(9);

    }

    public function index(): string
    {
        $data['isLoggedIn'] = $this->isLoggedIn;

        $data['tournaments'] = [
          ["id" => 1, "name" => "League of Legends World Championship", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIe9oqSqALyMSr3kMBA4lJJlnOz4wJBpnKNw&s", "start_date" => "October 10, 2024"],
          ["id" => 2, "name" => "Dota 2 The International", "image" => "https://www.blibli.com/friends-backend/wp-content/uploads/2023/12/B1100936-Cover-Juara-The-International-DOTA-2-1536x806.jpg", "start_date" => "August 15, 2024"],
          ["id" => 3, "name" => "CS:GO Major Championship", "image" => "https://res.cloudinary.com/pley-gg/image/upload/c_fill,w_900/v1/teams/astralis/Copyright_-_Bart-Oerbekke_-_astralis4_rgezkp", "start_date" => "November 1, 2024"],
        ];

        $data['popular_news'] = $this->popular_news;

        $data['recent_news'] = $this->recent_news;

        $kategoriModel = new KategoriModel();
        $data['categories'] = $kategoriModel->findAll();

        return view('pages/home', $data);
    }
}
