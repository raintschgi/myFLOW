<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::all();

        return view("packages.index", compact("packages"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("packages.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "pa_product_name" =>   "required | string  |  min:2  |  max:25 ",
            "pa_default_quota" =>  "nullable | numeric |  min:1"
        ]);

        Package::create($data);

        return redirect("/packages")->with("success", "Produkt wurde erfolgreich hinzugefügt.");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $package = Package::where("pa_id", $id)->firstOrFail();
        
        return view("packages.edit", compact("package"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            "pa_product_name" =>   "required | string  |  min:2  |  max:25 ",
            "pa_default_quota" =>  "nullable | numeric |  min:1"
        ]);

        Package::where("pa_id", $id)->update($data);

        //logging - Simon - wird direkt auf der Datenbank geupdatet ohne das model mit einzubeziehen
        activity()
        ->performedOn(Package::find($id)) // Ziel
        ->withProperties($data) // aktualisierten Daten
        ->log('Kunde wurde aktualisiert'); // nachricht für das Log
        //####

        return redirect("/packages")->with("success", "Produkt wurde erfolgreich bearbeitet.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = Package::where("pa_id", $id)->firstOrFail();
        
        $package->delete();

        return redirect("/packages")-> with("success", "Produkt wurde erfolgreich gelöscht.");
    }
}
