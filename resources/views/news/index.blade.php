@extends('layouts.app')

@section('title','Data Berita')

@section('content')
    <div class="container">
        <a href="/news/create" class="btn btn-primary mb-2">Tambah Data</a>
        @if ($message = Session::get('message'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <div class="table-responsive">  
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Image</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($newscrud as $crud)
                       
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$crud->title}}</td>
                            <td>{{$crud->description}}</td>
                            <td><img src="/image/{{$crud->image}}" alt="Image" class="image-fluid" style="max-width: 100px"></td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('news.edit', ['news' => $crud->id]) }}">edit</a>
                                <form action="{{route('news.destroy',['news'=>$crud->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">hapus</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
    