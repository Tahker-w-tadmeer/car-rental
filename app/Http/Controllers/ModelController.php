<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelController extends Controller
{

    public function create()
    {
        $brands = collect(DB::select("SELECT * FROM brands order by name asc"))
            ->mapWithKeys(fn($brand) => [$brand->id => $brand->name]);

        return view('models.create', compact("brands"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'nullable|exists:brands,id',
            'brand' => 'required_if:brand_id,null',
            'name' => 'required|unique:models,name',
        ]);

        $brandId = $request->get("brand_id");

        if($request->get("brand") && ($brandId === null || $brandId === "" )) {
            DB::insert("INSERT INTO brands (name) VALUES (?)", [
                $request->brand,
            ]);

            $brandId = DB::getPdo()->lastInsertId();
        }

        DB::insert("INSERT INTO models (brand_id, name) VALUES (?, ?)", [
            $brandId,
            $request->name,
        ]);

        session()->flash('success', 'Model created successfully!');

        return redirect()->route('cars.create');
    }
}
