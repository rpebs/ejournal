<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Exception;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::all();
        return view('admin.kategori', ['title' => 'Kategori', 'data' => $data]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required|unique:kategori'
        ]);

        try {
            Kategori::create($validate);
            return back()->with('success', 'Data Berhasil Ditambah');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }

    public function edit(Request $request)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required'
        ]);

        try {
            $data = Kategori::where('id', $request->id)->update($validate);
            return back()->with('success', 'Data Berhasil Diubah');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }

    public function delete($id)
    {
        try {
            Kategori::destroy($id);
            return back()->with('success', 'Data Berhasil Dihapus');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }
}
