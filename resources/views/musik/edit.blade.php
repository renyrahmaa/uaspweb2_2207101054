@extends('layouts.app')

@section('content')
    <div class="container">

        <h3>Edit Data Mahasiswa</h3>
        <form action="{{ url('/musik/' . $row->id_alat) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="mb-3 w-50">
                <label>NO ALAT</label>
                <input type="text" class="form-control" name="no_alat" value="{{ $row->no_alat }}">
            </div>
            <div class="mb-3 w-50">
                <label>NAMA ALAT MUSIK</label>
                <input type="text" class="form-control" name="nama_alat" value="{{ $row->nama_alat }}">
            </div>
            <div class="mb-3 w-50">
                <label>MERK</label>
                <input type="text" class="form-control" name="merk_alat" value="{{ $row->merk_alat }}">
            </div>
            <div class="mb-2 w-50">
                <label>JENIS</label>
                <select class="form-control" name="jenis" value="{{ $row->jenis }}">
                    <option value="Akustik">Akustik</option>
                    <option value="Elektrik">Elektrik</option>
                    
                </select>
            </div>
            <div class="mb-3 w-50">
                <label>HARGA</label>
                <textarea class="form-control" name="harga" value="{{ $row->harga }}"></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" value="UPDATE">
            </div>
        </form>
    </div>
@endsection
