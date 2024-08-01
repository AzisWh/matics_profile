@extends('layouts.app')

@section('title','Data Berita')

@section('content')
    <div class="container">
        <a href="/news" class="btn btn-primary mb-2">Kembali</a>
        <div class="row">
            <div class="col-md-12">
                <form enctype="multipart/form-data" method="POST" action="{{route('news.store')}}">
                @csrf
            
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" placeholder="input judul" name="title">
                    </div>

                    @error('title')
                    <small style="color: red">{{$message}}</small>
                    @enderror
                    

                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="description" class="form-control" placeholder="deskripsi" cols="30" rows="10"></textarea>
                    </div>

                    @error('description')
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
                        <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                    </div>

                </form>
            </div>
        </div>
        
    </div>
@endsection
    