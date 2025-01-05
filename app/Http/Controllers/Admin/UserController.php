<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
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
    public function edit(User $m_user, $id)
    {
        //
        $user   = $m_user->detail($id);
        $data = [
            'title' => 'Edit Data Pengguna',
            'user'  => $user
        ];
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $m_user, $id)
    {
        // Detail User
        $user = $m_user->detail($id);

        // Validasi
        $validated = $request->validated();
        // dd($validated);

        // Upload file
        $file_name = $user->foto;
        if($request->hasFile('foto'))
        {
            $upload_file    = $request->file('foto');
            $path_file      = './storage/assets/uploads/images/' . $user->foto;
            // dd($path_file);

            if(!empty($file_name) && file_exists($path_file))
            {
                unlink($path_file);
            }

            $path_file = $request->file('foto')->store('assets/uploads/images', 'public');
            $file_name = basename($path_file);
        }

        $data = [
            'username'  => $request->username,
            'nama'      => $request->nama,
            'email'     => $request->email,
            'role'      => $request->role,
            'status'    => $request->status,
            'foto'      => $file_name,
        ];
        User::where('id', $id)->update($data);
        
        return redirect()->route('admin.user')->with(['success' => 'Data berhasil di update.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $m_user, $id)
    {
        // User
        $user = User::find($id);

        if(is_null($user))
        {
            return redirect()->route('admin.user')->with(['danger' => 'Data tidak ditemukan.']);
        }

        try {
            $file_name  = $user->foto;
            $path_file  = './storage/assets/uploads/images/' . $user->foto;
            // dd($path_file);

            // CEK FOTO
            if(!empty($file_name) && file_exists($path_file))
            {
                // HAPUS FOTO
                unlink($path_file);
            }

            // HAPUS DATA USER
            $user->delete();
        }
        catch (Exception $e) {
            return redirect()->route('admin.user')->with(['warning' => 'Oops! Data tidak dapat di hapus karena telah di gunakan pada modul lain.']);
        }

        return redirect()->route('admin.user')->with(['success' => 'Data berhasil di hapus.']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function password(UpdatePasswordRequest $request, User $m_user, $id)
    {
        // Detail User
        $user = $m_user->detail($id);

        // Validasi
        $validated = $request->validated();
        // dd($validated);

        $data = [
            'password'  => Hash::make($request->password),
        ];
        User::where('id', $id)->update($data);
        
        return redirect()->route('admin.user')->with(['success' => 'Data berhasil di update.']);
    }
}
