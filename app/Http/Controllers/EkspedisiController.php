<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\session;
use Illuminate\support\facades\DB;
use App\tblEkspedisi;
use DataTables;

class EkspedisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = DB::table('tblEkspedisi')->orderby('id_ekspedisi')->get();
        return view('ekspedisi.index');
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dataTable() {
        $model = DB::table('tblEkspedisi')
            ->select('id_ekspedisi', 'kode_ekspedisi', 'nama_ekspedisi', DB::raw('(CASE WHEN is_active = 1 THEN "YES" ELSE "NO" END) AS is_active'), 'create_by', 'create_on', 'update_by', 'update_on')->get();
            
        return DataTables::of($model)
        ->addColumn('action', function ($model) {
            return '<a href="/ekspedisi/' . $model->id_ekspedisi . '/edit" id="btn-edit" class="btn btn-sm btn-primary" role="button"><span><i class="fas fa-edit"></i></span> EDIT</a>';                    
        })->make(true);
    }
}
