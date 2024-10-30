<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table            = 'comments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['userId', 'beritaId', 'text'];

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
