<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Http\Service\BarangInterface;

class BarangController extends Controller
{

    private $barangI;

    public function __construct(BarangInterface $barangInterface)
    {
        $this->barangI = $barangInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( BarangInterface $barangI )
    {
        return response()->json([
            'code'      => 200,
            'status'    => true,
            'data'      => $barangI->findAll(),
            'message'   => 'Success'
        ], 200);

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
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {
        return response()->json([
            'code'      => 200,
            'status'    => true,
            'data'      => $this->barangI->store($request),
            'message'   => 'Success'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, $id)
    {
        return response()->json([
            'code'      => 200,
            'status'    => true,
            'data'      => $this->barangI->update($id, $request),
            'message'   => 'Success'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json([
            'code'      => 200,
            'status'    => true,
            'data'      => $this->barangI->delete($id),
            'message'   => 'Success'
        ], 200);
    }
}
