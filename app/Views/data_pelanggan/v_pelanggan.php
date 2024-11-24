<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>

    <script src="<?= base_url("assets\jquery.min.js") ?>"></script>
    <!--link bootstrap-->
    <link rel="stylesheet" href="<?= base_url('assets\bootstrap-5.3.3-dist\css\bootstrap.min.css') ?>">
    <!--link -->
    <link rel="stylesheet" href="<?= base_url('assets\fontawesome-free-5.15.4-web\fontawesome-free-5.15.4-web\css\all.min.css') ?>">

</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h3 class="text-center">Data Pelanggan</h3>
                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data data-bs-target="#modalTambahPelanggan">
                <i class="fa-solid fa-user-group"></i>
                </i>Tambah Data</button>
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
        <div class="modal fade" id="modalTambahPelanggan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTambahPelangganLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white"> 
                <h1 class="modal-title fs-5" id="modalTambahPelangganLabel">Tambah Pelanggan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formPelanggan"> 
                    <div class="row mb-3">
                        <label for="namaPelanggan" class="col-sm-4 col-form-label">Nama Pelanggan</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan"> 
                        </div>
                    </div>
                    <div class="row mb-3"> <!-- Ganti nb-3 menjadi mb-3 -->
                        <label for="alamatPelanggan" class="col-sm-4 col-form-label">Alamat</label> 
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamatPelanggan" name="alamatPelanggan"> 
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="teleponPelanggan" class="col-sm-4 col-form-label">No. Telepon</label> 
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="teleponPelanggan" name="teleponPelanggan"> 
                        </div>
                    </div>
                    <button type="button" id="simpanPelanggan" class="btn btn-primary float-end">Simpan</button>
                </form> 
            </div>
        </div>
    </div>
</div>

    
       <!-- Modal untuk edit pelanggan -->
<div class="modal fade" id="modalEditPelanggan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="modalEditPelangganLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="modalEditPelangganLabel">Edit Pelanggan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk input data pelanggan -->
                    <form id="formEditPelanggan">
                        <input type="hidden" id="pelangganIdEdit" name="pelangganIdEdit"> <!-- Hidden input untuk ID pelanggan -->
                        <div class="row mb-3">
                            <label for="namaPelangganEdit" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="namaPelangganEdit" name="namaPelangganEdit">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamatPelangganEdit" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamatPelangganEdit" name="alamatPelangganEdit">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="teleponPelangganEdit" class="col-sm-4 col-form-label">No.Telepon</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="teleponPelangganEdit">
                            </div>
                        </div>
                        <button type="button" id="editPelanggan" class="btn btn-primary float-end">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
    <script src="<?= base_url("assets\jquery.min.js") ?>"></script>
    <script src="<?= base_url("assets\fontawesome-free-5.15.4-web\fontawesome-free-5.15.4-web\js\all.min.js") ?>"></script>
    <script src="<?= base_url("assets\bootstrap-5.3.3-dist\js\bootstrap.min.js") ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function tampilPelanggan() {
            $.ajax({
                url: '<?= base_url('pelanggan/tampil'); ?>',
                type: "GET",
                dataType: 'json',
                success: function(hasil) {
                    console.log
                    if (hasil.status === "success") {
                        var pelangganTable = $('#pelangganTable tbody');
                        pelangganTable.empty();
                        var pelanggan = hasil.pelanggan;
                        var no = 1;

                        pelanggan.forEach(function(item) {
                            var row = `<tr>
                                <td>${no}</td>
                                <td>${item.nama_pelanggan}</td>
                                <td>${item.alamat}</td>
                                <td>${item.nomor_telepon}</td>
                                <td>
                                    <button class="btn btn-warning btn-edit" data-id="${item.id_pelanggan}">Edit</button>
                                    <button class="btn btn-danger btn-hapus" data-id="${item.id_pelanggan}">Hapus</button>
                                </td>
                            </tr>`;
                            pelangganTable.append(row);
                            no++;
                        });
                    } else {
                        alert("Gagal mengambil data.");
                    }
                },
                error: function(xhr, status, error) {
                    alert("Terjadi kesalahan: " + error);
                }
            });
        }


    
        $(document).ready(function() {
            // Panggil fungsi saat halaman dimuat
            tampilPelanggan();

            $("#simpanPelanggan").on("click", function() { //simpannnn
                var formData = {
                    nama_pelanggan: $("#namaPelanggan").val(),
                    alamat: $('#alamatPelanggan').val(),
                    nomor_telepon: $('#teleponPelanggan').val()
                };

                $.ajax({
                    url: '<?= base_url('pelanggan/simpan'); ?>',
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    success: function(hasil) {
                        if (hasil.status === 'success') {
                            Swal.fire({
                                title: "Good job!",
                                text: "You clicked the button!",
                                icon: "success"
                                });
                            $('#modalTambahPelanggan').modal("hide");
                            $('#formPelanggan')[0].reset();
                            tampilPelanggan();
                        } else {
                            alert('Gagal menyimpan data: ' + JSON.stringify(hasil.errors));
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Terjadi kesalahan: " + error);
                    }
                });
            });

            // Event handler untuk tombol hapus
            $(document).on('click', '.btn-hapus', function() {
                var row = $(this).closest('tr');
                document.get
                var id = $(this).data('id');
                if (confirm("Apakah Anda yakin ingin menghapus pelanggan ini?")) {
                    $.ajax({
                        url: '<?= base_url('pelanggan/hapus/') ?>' + id,
                        type: "DELETE",
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                row.remove();
                                alert("Pelanggan berhasil dihapus.");
                                tampilPelanggan();
                            } else {
                                alert("Gagal menghapus pelanggan.");
                            }
                        },
                        error: function(xhr, status, error) {
                            alert("Terjadi kesalahan saat menghapus: " + error);
                        }
                    });
                }
            });

            // Event handler untuk tombol edit
            $(document).on('click', '.btn-edit', function() {
                var id = $(this).data('id');
               
                $.ajax({
                url: '<?=base_url('pelanggan/detail/')?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if(data.status==='success') {
                        $('#pelangganIdEdit').val(data.pelanggan.id_pelanggan);
                        $('#namaPelangganEdit').val(data.pelanggan.nama_pelanggan);
                        $('#alamatPelangganEdit').val(data.pelanggan.alamat);
                        $('#teleponPelangganEdit').val(data.pelanggan.nomor_telepon);

                        $('#modalEditPelangganLabel').text('Edit Pelanggan');
                        $('#modalEditPelanggan').modal('show');
                    } else {
                        alert('Gagal mengambil data pelanggan');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan:' + error);
                }
            });

            });

            $('#editPelanggan').on('click', function(){
                var formData = {
                    pelangganId: $('#pelangganIdEdit').val(),
                    nama_pelanggan: $('#namaPelangganEdit').val(),
                    alamat: $('#alamatPelangganEdit').val(),
                    nomor_telepon: $('#teleponPelangganEdit').val(),
                };

                $.ajax({
                    url: '<?=base_url('pelanggan/update'); ?>',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (hasil) {
                        if (hasil.status === 'success') {
                            $('#modalEditPelanggan').modal("hide");
                            tampilPelanggan();
                        } else {
                            alert('Gagal mengedit data:' + JSON.stringify(hasil.errors));

                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Terjadi kesalahan:" + error);
                    }
                })
            })

        });

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