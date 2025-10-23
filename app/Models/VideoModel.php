<?php

namespace App\Models;

use App\Models\BaseModel;
use Config\Database;

class VideoModel extends BaseModel
{
    protected $table = 'videos';
    protected $allowedFields = [];
    public $timestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $db;
    protected $username;

    public function __construct()
    {
        parent::__construct();
        $this->db = Database::connect();

        $this->username = $this->session->get('username');
    }

    public function grid()
    {
        $sql = "SELECT * FROM videos ORDER BY id DESC";

        $res = $this->db->query($sql)->getResult();

        return $res;
    }

    public function novo($data)
    {
        $this->db->transStart();
        $data['last_user'] = $this->last_user($this->username);
        
        $this->db_insert('videos', $data);

        $id = $this->db->insertID();

        $this->db->transComplete();

        if (!$this->db->transStatus()) {
            $res = [
                'style' => 'success',
                'message' => 'Filme adicionado com sucesso!',
                'id' => $id,
            ];
            return $res;
        }

        $res = [
            'style' => 'success',
            'message' => 'Filme adicionado com sucesso!'
        ];

        return $res;
    }
}
