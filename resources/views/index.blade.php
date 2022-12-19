<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Data Mahasiswa</title>
</head>

<body>
    <div class="container">
        <div class="justify-content-center row">
            <div class="col-md-8">
                <h4 class="text-center">
                    Data Mahasiswa
                </h4>

                <div class="my-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                        + Mahasiswa
                    </button>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">No Tlp</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswas as $mhs)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $mhs->nama }}</td>
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->jurusan }}</td>
                            <td>{{ $mhs->no_hp }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#editModal{{ $mhs->id }}">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-inline"
                                    id="formDel{{ $mhs->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                                <button type="submit" class="btn btn-danger" onclick="deleteMhs('{{ $mhs->id }}')"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <div class="modal fade" id="editModal{{ $mhs->id }}" data-backdrop="static"
                            data-keyboard="false" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createLabel">Edit Data Mahasiswa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit{{$mhs->id}}">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama"
                                                    placeholder="Masukkan Nama" value="{{ $mhs->nama }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Nim</label>
                                                <input type="text" class="form-control" name="nim"
                                                    placeholder="Masukkan Nim" value="{{ $mhs->nim }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Masukkan Email" value="{{ $mhs->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Jurusan</label>
                                                <input type="text" class="form-control" name="jurusan"
                                                    placeholder="Masukkan Jurusan" value="{{ $mhs->jurusan }}">
                                            </div>
                                            <div class="form-group">
                                                <label>No Hp</label>
                                                <input type="number" class="form-control" name="no_hp"
                                                    value="{{ $mhs->no_hp }}">
                                            </div>

                                            <button type="submit" class="btn btn-primary"
                                                onclick="edit('{{ $mhs->id }}')">Submit</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



        <div class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="createLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createLabel">Tambah Data Mahasiswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="create">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                            </div>
                            <div class="form-group">
                                <label>Nim</label>
                                <input type="text" class="form-control" name="nim" placeholder="Masukkan Nim">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" class="form-control" name="jurusan" placeholder="Masukkan Jurusan">
                            </div>
                            <div class="form-group">
                                <label>No Hp</label>
                                <input type="number" class="form-control" name="no_hp">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.2.min.js"
            integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/1d954ea888.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#create').submit(function (e) {
                    e.preventDefault();
                    $('.err').hide();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        type: "POST",
                        url: "{{ route('mahasiswa.store') }}",
                        data: $('#create').serialize(),
                        success: function (response) {
                            swal({
                                title: "Success!",
                                text: "Data Berhasil Ditambahkan",
                                icon: "success",
                                button: "Ok",
                            }).then(function () {
                                window.location.href = "{{ route('mahasiswa.index') }}";
                            });
                        },
                        error: function (error) {
                            swal({
                                title: "Error!",
                                text: "Data Gagal Ditambahkan",
                                icon: "error",
                                button: "Ok",
                            });
                            if (error.status == 422) {
                                $.each(error.responseJSON.errors, function (i, error) {
                                    var el = $(document).find('[name="' + i + '"]');
                                    el.after($('<span style="color:red; class="err">' + error[0] + '</span>'));
                                });
                            }
                        }
                    });
                });
            });

            function edit(id) {
                $('#edit' + id).submit(function (e) {
                    e.preventDefault();
                    $('.err').hide();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        type: "PUT",
                        url: "{{ route('mahasiswa.update', ':id') }}".replace(':id', id),
                        data: $('#edit' + id).serialize(),
                        success: function (response) {
                            swal({
                                title: "Success!",
                                text: "Data Berhasil Diubah",
                                icon: "success",
                                button: "Ok",
                            }).then(function () {
                                window.location.href = "{{ route('mahasiswa.index') }}";
                            });
                        },
                        error: function (error) {
                            swal({
                                title: "Error!",
                                text: "Data Gagal Diubah",
                                icon: "error",
                                button: "Ok",
                            });
                            if (error.status == 422) {
                                $.each(error.responseJSON.errors, function (i, error) {
                                    var el = $(document).find('[name="' + i + '"]');
                                    el.after($('<span style="color:red; class="err">' + error[0] + '</span>'));
                                });
                            }
                        }
                    });
                });
            }

            function deleteMhs(id) {
                swal({
                    title: 'Yakin?',
                    text: 'Apakah anda yakin ingin menghapus data ini?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        console.log(id);
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            type: "DELETE",
                            url: "{{ route('mahasiswa.destroy', ':id') }}".replace(':id', id),
                            success: function (response) {
                                swal({
                                    title: "Success!",
                                    text: "Data Berhasil Dihapus",
                                    icon: "success",
                                    button: "Ok",
                                }).then(function () {
                                    window.location.href = "{{ route('mahasiswa.index') }}";
                                });
                            },
                            error: function (error) {
                                swal({
                                    title: "Error!",
                                    text: "Data Gagal Dihapus",
                                    icon: "error",
                                    button: "Ok",
                                });
                            }
                        });
                    }
                });
            }
        </script>
</body>

</html>
