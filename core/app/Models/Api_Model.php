<?php

namespace App\Models;

use CodeIgniter\Model;

class Api_Model extends Model
{
    protected $curl;

    public function __construct()
    {
        $this->curl = \Config\Services::curlrequest([
            // 'base_uri' => 'http://',
            // 'auth' => ['admin', '1234']
        ]);
    }

    public function getAlltb_warga()
    {
        $response = $this->curl->request('GET', 'tb_warga', [
            'query' => [
                'api-key' => 'letmein'
            ]
        ]);
        $result = json_decode($response->getBody(), TRUE);
        return $result['data'];

        // $response =  $this->client->request('GET', 'tb_warga', [
        //     'query' => [
        //         'api-key' => 'letmein'
        //     ]
        // ]);
        // $result = json_decode($response->getBody(), true);
        // return $result['data'];
    }

    public function gettb_wargaById($id)
    {
        $response = $this->curl->request('GET', 'tb_warga', [
            'query' => [
                'api-key' => 'letmein',
                'id' => $id
            ]
        ]);
        $result = json_decode($response->getBody(), TRUE);
        return $result['data'][0];

        // $response =  $this->client->request('GET', 'tb_warga', [
        //     'query' => [
        //         'api-key' => 'letmein',
        //         'id' => $id
        //     ]
        // ]);
        // $result = json_decode($response->getBody(), true);
        // return $result['data'][0];
    }

    public function hapusDatatb_warga($id)
    {
        $response = $this->curl->request('DELETE', 'tb_warga', [
            'form_params' => [
                'api-key' => 'letmein',
                'id' => $id
            ]
        ]);
        $result = json_decode($response->getBody(), true);
        return $result;
    }
}
