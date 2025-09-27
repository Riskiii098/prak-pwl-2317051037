<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Kelas;
Use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index(){
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser()
    ];
    return view('list_user', $data);
    }
    public function create(){
        $kelasModel = new Kelas();
        $Kelas = $kelasModel->getKelas();
        $data = [
            'title' => 'Create User',
            'kelas' => $Kelas
        ];

        return view('create_user', $data);
    }

    public function store(Request $request){
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'nim' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        return redirect()->to('/user');
    }
}
