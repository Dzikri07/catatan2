<?php

namespace App\Http\Controllers;

use App\Models\laporanBug;
use App\Http\Requests\StorelaporanBugRequest;
use App\Http\Requests\UpdatelaporanBugRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanBugExport;
use App\Imports\LaporanBugImport;

class LaporanBugController extends Controller
{
    public function index(){
        $data['LaporanBug'] = LaporanBug::get();
        return view('LaporanBug.index')->with($data);}
    public function store(StoreLaporanBugRequest $request){
        LaporanBug::create($request->all());
        return redirect('LaporanBug')->with('success','Data LaporanBug Berhasil Ditambahkan..!');}
    public function update(UpdateLaporanBugRequest $request, LaporanBug $LaporanBug){
        $LaporanBug->update($request->all());
        return redirect('LaporanBug')->with('success', 'Data Berhasil Diupdate..!');}
    public function destroy(LaporanBug $LaporanBug){
        $LaporanBug->delete();
        return redirect('LaporanBug')->with('success', 'Data berhasil dihapus!');}
    public function exportData(){
        $date = date('Y-m-d');
        return Excel::download(new LaporanBugExport, $date.'_LaporanBugAplikasi.xlsx');}
    public function importData(){
        Excel::import(new LaporanBugImport, request()->file('import'));
        return redirect('LaporanBug')->with('success','import data laporan selesai');}}
