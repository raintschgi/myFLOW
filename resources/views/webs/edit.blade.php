@extends("layouts.app")
@section("title", "Webspace bearbeiten")

@section("content")
    <div class="container" style="margin-left: 0;">
        <div class="card mt-5">
            <div class="card-header">
                Webspace bearbeiten
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
                <form action="{{ route("webs.update", $web->we_user) }}" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="we_user">User</label>
                            <input type="text" 
                                   name="we_user" 
                                   id="we_user"
                                   class="form-control"
                                   value="{{ $web->we_user }}">
                        </div>
        
                        <div class="col-sm-4">
                            <label for="we_maintained_by">Maintainer</label>
                            <input type="text" 
                                   name="we_maintained_by" 
                                   id="we_maintained_by"
                                   class="form-control"
                                   value="{{ $web->we_maintained_by }}">
                        </div>

                        <div class="col-sm-4">
                            <label for="pa_id">Package</label>
                            <input type="text" 
                                   name="pa_id" 
                                   id="pa_id"
                                   class="form-control"
                                   value="{{ $web->pa_id }}">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="we_server">Server</label>
                            <input type="text" 
                                   name="we_server" 
                                   id="we_server"
                                   class="form-control"
                                   value="{{ $web->we_server }}">
                        </div>
        
                        <div class="col-sm-4">
                            <label for="we_internal_hostaddress">Interne Hostadresse</label>
                            <input type="text" 
                                   name="we_internal_hostaddress" 
                                   id="we_internal_hostaddress"
                                   class="form-control"
                                   value="{{ $web->we_internal_hostaddress }}">
                        </div>

                        <div class="col-sm-2">
                            <label for="we_quota">Quota</label>
                            <input type="number" 
                                   name="we_quota" 
                                   id="we_quota"
                                   class="form-control"
                                   value="{{ $web->we_quota }}">
                        </div>
        
                        <div class="col-sm-2">
                            <label for="we_php_vers">PHP Version</label>
                            <input type="text" 
                                   name="we_php_vers" 
                                   id="we_php_vers"
                                   class="form-control"
                                   value="{{ $web->we_php_vers }}">
                        </div>
                    </div>
    
                    <div class="row">
                        {{-- <div class="col-sm-2">
                            <label for="we_online_since">Aktivierungsdatum</label>
                            <input type="date" 
                                   name="we_online_since" 
                                   id="we_online_since"
                                   class="form-control"
                                   value="{{ $web->we_online_since }}">
                        </div> --}}

                        <div class="col-sm-12">
                            <label for="we_comment">Kommentar</label>
                            <input type="text" 
                                   name="we_comment" 
                                   id="we_comment"
                                   class="form-control"
                                   value="{{ $web->we_comment }}">
                        </div>
                    </div>
    
                    <div class="mt-2 bg- fs-5">
                        
                        <div class="form-check form-switch">
                            <input class="form-check-input" 
                                   type="checkbox"
                                   id="we_is_online"
                                   name="we_is_online"
                                   value=""
                                   {{ $web->we_is_online ? 'checked' : '' }}>
                            <label class="form-check-label" for="we_is_online">Aktiv</label>
                        </div>
                    </div>
                    
                    <button type="submit"
                            class="btn btn-primary mt-3">Webspace bearbeiten</button>
    
                </form>
            </div>
    
        </div>

    </div>
    

@endsection