<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class SidebarCell extends Cell
{
    public $navs = [
      [
        'title' => 'Dashboard',
        'url' => '/admin/dashboard',
        'icon' => 'bi bi-grid-fill',
        'hasSub' => false
      ],
      [
        'title' => 'Master Berita',
        'url' => '/admin/berita',
        'icon' => 'bi bi-newspaper',
        'hasSub' => true,
        'submenu' => [
          [
            'title' => 'List Berita',
            'url' => '/admin/berita',
          ],
          [
            'title' => 'Tambah Berita',
            'url' => '/admin/berita/new',
          ]
        ]
      ],
      [
        'title' => 'Master Kategori',
        'url' => '/admin/kategori',
        'icon' => 'bi bi-tags-fill',
        'hasSub' => true,
        'submenu' => [
          [
            'title' => 'List Kategori',
            'url' => '/admin/kategori',
          ],
          [
            'title' => 'Tambah Kategori',
            'url' => '/admin/kategori/new',
          ]
        ]
      ],
      [
        'title' => 'Master Tournament',
        'url' => '/admin/tournament',
        'icon' => 'bi bi-trophy-fill',
        'hasSub' => true,
        'submenu' => [
          [
            'title' => 'List Tournament',
            'url' => '/admin/tournament',
          ],
          [
            'title' => 'Tambah Tournament',
            'url' => '/admin/tournament/new',
          ]
        ]
      ],
    ];
}
