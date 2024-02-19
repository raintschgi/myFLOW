@extends("layouts.app")
@section("title", "Produkt bearbeiten")

@section("content")
   
    <div class="container-md" style="margin-left: 0;">
        
        <div class="card mt-5">
            <div class="card-header">
                Produkt bearbeiten
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
                <form action="{{ route('packages.update', $package->pa_id) }}" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="form-group">
                        <label for="name">Produktname</label>
                        <input type="text" 
                               name="pa_product_name" 
                               id="pa_product_name"
                               class="form-control"
                               value="{{ $package->pa_product_name }}">
                    </div>
    
                    <div class="form-group">
                        <label for="price">Default Quota</label>
                        <input type="number" 
                               name="pa_default_quota" 
                               id="pa_default_quota"
                               class="form-control"
                               value="{{ $package->pa_default_quota }}">
                    </div>
    
                    <button type="submit"
                            class="btn btn-primary mt-3">Produkt bearbeiten</button>
    
                </form>
            </div>
    
        </div>
    </div>
    

@endsection