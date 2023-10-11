<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class ProductoController extends Controller
{

    public function index()
    {
        $datos = DB::select('select * from productos');
        return view('index')->with('datos', $datos);
    }

    public function create(Request $request)
    {
        try {
            $sql = DB::insert("INSERT INTO productos (id, nombre, precio, cantidad) VALUES (?, ?, ?, ?)", [
                $request->id,
                $request->nombre,
                $request->precio,
                $request->cantidad,
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql) {
            return back()->with("Correcto", "Producto agregado correctamente");
        } else {
            return back()->with("Incorrecto", "Error al registrar");
        }
    }


    public function update(Request $request)
    {
        try {
            $sql = DB::update("UPDATE productos set nombre=?, precio=?, cantidad=? where id=?", [
                $request->nombre,
                $request->precio,
                $request->cantidad,
                $request->id, // Asegúrate de que estás pasando el ID correspondiente
            ]);
            if ($sql === 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql) {
            return back()->with("Correcto", "Producto modificado correctamente");
        } else {
            return back()->with("Incorrecto", "Error al modificar");
        }
    }

    public function delete($id)
    {
        try {
            $sql = DB::delete("DELETE FROM productos WHERE id = ?", [$id]);
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql) {
            return back()->with("Correcto", "Producto eliminado correctamente");
        } else {
            return back()->with("Incorrecto", "Error al eliminar el producto");
        }
    }
}
