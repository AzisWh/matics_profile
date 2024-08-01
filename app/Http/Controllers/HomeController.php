<?php

namespace App\Http\Controllers;

use App\Models\MemberCrud;
use App\Models\NewsCrud;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $newscrud = NewsCrud::all();
        $dosenMembers = MemberCrud::where('status', 'dosen')->get();
        $mahasiswaMembers = MemberCrud::where('status', 'mahasiswa')->get();
        return view('home.index',compact('newscrud','dosenMembers','mahasiswaMembers'));
    }
    public function detail(){
        $newscrud = NewsCrud::all();
        return view('home.detail',compact('newscrud'));
    }
    
}
