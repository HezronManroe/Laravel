<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\BarangInterface;
class HomeController extends Controller
{

    private $barangI;

    public function __construct(BarangInterface $barangInterface)
    {
        $this->middleware('auth');
        $this->barangI = $barangInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('cart',[
            'barangs' => $this->barangI->findAll()
        ]);
    }
}
