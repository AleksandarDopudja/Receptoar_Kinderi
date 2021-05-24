<?php

namespace App\Models;

use CodeIgniter\Model;

class Login_Database extends Model {
    protected $table      = 'korisnik';
    protected $primaryKey = 'ID_korisnik';

   // protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['Ime', 'Prezime', 'Email', 'Korisnicko_ime', 'Lozinka', 'Broj pobeda', 'Kategorija_korisnika'];

    //protected $useTimestamps = false;
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;
}