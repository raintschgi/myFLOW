<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Web;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $webs = Web::all();

        return view("webs.index", compact("webs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $web = Web::where("we_user", $id)->firstOrFail();

        return view("webs.edit", compact("web")); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "we_user"                   =>  "required | string  |  min:1 |  max:25 ",
            "we_server"                 =>  "required | string  |  min:1 |  max:40 ",
            "we_internal_hostaddress"   =>  "required | string  |  min:1 |  max:40 ",
            "we_maintained_by"          =>  "required | string  |  min:1 |  max:40 ",
            "we_quota"                  =>  "required | numeric |  min:1",
            "we_php_vers"               =>  "required | string  |  min:1 |  max:10 ",
            "we_online_since"           =>  "nullable | date",
            "we_comment"                =>  "nullable | string  |  min:1",
            // Fremdschlüssel
            "pa_id"                     =>  "required | string  |  min:1"
        ]);

        // Verarbeitung der Checkbox
        $data = $request->except(['_token', '_method']);

        $data['we_is_online'] = $request->has('we_is_online');
        
        if ($request->has('we_is_online')) {
            $data["we_online_since"] = now();
        } else {
            $data["we_online_since"] = NULL;
        }

        Web::where("we_user", $id)->update($data);

        return redirect("/webs")->with("success", "Webspace wurde erfolgreich bearbeitet.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $web = Web::where("we_user", $id)->firstOrFail();
        
        $web->delete();

        return redirect("/webs")-> with("success", "Produkt wurde erfolgreich gelöscht.");
    }
}
