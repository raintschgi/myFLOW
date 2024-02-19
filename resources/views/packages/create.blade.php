@extends("layouts.app")
@section("title", "Produkt anlegen")

@section("content")
    
    <div class="container-md" style="margin-left: 0;">
        <div class="card mt-5">
            <div class="card-header">
                Neues Produkt anlegen
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
                <form action="{{ route("packages.store") }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Produktname</label>
                        <input type="text" 
                               name="pa_product_name" 
                               id="pa_product_name"
                               class="form-control">
                    </div>
    
                    <div class="form-group">
                        <label for="price">Default Quota</label>
                        <input type="number" 
                               name="pa_default_quota" 
                               id="pa_default_quota"
                               class="form-control">
                    </div>
    
                    <button type="submit"
                            class="btn btn-primary mt-3">Produkt hinzufügen</button>
    
                </form>
            </div>
    
        </div>
    
    </div>

    

@endsection