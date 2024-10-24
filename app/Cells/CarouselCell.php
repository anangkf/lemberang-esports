<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class CarouselCell extends Cell
{
    public function render(): string
    {
        $data['news'] = model('BeritaModel')->orderBy('created_at', 'DESC')->findAll(3);
        return $this->view('carousel', $data);
    }
}
