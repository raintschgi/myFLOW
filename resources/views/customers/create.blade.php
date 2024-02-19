@extends("layouts.app")
@section("title", "Kunde anlegen")

@section("content")
    <div class="container" style="margin-left: 0;">
        <div class="card mt-5">
            <div class="card-header">
                Neuen Kunden anlegen
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route("customers.store") }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="cu_firstname">Vorname</label>
                            <input type="text" 
                                   name="cu_firstname" 
                                   id="cu_firstname"
                                   class="form-control">
                        </div>
        
                        <div class="col-sm-6">
                            <label for="cu_lastname">Nachname</label>
                            <input type="text" 
                                   name="cu_lastname" 
                                   id="cu_lastname"
                                   class="form-control">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="cu_street">Strasse</label>
                            <input type="text" 
                                   name="cu_street" 
                                   id="cu_street"
                                   class="form-control">
                        </div>
        
                        <div class="col-sm-1">
                            <label for="cu_zip">PLZ</label>
                            <input type="text" 
                                   name="cu_zip" 
                                   id="cu_zip"
                                   class="form-control">
                        </div>
        
                        <div class="col-sm-3">
                            <label for="cu_city">Ort</label>
                            <input type="text" 
                                   name="cu_city" 
                                   id="cu_city"
                                   class="form-control">
                        </div>

                        <div class="col-sm-4">
                            <label for="cu_country">Land</label>
                            <input type="text" 
                                   name="cu_country" 
                                   id="cu_country"
                                   class="form-control">
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="cu_phonenumber">Telefon</label>
                            <input type="text" 
                                   name="cu_phonenumber" 
                                   id="cu_pohnenumber"
                                   class="form-control">
                        </div>

                        <div class="col-sm-4">
                            <label for="cu_email">Email-Adresse</label>
                            <input type="text" 
                                   name="cu_email" 
                                   id="cu_email"
                                   class="form-control">
                        </div>

                        <div class="col-sm-4">
                            <label for="cu_uid">UID-Nummer</label>
                            <input type="text" 
                                   name="cu_uid" 
                                   id="cu_uid"
                                   class="form-control">
                        </div>

                    </div>
    
                    <div class="mt-2 bg- fs-5">
                        
                        <div class="form-check form-switch">
                            <input class="form-check-input" 
                                   type="checkbox"
                                   id="cu_is_reseller"
                                   name="cu_is_reseller">
                            <label class="form-check-label" for="cu_is_reseller">Reseller</label>
                          </div>
    
                          <div class="form-check form-switch">
                            <input class="form-check-input" 
                                   type="checkbox"
                                   id="cu_is_maintainer"
                                   name="cu_is_maintainer">
                            <label class="form-check-label" for="cu_is_maintainer">Maintainer</label>
                          </div>
                    </div>
                    
    
                    <button type="submit"
                            class="btn btn-primary mt-3">Kunde hinzufügen</button>
    
                </form>
            </div>
    
        </div>

    </div>
    

@endsection