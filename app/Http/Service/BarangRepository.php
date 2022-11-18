<?php

namespace App\Http\Service;
use \App\Models\Barang;

class BarangRepository implements BarangInterface 
{
    public $barang;

    public function __construct(Barang $barang)
    {
        $this->barang = $barang;
    }

    public function findAll(){
        return $this->barang->get();
    }

    public function findById($id){

    }

    public function store($request){
        $this->barang->code = $request->code;
        $this->barang->name = $request->name;
        $this->barang->amount = $request->amount;
        $this->barang->save();
    }

    public function update($id, $request){
        $this->barang = $this->barang->find($id);
        $this->barang->code = $request->code;
        $this->barang->name = $request->name;
        $this->barang->amount = $request->amount;
        $this->barang->save();
    }

    public function delete($id){
        return $this->barang->find($id)->delete();
    }


}
