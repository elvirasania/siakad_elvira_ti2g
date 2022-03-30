@extends('mahasiswa.layout')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left mt-2">
      <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
    </div>
    <div class="float-right my-2">
      <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
    </div>
  </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-error">
  <p>{{ $message }}</p>
</div>
@endif

<form method="GET" action="/cari">
  <div class="form-group">
    <label for="cari">Cari</label>
    <input type="text" name="cari" class="form-control" id="cari" aria-describedby="cari" >
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary btn-sm">Cari</button>
  </div>
</form>

<table class="table table-bordered">
  <tr>
    <th>Nim</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Jurusan</th>
    <th width="280px">Action</th>
  </tr>
  @if(!empty($mahasiswa) && $mahasiswa->count())
    @foreach($mahasiswa as $mhs)
      <tr>
        <td>{{ $mhs->nim }}</td>
        <td>{{ $mhs->nama }}</td>
        <td>{{ $mhs->kelas }}</td>
        <td>{{ $mhs->jurusan }}</td>

        <td>
          <form action="{{ route('mahasiswa.destroy',['mahasiswa'=>$mhs->nim]) }}" method="POST">
            <a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->nim) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mhs->nim) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  @else
    <tr>
      <td colspan="10">There are no data.</td>
    </tr>
  @endif
</table>

{!! $mahasiswa->links() !!}
@endsection