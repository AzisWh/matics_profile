@extends('layouts.app')

@section('title','Data Member')

@section('content')
    <div class="container">
        <a href="/member/create" class="btn btn-primary mb-2">Tambah Data</a>
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
                        <th>Nama</th>
                        <th>Link</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($memberCrud as $crud)
                       
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$crud->nama}}</td>
                            <td><a target="_blank" href="{{$crud->link}}">{{$crud->link}}</a></td>
                            <td><img src="/image/{{$crud->image}}" alt="Image" class="image-fluid" style="max-width: 100px"></td>
                            <td>{{$crud->status}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('member.edit', ['member' => $crud->id]) }}">edit</a>
                                <form action="{{route('member.destroy',['member'=>$crud->id])}}" method="POST">
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