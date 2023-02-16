<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_pendidikanTerakhir;
 
class APIPendidikanTerakhir extends ResourceController
{
    use ResponseTrait;
    // get all product
    public function index()
    {
        $model      = new Model_pendidikanTerakhir();
        $data       = $model->getPendidikanTerakhir();
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
        $model = new Model_pendidikanTerakhir();
        $data = $model->getWhere(['idPendidikanTerakhir' => $id])->getResult();
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
 
    // create a product
    // public function create()
    // {
    //     $model = new ProductModel();
    //     $data = [
    //         'product_name' => $this->request->getPost('product_name'),
    //         'product_price' => $this->request->getPost('product_price')
    //     ];
    //     $data = json_decode(file_get_contents("php://input"));
    //     //$data = $this->request->getPost();
    //     $model->insert($data);
    //     $response = [
    //         'status'   => 201,
    //         'error'    => null,
    //         'messages' => [
    //             'success' => 'Data Saved'
    //         ]
    //     ];
         
    //     return $this->respondCreated($data, 201);
    // }
 
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