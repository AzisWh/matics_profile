<?php

namespace App\Http\Controllers;

use App\Models\NewsCrud;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newscrud = NewsCrud::all();
       

        return view('news.index',compact('newscrud'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'image'=> 'required|image',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $imageName = time() . "_" . $image->getClientOriginalName(); // Menggunakan timestamp untuk nama file
            $image->move(public_path('image'), $imageName);
            $input['image'] = $imageName;
        }

        NewsCrud::create($input);

        return redirect('/news')->with('message','data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $newsCrud = NewsCrud::findOrFail($id);

        // Ambil semua data berita kecuali yang sedang ditampilkan
        $otherNews = NewsCrud::where('id', '!=', $id)->get();
        return view('home.detail',compact('id','newsCrud','otherNews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd('tes', $id);
        $newsCrud = NewsCrud::find($id);
        return view('news.edit', compact('id', 'newsCrud'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'image',
    ]);

    $newsCrud = NewsCrud::find($id);
    $input = $request->all();

    if ($request->hasFile('image')) {
        // Hapus gambar lama
        $oldImagePath = public_path('image/' . $newsCrud->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

        // Upload gambar baru
        $image = $request->file('image');
        $destinationPath = 'image';
        $imageName = date('Ymd') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $imageName);
        $input['image'] = $imageName;
    }

    $newsCrud->update($input);

    return redirect('/news')->with('message', 'Data berhasil diupdate');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $newsCrud = NewsCrud::find($id);
        $newsCrud->delete();

        return redirect()->route('news.index');
    }
}
