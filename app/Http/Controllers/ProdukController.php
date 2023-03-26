<?php

namespace App\Http\Controllers;

use App\Imports\ProdukImport;
use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProdukExport;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['produk'] = Produk::get();
        return view('produk.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdukRequest $request)
    {
        Produk::create($request->all());

        return redirect('produk')->with('success','Data Produk Berhasil Ditambahkan..!');
    }
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        $produk->update($request->all());

        return redirect('produk')->with('success', 'Data Berhasil Diupdate..!');
    }

    
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect('produk')->with('success', 'Data berhasil dihapus!');
    }

    public function exportData(){
        $date = date('Y-m-d');
        return Excel::download(new ProdukExport, $date.'_absenKaryawan.xlsx');
    }

    public function importData(){
        Excel::import(new ProdukImport, request()->file('import'));
        return redirect('produk')->with('success','import data karyawan selesai');
    }
}
