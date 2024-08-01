@extends('layouts.app')

@section('title','Ubah Data Member')

@section('content')
    <div class="container">
        <a href="/member" class="btn btn-primary mb-2">Kembali</a>
        <div class="row">
            <div class="col-md-12">
                <form enctype="multipart/form-data" method="POST" action="{{ route('member.update', $id) }}">
                    @method('PUT')
                @csrf
            
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" placeholder="input nama" name="nama" value="{{$memberCrud->nama}}">
                    </div>

                    @error('title')
                    <small style="color: red">{{$message}}</small>
                    @enderror
                    

                    <div class="form-group">
                        <label for="">link</label>
                        <input type="text" class="form-control" placeholder="input link" name="link" value="{{$memberCrud->link}}">
                        
                    </div>

                    @error('link')
                    <small style="color: red">{{$message}}</small>
                    @enderror
                    <img src="/image/{{$memberCrud->image}}" class="img-fluid" alt="" style="max-width: 100px">
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image"  >
                    </div>

                    @error('image')
                    <small style="color: red">{{$message}}</small>
                    @enderror

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="dosen" {{$memberCrud->status == 'dosen' ? 'selected' : ''}}>Dosen</option>
                            <option value="mahasiswa" {{$memberCrud->status == 'mahasiswa' ? 'selected' : ''}}>Mahasiswa</option>
                        </select>
                    </div>

                    @error('status')
                    <small style="color: red">{{$message}}</small>
                    @enderror

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                    </div>

                </form>
            </div>
        </div>
        
    </div>
@endsection
    