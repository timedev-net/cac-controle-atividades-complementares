<?php

namespace App\Modules\TpAtividade;

// use App\Modules\BaseController;


use CodeIgniter\Model;

class TpAtividadeModel extends Model 
{

    protected $table = 'public.migrations';

    public function __construct() {
        parent::__construct();
        $this->db = db_connect();
    }

    public function getAll(): array
    {
        // $db = db_connect();
        
        
        // $this->db->from($table);
        $query = $this->db->query('select 1');
        // $query = $this->db->get();
        // $query2 = $query->result();

        dd($query);

        return ["Aqui é a model"];
    }
}
