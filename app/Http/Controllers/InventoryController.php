<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response = Http::get('http://localhost/?allPrint');
            $listResponse = json_decode($response);
            $html = '';
            
            foreach ($listResponse as $key => $value) {
                $html .= '<tr>';
                $html .= '<td>'.$value->id.'</td>';
                $html .= '<td>'.$value->serial.'</td>';
                $html .= '<td>'.$value->marca.'</td>';
                $html .= '<td><a href="'. route('inventory.show', [$value->id]) . '"><i class="bi bi-pencil-square"></i></a></td>';
                $html .= '</tr>';
            }

            return view('inventory', ['tableInventory' => $html]);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $serial = $request->input('serial');
            $marca  = $request->input('marca');

            $response = Http::post('http://localhost/', [
                'serial' => $serial,
                'marca' => $marca
            ]);

            return to_route('inventory.index');
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $response = Http::get('http://localhost/?id_inventario='.$id);

            return view('editInventory', ['inventory' => $response]);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
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
        try {
            $serial = $request->input('serial');
            $marca  = $request->input('marca');

            $response = Http::put('http://localhost/', [
                'id_inventario' => $id,
                'serial' => $serial,
                'marca' => $marca
            ]);

            return to_route('inventory.show', [$id]);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $response = Http::delete('http://localhost/?id_inventario='.$id);

            return to_route('inventory.index');
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }
}
