<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        
        return view("customers.index", compact("customers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("customers.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "cu_firstname"     =>  "nullable | string  |  min:1 |  max:25 ",
            "cu_lastname"      =>  "nullable | string  |  min:1 |  max:25 ",
            "cu_street"        =>  "nullable | string  |  min:1 |  max:40 ",
            "cu_zip"           =>  "nullable | string  |  min:1 |  max:10 ",
            "cu_city"          =>  "nullable | string  |  min:1 |  max:30 ",
            "cu_country"       =>  "nullable | string  |  min:1 |  max:30 ",
            "cu_email"         =>  "email:filter | required",
            "cu_uid"           =>  "nullable | string  |  min:1 |  max:20 ",
        ]);

        // Verarbeitung der Checkboxen
        $data = $request->all();
        $data['cu_is_reseller'] = $request->has('cu_is_reseller');
        $data['cu_is_maintainer'] = $request->has('cu_is_maintainer');

        Customer::create($data);

        return redirect("/customers")->with("success", "Kunde wurde erfolgreich hinzugefügt.");
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
        $customer = Customer::where("cu_id", $id)->firstOrFail();

        return view("customers.edit", compact("customer")); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "cu_firstname"     =>  "nullable | string  |  min:1 |  max:25 ",
            "cu_lastname"      =>  "nullable | string  |  min:1 |  max:25 ",
            "cu_street"        =>  "nullable | string  |  min:1 |  max:40 ",
            "cu_zip"           =>  "nullable | string  |  min:1 |  max:10 ",
            "cu_city"          =>  "nullable | string  |  min:1 |  max:30 ",
            "cu_country"       =>  "nullable | string  |  min:1 |  max:30 ",
            "cu_email"         =>  "email:filter | required",
            "cu_uid"           =>  "nullable | string  |  min:1 |  max:20 ",
        ]);

        // Verarbeitung der Checkboxen
        $data = $request->except(['_token', '_method']);

        $data['cu_is_reseller'] = $request->has('cu_is_reseller');
        $data['cu_is_maintainer'] = $request->has('cu_is_maintainer');

        Customer::where("cu_id", $id)->update($data);

        //logging - Simon - wird direkt auf der Datenbank geupdatet ohne das model mit einzubeziehen
        activity()
        ->performedOn(Customer::find($id)) // Das Zielobjekt der Aktivität
        ->withProperties($data) // Die Daten, die aktualisiert wurden
        ->log('Kunde wurde aktualisiert'); // Die Nachricht, die im Log erscheinen soll
        //####

        return redirect("/customers")->with("success", "Kunde wurde erfolgreich bearbeitet.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $custumer = Customer::where("cu_id", $id)->firstOrFail();
        
        $custumer->delete();

        return redirect("/customers")-> with("success", "Kunde wurde erfolgreich gelöscht.");
    }
}
