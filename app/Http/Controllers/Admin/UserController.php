<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $m_user)
    {
        // LISTING DATA USER
        $user = $m_user->datatables();
        // dd($user);

        $data = [
            'title' => 'Data User',
            'user'  => $user
        ];
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // FORM TAMBAH DATA USER
        $data = [
            'title' => 'Tambah Data Pengguna'
        ];
        return view('admin.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        // Validasi
        $validated = $request->validated();

        // Upload file
        $file_name = '';
        if($request->hasFile('foto'))
        {
            // $upload_file = $request->file('foto');
            $path_file = $request->file('foto')->store('assets/uploads/images', 'public');
            $file_name = basename($path_file);
        }

        $data = [
            'username'  => $request->username,
            'nama'      => $request->nama,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => $request->role,
            'status'    => $request->status,
            'foto'      => $file_name,
        ];
        User::create($data);
        
        return redirect()->route('admin.user')->with(['success' => 'Data berhasil di tambah']);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
