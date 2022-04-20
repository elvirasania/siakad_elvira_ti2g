<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left mt-2">
      <h5>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h5>
      <br>
      <h6 class="text-center">KARTU HASIL STUDI (KHS)</h6>
    </div>
  </div>
</div>

<div class="container">
  <p><b>Nama : </b> {{ $nilai->mahasiswa->nama }}</p>
  <p><b>NIM : </b> {{ $nilai->mahasiswa->nim }}</p>
  <p><b>Kelas : </b> {{ $nilai->mahasiswa->kelas->nama_kelas }}</p>
  <table class="table table-bordered">
    <tr>
      <th>Matakuliah</th>
      <th>SKS</th>
      <th>Semester</th>
      <th>Nilai</th>
    </tr>
    @if(!empty($nilai) && $nilai->count())
      @foreach($nilai as $row)
        <tr>
          <td>{{ $row->matakuliah->nama_matkul }}</td>
          <td>{{ $row->matakuliah->sks }}</td>
          <td>{{ $row->matakuliah->semester }}</td>
          <td>
            @if ($row->nilai <= 100 && $row->nilai >= 85)
              A
            @elseif ($row->nilai <= 84 && $row->nilai >= 75)
              B
            @elseif ($row->nilai <= 74 && $row->nilai >= 60)
              C
            @elseif ($row->nilai <= 59 && $row->nilai >= 48)
              D
            @else
              E
            @endif
          </td>
        </tr>
      @endforeach
    @else
      <tr>
        <td class="text-center" colspan="10">There are no data.</td>
      </tr>
    @endif
  </table>
</div>
</body>
</html>