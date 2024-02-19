@extends("layouts.app")
@section("title", "Kunde bearbeiten")

@section("content")
    <div class="container" style="margin-left: 0;">
        <div class="card mt-5">
            <div class="card-header">
                Kunde bearbeiten
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
                <form action="{{ route("customers.update", $customer->cu_id) }}" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="cu_firstname">Vorname</label>
                            <input type="text" 
                                   name="cu_firstname" 
                                   id="cu_firstname"
                                   class="form-control"
                                   value="{{ $customer->cu_firstname }}">
                        </div>
        
                        <div class="col-sm-6">
                            <label for="cu_lastname">Nachname</label>
                            <input type="text" 
                                   name="cu_lastname" 
                                   id="cu_lastname"
                                   class="form-control"
                                   value="{{ $customer->cu_lastname }}">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="cu_street">Strasse</label>
                            <input type="text" 
                                   name="cu_street" 
                                   id="cu_street"
                                   class="form-control"
                                   value="{{ $customer->cu_street }}">
                        </div>
        
                        <div class="col-sm-1">
                            <label for="cu_zip">PLZ</label>
                            <input type="text" 
                                   name="cu_zip" 
                                   id="cu_zip"
                                   class="form-control"
                                   value="{{ $customer->cu_zip }}">
                        </div>
        
                        <div class="col-sm-3">
                            <label for="cu_city">Ort</label>
                            <input type="text" 
                                   name="cu_city" 
                                   id="cu_city"
                                   class="form-control"
                                   value="{{ $customer->cu_city }}">
                        </div>

                        <div class="col-sm-4">
                            <label for="cu_country">Land</label>
                            <input type="text" 
                                   name="cu_country" 
                                   id="cu_country"
                                   class="form-control"
                                   value="{{ $customer->cu_country }}">
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="cu_phonenumber">Telefon</label>
                            <input type="text" 
                                   name="cu_phonenumber" 
                                   id="cu_pohnenumber"
                                   class="form-control"
                                   value="{{ $customer->cu_phonenumber }}">
                        </div>

                        <div class="col-sm-4">
                            <label for="cu_email">Email-Adresse</label>
                            <input type="text" 
                                   name="cu_email" 
                                   id="cu_email"
                                   class="form-control"
                                   value="{{ $customer->cu_email }}">
                        </div>

                        <div class="col-sm-4">
                            <label for="cu_uid">UID-Nummer</label>
                            <input type="text" 
                                   name="cu_uid" 
                                   id="cu_uid"
                                   class="form-control"
                                   value="{{ $customer->cu_uid }}">
                        </div>

                    </div>
    
                    <div class="mt-2 bg- fs-5">
                        
                        <div class="form-check form-switch">
                            <input class="form-check-input" 
                                   type="checkbox"
                                   id="cu_is_reseller"
                                   name="cu_is_reseller"
                                   value=""
                                   {{ $customer->cu_is_reseller ? 'checked' : '' }}>
                            <label class="form-check-label" for="cu_is_reseller">Reseller</label>
                          </div>
    
                          <div class="form-check form-switch">
                            <input class="form-check-input" 
                                   type="checkbox"
                                   id="cu_is_maintainer"
                                   name="cu_is_maintainer"
                                   value=""
                                   {{ $customer->cu_is_maintainer ? 'checked' : '' }}>
                            <label class="form-check-label" for="cu_is_maintainer">Maintainer</label>
                          </div>
                    </div>
                    
    
                    <button type="submit"
                            class="btn btn-primary mt-3">Kunde bearbeiten</button>
    
                </form>
            </div>
    
        </div>

    </div>
    

@endsection