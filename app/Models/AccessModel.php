<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class AccessModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = 'true';
    protected $returnType = 'object';
    protected $useSoftDeletes = 'false';
    protected $allowedFields = ['nome', 'email', 'password'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $beforeUpdate   = ['hashPassword'];

    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = Database::connect();
    }

    public function get(string $email): array | null
    {
        $sql = "SELECT * FROM {$this->table} WHERE email = ?";
        $query = $this->db->query($sql, [$email]);

        return $query->getRowArray();
    }

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }

        return $data;
    }
}
