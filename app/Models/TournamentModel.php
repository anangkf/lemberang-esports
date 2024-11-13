<?php

namespace App\Models;

use CodeIgniter\Model;

class TournamentModel extends Model
{
    protected $table            = 'tournaments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'kategori_id', 'registerDates', 'eventDates', 'picture', 'description', 'htm', 'slot', 'location', 'prize', 'rules', 'organizer', 'cp', 'link', 'champions'];

    public function getTournamentWithRelation($limit = 3)
    {
        $currentDate = date('Y-m-d');

        return $this->select('tournaments.*, kategori.name as kategori_name')
                    ->join('kategori', 'kategori.id = tournaments.kategori_id')
                    ->where("STR_TO_DATE(SUBSTRING_INDEX(tournaments.registerDates, ' - ', -1), '%m/%d/%Y') >= ", $currentDate)
                    ->orderBy('created_at', 'DESC')
                    ->findAll($limit);
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
