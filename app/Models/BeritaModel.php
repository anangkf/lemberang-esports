<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table            = 'berita';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'slug', 'description', 'picture', 'content', 'kategori_id', 'author_id',];

    public function getBeritaWithRelation($limit = 3)
    {
        return $this->select('berita.*, kategori.name as kategori_name, users.username as author_name')
            ->join('kategori', 'kategori.id = berita.kategori_id')
            ->join('users', 'users.id = berita.author_id')
            ->orderBy('created_at', 'DESC')
            ->findAll($limit);
    }

    public function getBeritaPopularWithRelation($limit = 3)
    {
        return $this->select('berita.*, kategori.name as kategori_name, users.username as author_name, COUNT(likes.id) as likes_count')
            ->join('kategori', 'kategori.id = berita.kategori_id')
            ->join('users', 'users.id = berita.author_id')
            ->join('likes', 'likes.beritaId = berita.id', 'left')
            ->groupBy('berita.id')
            ->orderBy('likes_count', 'DESC')
            ->findAll($limit);
    }

    public function getBeritaByCategory($kategoriId, $limit = 3)
    {
        return $this->select('berita.*, kategori.name as kategori_name, users.username as author_name')
            ->join('kategori', 'kategori.id = berita.kategori_id')
            ->join('users', 'users.id = berita.author_id')
            ->where('berita.kategori_id', $kategoriId)
            ->orderBy('created_at', 'DESC')
            ->findAll($limit);
    }

    public function getNewsByMonth()
    {
        $currentDate = new \DateTime();

        $newsCount = [];

        // Loop through the last 6 months
        for ($i = 0; $i < 6; $i++) {
            $monthYear = $currentDate->format('Y-m');

            $count = $this->where('DATE_FORMAT(created_at, "%Y-%m")', $monthYear)
                ->countAllResults();

            $newsCount[] = $count;
            $currentDate->modify('-1 month');
        }

        return array_reverse($newsCount);
    }

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
