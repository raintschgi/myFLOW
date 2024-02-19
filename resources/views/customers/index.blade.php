@extends("layouts.app")
@section("title", "Kunden anzeigen")

@section("content")

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
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Strasse</th>
                <th>PLZ</th>
                <th>Ort</th>
                <th>Land</th>
                <th>Telefon</th>
                <th>Email-Adresse</th>
                <th>Reseller</th>
                <th>Maintainer</th>
                <th>UID-Nummer</th>

                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $c)
                <tr>
                    <td class="align-middle">{{ $c->cu_id }}</td>
                    <td class="align-middle">{{ $c->cu_firstname }}</td>
                    <td class="align-middle">{{ $c->cu_lastname }}</td>
                    <td class="align-middle">{{ $c->cu_street }}</td>
                    <td class="align-middle">{{ $c->cu_zip }}</td>
                    <td class="align-middle">{{ $c->cu_city }}</td>
                    <td class="align-middle">{{ $c->cu_country }}</td>
                    <td class="align-middle">{{ $c->cu_phonenumber }}</td>
                    <td class="align-middle">{{ $c->cu_email }}</td>
                    <td class="align-middle">
                        @if($c->cu_is_reseller)
                            <i class="bi bi-check-lg text-success"></i>
                        @else
                            <i class="bi bi-x-lg text-danger"></i>
                        @endif
                    </td>
                    <td class="align-middle">
                        @if($c->cu_is_maintainer)
                            <i class="bi bi-check-lg text-success"></i>
                        @else
                            <i class="bi bi-x-lg text-danger"></i>
                        @endif
                    </td>
                    <td class="align-middle">{{ $c->cu_uid }}</td>
                    <td><a href="{{ route('customers.edit', $c->cu_id) }}" class="btn btn-link text-success text-decoration-none"><i class="bi bi-pencil-square"></i> Bearbeiten</a></td>
                    <td>
                        <form action="{{ route('customers.destroy', $c->cu_id) }}" method="POST">
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

@endsection