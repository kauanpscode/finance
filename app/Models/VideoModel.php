<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class VideoModel extends Model
{
    protected $table = 'videos';
    protected $allowedFields = [];
    public $timestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $db;

    public function __construct(){
        parent::__construct();
        $this->db = Database::connect();
    }

    public function grid() {
        $sql = "SELECT * FROM videos ORDER BY id DESC";

        $res = $this->db->query($sql);

        return $res;
    }
}
