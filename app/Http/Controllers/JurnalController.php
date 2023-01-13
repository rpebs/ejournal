<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Kategori;
use App\Models\Penerbit;
use Exception;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class JurnalController extends Controller
{
    public function index()
    {
        $data = Jurnal::all();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();

        return view('admin.jurnal', ['title' => 'Jurnal', 'data' => $data, 'kategori' => $kategori, 'penerbit' => $penerbit]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'judul' => 'required',
            'slug' => '',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
            'penulis' => 'required',
            'volume' => 'required',
            'tahun_terbit' => 'required',
            'link' => 'required'
        ]);

        $validate['slug'] =  SlugService::createSlug(Jurnal::class, 'slug', request('judul'));

        try {
            Jurnal::create($validate);
            return back()->with('success', 'Data Berhasil Ditambah');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }

    public function delete($id)
    {
        try {
            Jurnal::destroy($id);
            return back()->with('success', 'Data Berhasil Dihapus');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }
}
