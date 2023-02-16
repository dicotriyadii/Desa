<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_data;
 
class APIWarga extends ResourceController
{
    use ResponseTrait;
    // get all product
    public function index()
    {
        $warga = new Model_warga();
        $data = $warga->getWarga();
        $response   = [
            'status'    => 200,
            'message'   => 'Berhasil',
            'data'      => $data
        ];
        return $this->respond($data,200);
    }
 
    // get single product
    public function show($id = null)
    {
        $model = new Model_warga();
        $data = $model->where('nomorIndukKependudukan',$id)->findAll();
        if($data){
            $response   = [
                'status'    => 200,
                'message'   => 'Berhasil',
                'data'      => $data
            ];
            return $this->respond($data,200);
        }else{
            $response   = [
                'status'    => 400,
                'message'   => 'Gagal',
                'data'      => $data
            ];
            return $this->respond($response,400);
        }
    }
 
    public function create()
    {           
        //variable
        $warga          = new Model_warga();
        $data           = new Model_data();
        $nik            = $this->request->getVar('nik');
        $token          = $this->request->getVar('token');
        // Validasi Token
        $dataValidasi = [
            'nomorIndukKependudukan' => $nik,
            'token' => $token
        ];
        $cekTokenWarga  = $warga->where($dataValidasi)->findAll();
        if($cekTokenWarga == null){
            $response = [
                'status'    => 400,
                'messages'  => "Tidak bisa diakses !!, silahkan login terlebih dahulu"
            ];  
            return $this->respond($response);          
        }else{
            // Proses Data
            $data = $data->getWargaAll();
            $response = $data;
            return $this->respond($response);    
        }  
    }
 
    // update product
    // public function update($id = null)
    // {
    //     $model = new ProductModel();
    //     $json = $this->request->getJSON();
    //     if($json){
    //         $data = [
    //             'product_name' => $json->product_name,
    //             'product_price' => $json->product_price
    //         ];
    //     }else{
    //         $input = $this->request->getRawInput();
    //         $data = [
    //             'product_name' => $input['product_name'],
    //             'product_price' => $input['product_price']
    //         ];
    //     }
    //     // Insert to Database
    //     $model->update($id, $data);
    //     $response = [
    //         'status'   => 200,
    //         'error'    => null,
    //         'messages' => [
    //             'success' => 'Data Updated'
    //         ]
    //     ];
    //     return $this->respond($response);
    // }
 
    // delete product
    // public function delete($id = null)
    // {
    //     $model = new ProductModel();
    //     $data = $model->find($id);
    //     if($data){
    //         $model->delete($id);
    //         $response = [
    //             'status'   => 200,
    //             'error'    => null,
    //             'messages' => [
    //                 'success' => 'Data Deleted'
    //             ]
    //         ];
             
    //         return $this->respondDeleted($response);
    //     }else{
    //         return $this->failNotFound('No Data Found with id '.$id);
    //     }
         
    // }
 
}