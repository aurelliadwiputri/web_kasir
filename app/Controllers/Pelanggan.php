<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    protected $pelangganmodel;

    public function __construct()
    {
        $this->pelangganmodel = new PelangganModel();
    }

    public function index()
    {
        return view('data_pelanggan/v_pelanggan');
    }

    public function simpan_pelanggan()
    {
        //validasi input dari AJAX
        // $validation = \Config\Services::validation();

        // $validation->setRules([
        //     'nama_pelanggan'   => 'required',
        //     'harga'         => 'required|decimal',
        //     'stok'          => 'required|integer',
        // ]);

        // if(!$validation->withRequest($this->request)->run()){
        //     return $this->response->setJSON([
        //         'status'    => 'error',
        //         'errors'    => $validation->getErrors(),
        //     ]);
        // }
        
        $data = [
            'nama_pelanggan' => $this->request->getVar('nama_pelanggan'),
            'alamat' => $this->request->getVar('alamat'),
            'nomor_telepon'  => $this->request->getVar('nomor_telepon'),
        ];

        $this->pelangganmodel->save($data);

        return $this->response->setJSON([
            'status'    => 'success',
            'message'   => 'Data pelanggan berhasil disimpan',
        ]);
    
    }

    public function tampil_pelanggan()
    {
        $pelanggan = $this->pelangganmodel->findAll();

        return $this->response->setJSON([
            'status' => 'success',
            'pelanggan' => $pelanggan
        ]);
    }

    public function hapus_data($id){
        $result = $this->pelangganmodel->delete($id);
        if ($result){
            echo json_encode(['status'=> 'success', 'message'=> 'Pelanggan dihapus']);
        } else{
            echo json_encode(['status'=> 'error', 'message'=> 'gkbs']);
        }
    }
    public function edit_pelanggan($id)
    {
        $pelanggan = $this->pelangganmodel->find($id);
        if ($pelanggan) {
            return $this->response->setJSON(['status' => 'success', 'pelanggan' => $pelanggan]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Pelanggan tidak ditemukan.']);
        }
    }

    public function update_pelanggan()
    {
        $id = $this->request->getVar('id');
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_pelanggan' => 'required',
            'harga' => 'required|decimal',
            'stok' => 'required|integer',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors(),
            ]);
        }

        $data = [
            'nama_pelanggan' => $this->request->getVar('nama_pelanggan'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
        ];

        $this->pelangganmodel->update($id, $data);
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Data berhasil diperbarui.'
        ]);
    }


}