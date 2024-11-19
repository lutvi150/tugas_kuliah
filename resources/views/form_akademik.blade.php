<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data NIM</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('style/css.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/notiflix/dist/notiflix-3.2.7.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
        <div class="col-md-12" id="table-data">
            <div class="col-md-12 text-center">
                <h1>Data Akademik</h1>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <button class="btn btn-primary btn-xs" onclick="show_form()">Tambah Data</button>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">KELAS</th>
                            <th scope="col">MATA KULIAH</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="show-data">
                        <tr hidden>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>
                                <button class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12" id="form" hidden="true">
            <form class="" id="form-akademik">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NIM</label>
                    <input type="number" class="form-control" name="nim" id="nim" aria-describedby="NIM">
                    <span class="text-danger e-nim"></span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" name="nama" id="nama"
                        aria-describedby="Nama Mahasiswa">
                    <span class="text-danger e-nama_mahasiswa"></span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" aria-describedby="Kelas">
                    <span class="text-danger e-kelas"></span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Matakuliah</label>
                    <input type="text" class="form-control" id="matakuliah" name="matakuliah" aria-describedby="Kelas">
                    <span class="text-danger e-matakuliah"></span>
                </div>
                <button type="button" class="btn btn-primary" onclick="store_data()">Simpan</button>
                <button type="button" onclick="show_table()" class="btn btn-primary">Kembali</button>
            </form>
        </div>
    </div>
</body>
<script src="{{ asset('assets/jquery/jqeury.js') }}"></script>
<script src="{{ asset('assets/bootstrap/dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/notiflix/dist/notiflix-3.2.7.min.js') }}"></script>
<script>
    $(document).ready(function () {
        show_table();
    });
    show_form = () => {
        $("#form").removeAttr("hidden");
        $("#table-data").attr("hidden", "true");
    }
    show_table = () => {
        Notiflix.Loading.hourglass();
        $("#table-data").removeAttr("hidden");
        $("#form").attr("hidden", "true");
        $.ajax({
            type: "GET",
            url: "{{ url('api/akademik') }}",
            dataType: "JSON",
            success: function (response) {
                let html;
                $.each(response.content, function (indexInArray, valueOfElement) { 
                     html+=` <tr>
                            <th scope="row">${indexInArray+1}</th>
                            <td>${valueOfElement.nim}</td>
                            <td>${valueOfElement.nama}</td>
                            <td>${valueOfElement.kelas}</td>
                            <td>${valueOfElement.matakuliah}</td>
                            <td>
                                <button class="btn btn-danger">Hapus</button></td>
                        </tr>`
                });
                $(".show-data").html(html);
                Notiflix.Loading.remove();
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                Notiflix.Loading.remove();
            }
        });
    }
    store_data = () => {
        $(".text-danger").text("");
        Notiflix.Loading.hourglass();
        let nim = $("#nim").val();
        let nama = $("#nama").val();
        let kelas = $("#kelas").val();
        let matakuliah = $("#matakuliah").val();
        $.ajax({
            type: "POST",
            url: '{{ url("api/akademik") }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                nim: nim,
                nama: nama,
                kelas: kelas,
                matakuliah: matakuliah
            },
            dataType: "JSON",
            success: function (response) {
                Notiflix.Loading.remove();
                if (response.status == 'success') {
                  $("#form-akademik").trigger("reset");
                  Notiflix.Report.success(
                        'Berhasil',
                        'Data berhasil disimpan',
                        'Okay',
                    );
                }else{
                    $.each(response.errors, function (indexInArray, valueOfElement) { 
                         $(".e-"+indexInArray).text(valueOfElement);
                    });
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                Notiflix.Loading.remove();
            }
        });
    }
</script>

</html>