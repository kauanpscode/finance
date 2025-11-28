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
    protected $allowedFields = [];
    protected $protectFields = false;
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

    public function register($data)
    {
        $existentUser = $this->getByEmail($data['email']);

        if ($existentUser) {
            $res = ['status' => 'error', 'message' => 'E-mail já cadastrado.'];
            return $res;
        }

        $this->db->transStart();

        $this->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            $res = ['status' => 'error', 'message' => 'Falha ao registrar usuário.'];
            return $res;
        }

        $res = ['status' => 'success', 'message' => 'Usuário registrado com sucesso.'];
        return $res;
    }

    public function getByEmail(string $email)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $ret = $this->db->query($sql)->getRow();

        return $ret;
    }

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }

        return $data;
    }
}
