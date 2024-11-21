<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>

    <!--link bootstrap-->
    <link rel="stylesheet" href="<?= base_url('assets\bootstrap-5.3.3-dist\css\bootstrap.min.css') ?>">
    <!--link -->
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome-free-6.6.0-web/css/all.min.css') ?>">

</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h3 class="text-center">Data Pelanggan</h3>
                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data data-bs-target="#modalTambahPelanggan"><i class="fa-solid fa-cart-plus"></i>Tambah Data</button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="container mt-5">
                    <table class="table table-bordered" id="pelangganTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>Nomor Telepon</th>
                            </tr>
                            <tbody>
                                <!--Data akan dimasukkan melalui ajax-->
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Peklanggan -->
        <div class="modal fade" id="modalTambahPelanggan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTambahPelanggan" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5" id="modalTambahPelanggan">Tambah Pelanggan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formPelanggan">
                            <div class="row mb-3">
                                <label for="namaPelanggan"class="col-form-label">Nama Pelanggan</label>
                                <div class="cl-sm-8">
                                    <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamatPelanggan"class="col-sm-4 col-form-label">Alamat</label>
                                <div class="cl-sm-8">
                                    <input type="text" step="0.01" class="form-control" id="alamat">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nomorteleponPelanggan"class="col-sm-4 col-form-label">Nomor Telepon</label>
                                <div class="cl-sm-8">
                                    <input type="number" class="form-control" id="nomorTeleponPelanggan">
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" id="simpanPelanggan" class="btn btn-primary float-end">Simpan</button>
                        </div>
                    </div>        
                </div>            
            </div>
        </div>
    </div>
    
        <!-- Modal Hapus Pelanggan -->
        <div class="modal fade" id="modalHapusPelanggan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapusPelangganLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="modalHapusPelangganLabel">Hapus Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus pelanggan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="btnHapusPelanggan">Hapus</button>
                </div>
            </div>
        </div>
    </div>
        
         <!-- Modal Edit Pelanggan -->
         <div class="modal fade" id="modalEditPelanggan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditPelangganLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="modalEditPelangganLabel">Edit Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditPelanggan">
                    <input type="hidden" id="editPelangganId"> <!-- ID untuk pelanggan -->
                    <div class="row mb-3">
                        <label for="editNamaPelanggan" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="editNamaPelanggan" name="nama_pelanggan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="editAlamatPelanggan" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="editAlamatPelanggan" name="alamat">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="editNomorTeleponPelanggan" class="col-sm-4 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="editNomorTeleponPelanggan" name="nomor_telepon">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="updatePelanggan">Update</button>
            </div>
        </div>
    </div>
