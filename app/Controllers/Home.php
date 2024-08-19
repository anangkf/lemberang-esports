<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
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
