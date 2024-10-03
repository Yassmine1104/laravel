<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categories=Categorie::all();
            return response()->json($categories);
        }
        catch (\exception $e){
            return response()->json("probleme de récupération des catégories");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $categorie=new categorie([
                "nomcategories"=>$request->input("nomcategorie"),
                "imagecategorie"=>$request->input("imagecategorie")
            ]);
            $categorie->save();
            return response()->json($categorie);
          }
            catch(\exception $e){
            return response()->json("probleme creation categories");
        
    }
    }
    /**
     * Display the specified resource.
     */
    public function show ($id)
    {
        try{
            $categorie=Categorie::findOrFail($id);
            return response()->json($categorie);

        }catch (\Exception $e){
         return response()->json($e->getMessage());
    }
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    try {
    $categorie=Categorie::findorFail($id);
    $categorie->update($request->all());
    return response()->json($categorie);
    } catch (\Exception $e) {
    return response()->json("probleme de modification");
    }
    }
    
    public function destroy($id)
    {
    try {
    $categorie=Categorie::findOrFail($id);
    $categorie->delete();
    return response()->json("catégorie supprimée avec succes");
    } catch (\Exception $e) {
    return response()->json("probleme de suppression de catégorie");
    }
    }
    }