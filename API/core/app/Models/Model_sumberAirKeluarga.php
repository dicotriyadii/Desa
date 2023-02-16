<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_kriteriaRumah;
 
class Model_sumberAirKeluarga extends Model
{
    protected $table                = 'tb_sumber_air_keluarga';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['jenis_sumber_air'];
    
    public function getSumberAirKeluarga()
    {
        return $this->findAll();
    }
 
}