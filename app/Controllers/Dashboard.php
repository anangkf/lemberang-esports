<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\CommentModel;
use App\Models\LikeModel;
use App\Models\TournamentModel;

class Dashboard extends BaseController
{
  protected $beritaModel;
  protected $tournamentModel;
  protected $userModel;
  protected $likeModel;
  protected $commentModel;


  public function __construct()
  {
    $this->beritaModel = new BeritaModel();
    $this->tournamentModel = new TournamentModel();
    $this->userModel = auth()->getProvider();
    $this->likeModel = new LikeModel();
    $this->commentModel = new CommentModel();
  }

  public function index()
  {
    $user = auth()->user();

    $data['roles'] = $user->getGroups();
    $data['user'] = $user;
    $data['berita'] = $this->beritaModel->findAll();
    $data['tournament'] = $this->tournamentModel->findAll();
    $data['users'] = $this->userModel->findAll();

    $data['berita_chart'] = $this->beritaModel->getNewsByMonth();
    $data['like_chart'] = $this->likeModel->getNewsByMonth();
    $data['comment_chart'] = $this->commentModel->getNewsByMonth();

    $data['title'] = 'Dashboard';

    if (!is_array($data['roles']) || empty($data['roles'])) {
      $data['roles'] = []; // Atur sebagai array kosong jika tidak ada role
    }

    return view('pages/main-content', $data);
  }
}
