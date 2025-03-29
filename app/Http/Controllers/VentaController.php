<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    Public function index(){
        $ventas = Ventas::all();
        return view('ventas.index', compact('ventas'));
    }

    public function create(){
        return view('ventas.create');
    }

    public function store(Request $request){
        $request->validate([
            'fecha'=>'required',
            'producto_id'=>'required',
            'total'=>'required', 
        ]);
        Venta::create($request->all());
        return redirect()->route('ventas.index');
    }

    public function edit(){
        return view('ventas.edit', compact('venta'));
    }

    public function update(Request $request, Venta $venta){
        $request->validate([
            'fecha'=>'required',
            'producto_id'=>'required',
            'total'=>'required', 
        ]);

        $venta->update($request->all());
        return redirect()->route('ventas.index');
    }

    public function destroy(Venta $venta){
        $venta->delete();
        return redirect()->route('venta.index');
    }
}
