<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class CommentsCell extends Cell
{
    public $comments;
    public $beritaId;

    public function render(): string
    {
        $data['isLoggedIn'] = auth()->loggedIn();
        $data['userId'] = auth()->user() ? auth()->user()->id : null;
        return $this->view('comments', $data);
    }
}
