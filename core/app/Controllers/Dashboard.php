<?php

namespace App\Controllers;


class Dashboard extends BaseController
{

    public function index()
    {
        if (!session()->get('nik')) {
            return redirect()->to(base_url() . '/loginAdmin');
        }

        $data = [
            'title' => 'Admin - Dashboard Dasa Wisma',
        ];
        return view('auth/dashboard', $data);
    }

    public function logout()
    {
        if ($this->request->isAJAX()) {

            $this->session->destroy();

            $data = [
                'respond'   => 'success',
                'message'   => 'Anda berhasil Keluar!'
            ];

            echo json_encode($data);
        }
    }
}
