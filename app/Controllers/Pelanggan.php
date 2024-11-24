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
    
    public function tampil_pelanggan()
   {
        $pelanggan = $this->pelangganmodel->findAll();

        return $this->response->setJSON([
            'status'    => 'success',
            'pelanggan'    => $pelanggan
        ]);
   }

   public function simpan_pelanggan()
   {
    $validation = \Config\Services::validation();

    $validation->setRules([
        'nama_pelanggan'   => 'required',
        'alamat'         => 'required',
        'nomor_telepon'          => 'required|integer',
    ]);

    if(!$validation->withRequest($this->request)->run()){
        return $this->response->setJSON([
            'status'    => 'error',
            'errors'    => $validation->getErrors(),
        ]);
    }

    $data = [
        'nama_pelanggan' => $this->request->getVar('nama_pelanggan'),
        'alamat'       => $this->request->getVar('alamat'),
        'nomor_telepon'        => $this->request->getVar('nomor_telepon'),
    ];

    $this->pelangganmodel->save($data);

    return $this->response->setJSON([
        'status'    => 'success',
        'message'   => 'Data pelanggan berhasil disimpan'
    ]);
   }

   public function delete($id)
   {
    $model = new PelangganModel();
    if($model->delete($id)) {
        return $this->response->setJSON(['success' => true]);
    } else{
        return $this->response->setJSON(['success' => false, 'message' => 'gagal menghapus data']);
    }
   }

   public function update_pelanggan()
{
    $id = $this->request->getVar('pelangganId'); // Ambil ID pelanggan dari request
    $data = [
        'nama_pelanggan' => $this->request->getVar('nama_pelanggan'),
        'alamat'       => $this->request->getVar('alamat'),
        'nomor_telepon'        => $this->request->getVar('nomor_telepon'),
    ];
    
    if ($id && $this->pelangganmodel->update($id, $data)) { // Update pelanggan dengan ID spesifik
        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Data pelanggan berhasil diperbarui',
        ]);
    } else {
        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Gagal memperbarui data pelanggan',
        ]);
    }
}

    

    public function detail($id) {
        $pelanggan = $this->pelangganmodel->find($id);
        if ($pelanggan) {
            return $this->response->setJSON([
                'status' => 'success',
                'pelanggan' => $pelanggan,
            ]);
        } else {
            return $this->response->setJSON(['status' => 'error']);
        }
    }

    // Fungsi untuk mengambil data pelanggan yang akan diedit
    public function edit_pelanggan()
    {
        $pelangganID = $this->request->getVar('id');
        $pelanggan = $this->pelangganmodel->find($pelangganID);

        if ($pelanggan) {
            return $this->response->setJSON([
                'status' => 'success',
                'pelanggan' => $pelanggan
            ]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Pelanggan Tidak Ditemukan'], 404);
        }
    }

}