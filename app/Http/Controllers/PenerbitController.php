<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Exception;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $data = Penerbit::all();
        return view('admin.penerbit', ['title' => 'Penerbit', 'data' => $data]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'penerbit' => 'required|unique:penerbit',
        ]);

        try {
            Penerbit::create($validate);
            return back()->with('success', 'Data Berhasil Ditambah');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }

    public function edit(Request $request)
    {
        $validate = $request->validate([
            'penerbit' => 'required|unique:penerbit',
        ]);

        try {
            Penerbit::where('id', $request->id)->update($validate);
            return back()->with('success', 'Data Berhasil Diubah');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }

    public function delete($id)
    {
        try {
            Penerbit::destroy($id);
            return back()->with('success', 'Data Berhasil Dihapus');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }
}
