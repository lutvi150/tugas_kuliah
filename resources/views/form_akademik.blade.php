<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data NIM</title>
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/style/css.css') }}">
</head>

<body>
  <div class="container">
    <div class="col-md-12" id="table-data">
      <div class="col-md-12 text-center">
      <h1>Data Akademik</h1>
      </div>
      <div class="col-md-12">
      <table class="table">
        <button class="btn btn-primary btn-xs" onclick="show_form()" >Tambah Data</button>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">NIM</th>
            <th scope="col">NAMA</th>
            <th scope="col">KELAS</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
   <div class="col-md-12" id="form" hidden="true">
    <form>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">NIM</label>
        <input type="number" class="form-control" name="nim" id="nim" aria-describedby="NIM">
        <span class="text-danger e-nim">text</span>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Mahasiswa</label>
        <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" aria-describedby="Nama Mahasiswa">
        <span class="text-danger e-nama_mahasiswa">text</span>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kelas</label>
        <input type="text" class="form-control" id="kelas" name="kelas" aria-describedby="Kelas">
        <span class="text-danger e-kelas">text</span>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Matakuliah</label>
        <input type="text" class="form-control" id="matakuliah" name="matakuliah" aria-describedby="Kelas">
        <span class="text-danger e-matakuliah">text</span>
      </div>
      <button type="button" class="btn btn-primary">Simpan</button>
      <button type="button" onclick="show_table()" class="btn btn-primary">Kembali</button>
    </form>
   </div>
  </div>
</body>
<script src="{{ asset('assets/jquery/jqeury.js') }}"></script>
<script src="{{ asset('assets/bootstrap/dist/js/bootstrap.js') }}"></script>
<script>
  show_form=()=>{
    $("#form").removeAttr("hidden");
    $("#table-data").attr("hidden","true");
  }
  show_table=()=>{
    $("#table-data").removeAttr("hidden");
    $("#form").attr("hidden","true");
  }
  store_data=()=>{
    let nim=$("#nim").val();
    let nama_mahasiswa=$("#nama_mahasiswa").val();
    let kelas=$("#kelas").val();
    let matakuliah=$("#matakuliah").val();
    $.ajax({
      type: "POST",
      url: "url",
      data: {nim:nim,nama_mahasiswa:nama_mahasiswa,kelas:kelas,matakuliah:matakuliah},
      dataType: "JSON",
      success: function (response) {
        
      }
    });
  }
</script>
</html>