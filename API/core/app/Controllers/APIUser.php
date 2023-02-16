<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_user;
 
class APIUser extends ResourceController
{
    use ResponseTrait;
    // get all product
    public function index()
    {
        $warga      = new Model_user();
        $data       = $warga->getUser();
        $response   = [
            'status' => 200,
            'error'  => null,
            'data'   => $data
        ];
        return $this->respond($data,200);
    }
 
    // get single product
    public function show($id = null)
    {
        $model = new Model_user();
        $data = $model->getWhere(['usernamer' => $id])->getResult();
        if($data){
            $response   = [
                'status'    => 200,
                'message'   => 'Berhasil',
                'data'      => $data
            ];
            return $this->respond($response,200);
        }else{
            $response   = [
                'status'    => 400,
                'message'   => 'Gagal',
                'data'      => $data
            ];
            return $this->respond($response,400);
        }
    }
 
    // create a product
    public function create()
    {
        $pengguna   = new Model_user();
        $cekPengguna = $pengguna->where('username',$this->request->getPost('username'))->findAll();
        $jumlahSuperAdmin = $pengguna->where('hakAkses','superAdmin')->countAllResults();
        if($this->request->getPost('hakAkses') == 'superAdmin'){
            if($jumlahSuperAdmin == 2 ){
                $response   = [
                    'status'    => 400,
                    'message'   => 'Gagal',
                ];
                return $this->respond($response,400);
            }
        }
        if($cekPengguna != null){
            $response   = [
                'status'    => 400,
                'message'   => 'Gagal',
            ];
            return $this->respond($response,400);
        }
        $jumlahHash = [
            'cost' => 10,
        ];
        $data = [
            'username'      => $this->request->getVar('username'),
            'password'      => password_hash($this->request->getPost('password'),PASSWORD_DEFAULT,$jumlahHash),
            'nama'          => $this->request->getVar('nama'),
            'jabatan'       => $this->request->getVar('jabatan'),
            'hakAkses'      => $this->request->getVar('hakAkses'),
            'pertanyaan'    => $this->request->getVar('pertanyaanLupaPassword'),
            'jawaban'       => $this->request->getVar('jawabanLupaPassword'),
        ];
        $pengguna->insert($data);
        return $this->respondCreated($data);
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