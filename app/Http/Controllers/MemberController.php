<?php

namespace App\Http\Controllers;

use App\Models\MemberCrud;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberCrud = MemberCrud::all();
       

        return view('member.index',compact('memberCrud'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama'=> 'required',
            'link'=> 'required',
            'image'=> 'required|image',
            'status' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $imageName = time() . "_" . $image->getClientOriginalName(); // Menggunakan timestamp untuk nama file
            $image->move(public_path('image'), $imageName);
            $input['image'] = $imageName;
        }

        MemberCrud::create($input);

        return redirect('/member')->with('message','data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(MemberCrud $memberCrud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd('tes', $id);
        $memberCrud = MemberCrud::find($id);
        return view('member.edit', compact('id', 'memberCrud'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'link' => 'required',
            'image' => 'image',
            'status' => 'required',
        ]);
    
        $memberCrud = MemberCrud::find($id);
        $input = $request->all();
    
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            $oldImagePath = public_path('image/' . $memberCrud->image);
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
    
        $memberCrud->update($input);
    
        return redirect('/member')->with('message', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $memberCrud = MemberCrud::find($id);
        $memberCrud->delete();

        return redirect()->route('member.index');
    }
}
