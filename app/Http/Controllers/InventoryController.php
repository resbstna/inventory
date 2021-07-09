<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = 1;
        $inventory=[];
        $data = DB::table('inventories')->get();
            foreach($data as $row){
                $inventory[] = [$a,$row->nama_barang,$row->kode_barang,$row->jumlah_barang,$row->tanggal,'<a href="/edit-inventory/'. $row->id .'" class="btn btn-outline-primary btn-ls btn-icon"><i class="fal fa-edit"></i></a> 
                <button onclick="hapus('.$row->id. ')" class="btn btn-outline-primary btn-ls btn-icon" target="_blank"><i class="fal fa-trash"></i></button>'];
            }
	return response([ 'data' => $inventory], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $inventory = Inventory::create($data);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = DB::table('inventories')->where('id',$id)->get();
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('inventories')->where('id',$request->id)->update([
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kode_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'tanggal' => $request->tanggal
        ]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
      $hapus =  DB::table('inventories')->where('id',$id)->delete();
        return response($hapus);
    }
}