</div>


    
    <script src="<?= base_url("assets/jquery.min.js") ?>"></script>
    <script src="<?= base_url("assets\bootstrap-5.3.3-dist\js\bootstrap.min.js") ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        
        $(document).ready(function() {
    tampilPelanggan();
    
    // Fungsi untuk menampilkan pelanggan dalam tabel
    function tampilPelanggan() {
        $.ajax({
            url: '<?= base_url('/pelanggan/tampil') ?>',
            type: 'GET',
            dataType: 'json',
            success: function(hasil) {
                if (hasil.status === 'success') {
                    var pelangganTable = $('#pelangganTable tbody');
                    pelangganTable.empty(); // Clear existing data
                    
                    var pelanggan = hasil.pelanggan;
                    var no = 1;
                    
                    // Loop untuk memasukkan data ke dalam tabel
                    pelanggan.forEach(function(item) {
                        var row = '<tr>' +
                            '<td>' + no + '</td>' +
                            '<td>' + item.nama_pelanggan + '</td>' +
                            '<td>' + item.alamat + '</td>' +
                            '<td>' + item.nomor_telepon + '</td>' +
                            '<td>' +
                                '<button class="btn btn-warning btn-sm editPelanggan" data-id="' + item.pelanggan_id + '" data-bs-toggle="modal" data-bs-target="#modalEditPelanggan"><i class="fa-solid fa-pencil"></i> Edit</button> ' +
                                '<button class="btn btn-danger btn-sm hapusPelanggan" data-id="' + item.pelanggan_id + '"><i class="fa-solid fa-trash-can"></i> Hapus</button> ' +
                            '</td>' +
                        '</tr>';
                        pelangganTable.append(row);
                        no++;
                    });
                } else {
                    alert('Gagal mengambil data.');
                }
            },
            error: function(xhr, status, error) {
                alert('Terjadi kesalahan: ' + error);
            }
        });
    }
    
    // Tangani klik tombol simpan untuk menambahkan pelanggan baru
    $("#modalTambahPelanggan").on("click", "#simpanPelanggan", function() {
        var nama_pelanggan = $('#namaPelanggan').val();
        var alamat = $('#alamat').val();
        var nomor_telepon = $('#nomorTelepon').val();

        var formData = {
            "nama_pelanggan": nama_pelanggan,
            "alamat": alamat,
            "nomor_telepon": nomor_telepon
        };

        $.ajax({
            url: '<?= base_url('/pelanggan/simpan') ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(hasil) {
                if (hasil.status === 'success') {
                    $('#modalTambahPelanggan').modal('hide');
                    $('#formPelanggan')[0].reset();
                    tampilPelanggan();
                    Swal.fire({
                    title: "Success",
                    text: "Berhasil Tersimpan!",
                    icon: "success"
                    });
                } else {
                    alert('Gagal menyimpan data: ' + JSON.stringify(hasil.errors));
                }
            },
            error: function(xhr, status, error) {
                alert('Terjadi kesalahan: ' + error);
            }
        });
    });

    // Tangani klik tombol edit untuk mengambil dan mengisi modal dengan data produk
    $('#pelangganTable').on('click', '.editPelanggan', function() {
        var pelangganId = $(this).data('id');

        $.ajax({
            url: '<?= base_url('pelanggan/edit/'); ?>' + pelangganId, // Fixed URL concatenation
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.status === 'success') {
                    var pelanggan = data.pelanggan;
                    $('#editPelangganId').val(pelanggan.pelanggan_id);
                    $('#editNamaPelanggan').val(pelanggan.nama_pelanggan);
                    $('#editAlamatPelanggan').val(pelanggan.alamat);
                    $('#editNomorTeleponPelanggan').val(pelanggan.nomor_telepon);
                    $('#modalEditPelanggan').modal('show');
                } else {
                    alert('Gagal mendapatkan data pelanggan.');
                }
            },
            error: function(xhr, status, error) {
                alert('Terjadi kesalahan: ' + error);
            }
        });
    });

    // Tangani klik tombol pembaruan untuk memperbarui produk
    $('#updatePelanggan').on('click', function() {
        var formData = {
            id: $('#editelangganId').val(),
            nama_pelanggan: $('#editNamaPelanggan').val(),
            harga: $('#editAlamatPelanggan').val(),
            stok: $('#editNomorTeleponPelanggan').val()
        };

        $.ajax({
            url: '<?= base_url('pelanggan/update'); ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(hasil) {
                if (hasil.status === 'success') {
                    $('#modalEditPelanggan').modal('hide');
                    tampilPelanggan();
                } else {
                    alert('Gagal update: ' + JSON.stringify(hasil.errors));
                }
            },
            error: function(xhr, status, error) {
                alert('Terjadi kesalahan: ' + error);
            }
        });
    });

    // Klik tombol hapus untuk menghapus produk
    $('#pelangganTable').on('click', '.hapusPelanggan', function() {
        var id = $(this).data('id');
        
        if (confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')) {
            $.ajax({
                url: '<?= base_url('pelanggan/delete'); ?>/' + id, // Make sure the URL is correct for the delete function
                type: 'DELETE',
                success: function(response) {
                    alert('Pelanggan berhasil dihapus.');
                    tampilPelanggan(); // Reload the product table
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan saat menghapus pelanggan: ' + error);
                }
            });
        }
    });
});


        $('#pelangganTable').on('click','.hapusPelanggan',function(){
        var id=$(this).attr('data-id')
        console.log(id);        
            
        $.ajax({
            url:`http://localhost:8080/pelanggan/delete/${id}`,
            type: 'DELETE',
            success: function(response){
                $('#modalHapus').modal('hide');
                alert('Berhasil Hapus data');
                tampilPelanggan()
            }
        })
    });
    


    // let idHapus;
    // function ShowModalHapus(id){
    //     idHapus = id;
    //     $('#modalHapus').modal('show');
    // }

</script>



<!-- </body> -->

<!-- <body>
    <div class="container">
        <div class="card-header header-margin" style="display: flex; justify-content: center;">
            <h3 class="card_title" style="color: black;">
                <strong>Data Pelanggan</strong>
            </h3>
        </div>
        <div class="card-body text-center button-margin" style="display: flex; justify-content: flex-end;">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="fa-solid fa-plus"></i>
                <a>Tambah Data</a>
            </button>
        </div>
    </div> -->

<!-- </body> -->
</html> 