<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    Public function index(){
        $productos = Productos::all();
        return view('productos.index', compact('productos'));
    }

    public function create(){
        return view('productos.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required',
            'precio'=>'required', 
            'cantidad' => 'required',
        ]);
        Producto::create($request->all());
        return redirect()->route('productos.index');
    }

    public function edit(){
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto){
        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required',
            'precio'=>'required', 
            'cantidad' => 'required',
        ]);

        $producto->update($request->all());
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto){
        $producto->delete();
        return redirect()->route('productos.index');
    }
    

}
