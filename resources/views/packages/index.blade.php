@extends("layouts.app")
@section("title", "Produkte anzeigen")

@section("content")

    <div class="container-md" style="margin-left: 0;">
        <div class="mt-5">
            @if (session()->get("success"))
                <div class="alert alert-success">
                    {{ session()->get("success") }}
                </div>
            @endif
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produktname</th>
                    <th>Default Quota</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $package)
                    <tr>
                        <td class="align-middle">{{ $package->pa_id }}</td>
                        <td class="align-middle">{{ $package->pa_product_name }}</td>
                        <td class="align-middle">{{ $package->pa_default_quota }}</td>
                        <td><a href="{{ route('packages.edit', $package->pa_id) }}" class="btn btn-link text-success text-decoration-none"><i class="bi bi-pencil-square"></i> Bearbeiten</a></td>
                        <td>
                            <form action="{{ route('packages.destroy', $package->pa_id) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-link text-danger text-decoration-none">
                                    <i class="bi bi-trash3-fill"></i> Löschen
                                </button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

@endsection