<?php

namespace App\Models;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Model;
use Config\Services;
use Exception;
use Throwable;


class BaseModel extends Model
{
    protected $db;

    protected $table;

    protected $primaryKey = 'id';
    protected $session;

    public function __construct()
    {
        $this->session = Services::session();
        $this->db = db_connect();
    }

    public function last_user($nome)
    {
        $date = date('d/m/Y H:i:s');

        return $date . ' ' . $nome;
    }

    public function db_insert($table, $data)
    {
        $keys = array_keys($data);
        $values = array_values($data);
        $sql = "INSERT INTO {$table} (" . implode(', ', $keys) . ') VALUES ("' . implode(', ', $values) . '");';

        $this->db->query($sql);
    }
}
