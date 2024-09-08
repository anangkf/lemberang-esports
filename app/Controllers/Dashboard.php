<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $user = auth()->user();
        $data = [];

        $data['roles'] = $user->getGroups();
        $data['user'] = $user;
        
        if (!is_array($data['roles']) || empty($data['roles'])) {
          $data['roles'] = []; // Atur sebagai array kosong jika tidak ada role
        }

        return view('pages/main-content', $data);
    }
}
