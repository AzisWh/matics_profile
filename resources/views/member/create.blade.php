@extends('layouts.app')

@section('title','Data Member')

@section('content')
    <div class="container">
        <a href="/member" class="btn btn-primary mb-2">Kembali</a>
        <div class="row">
            <div class="col-md-12">
                <form enctype="multipart/form-data" method="POST" action="{{route('member.store')}}">
                @csrf
            
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" placeholder="input nama" name="nama">
                    </div>

                    @error('title')
                    <small style="color: red">{{$message}}</small>
                    @enderror
                    

                    <div class="form-group">
                        <label for="">Link</label>
                        <input type="text" class="form-control" placeholder="input link" name="link">
                    </div>

                    @error('link')
                    <small style="color: red">{{$message}}</small>
                    @enderror

                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image" >
                    </div>

                    @error('image')
                    <small style="color: red">{{$message}}</small>
                    @enderror

                    <div class="form-group">
                        <label for="">Status</label>
                        <select class="form-control" name="status">
                            <option value="dosen">Dosen</option>
                            <option value="mahasiswa">Mahasiswa</option>
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
    