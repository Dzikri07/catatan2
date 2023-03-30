<?php

namespace App\Http\Controllers;

use App\Imports\catatanImport;
use App\Models\catatan;
use App\Http\Requests\StoreCatatanRequest;
use App\Http\Requests\UpdateCatatanRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CatatanExport;
use App\Http\Requests;

class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['catatan'] = catatan::get();
        return view('catatan.index')->with($data);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCatatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCatatanRequest $request)
    {
        
        
        $data = Catatan::create($request->all());
        if($request->hasFile('foto')) {
            $request->file('foto')->move('fotoPerjalanan/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('catatan')->with('success','foto berhasil ditambahkan!');
    
    }


    public function show(catatan $catatan)
    {
        //
    }


    public function edit(catatan $catatan)
    {
        //
    }

    
    public function update(UpdateCatatanRequest $request, catatan $catatan)
    {
        $catatan->update($request->all());

        return redirect('catatan')->with('success', 'Data Berhasil Diupdate..!');
    }

    
    public function destroy(catatan $catatan)
    {
        $catatan->delete();

        return redirect('catatan')->with('success', 'Data berhasil dihapus!');
    }

    public function exportData(){
        $date = date('Y-m-d');
        return Excel::download(new CatatanExport, $date.'_absenKaryawan.xlsx');
    }

    public function importData(){
        Excel::import(new CatatanImport, request()->file('import'));
        return redirect(request()->segment(1).'/catatan')->with('success','import data karyawan selesai');
    }

    //print
    public function prnpriview()
    {
          $catatan = Catatan::all();
          return view('catatan')->with('catatan', $catatan);;
    }
    
    public function cetak(){
        $data['catatan'] = Catatan::get();
        return view('catatan.cetak')->with($data);
    }

    public function tambah(){
        $data['catatan'] = catatan::get();
        return view('catatan.tambah')->with($data);
    }

}
