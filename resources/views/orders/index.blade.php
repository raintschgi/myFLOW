@extends("layouts.app")
@section("title", "Bestellungen anzeigen")

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
                <th>Bestelldatum</th>
                <th>Kunden-ID</th>
                <th>Others-ID</th>
                <th>Webspace</th>
                <th>Domain</th>
                <th>Bestelltyp</th>
                <th>Preis</th>
                <th>Rabatt</th>
                <th>in Verrechnung</th>
                <th>Rechnungsdatum</th>
                <th>Kündigungsdatum</th>
                <th>Ersatzprodukt</th>
                <th>Kommentar</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $o)
                <tr>
                    <td class="align-middle">{{ $o->or_id }}</td>
                    <td class="align-middle">{{ $o->or_creation_date }}</td>
                    {{-- FKs --}}
                    <td class="align-middle">{{ $o->cu_id }}</td>
                    <td class="align-middle">{{ $o->oh_id }}</td>
                    <td class="align-middle">{{ $o->we_user }}</td>
                    <td class="align-middle">{{ $o->do_name }}</td>
                    
                    <td class="align-middle">{{ $o->or_type }}</td>
                    <td class="align-middle">{{ $o->or_price }}</td>
                    <td class="align-middle">{{ $o->or_discount }}</td>
                    <td class="align-middle">{{ $o->or_billing_date }}</td>
                    <td class="align-middle">{{ $o->or_cancelled_since }}</td>
                    <td class="align-middle">{{ $c->or_replacement }}</td>
                    
                    
                    <td class="align-middle">{{ $o->or_comment }}</td>

                    <td><a href="{{ route('orders.edit', $o->or_id) }}" class="btn btn-link text-success text-decoration-none"><i class="bi bi-pencil-square"></i> Bearbeiten</a></td>
                    <td>
                        <form action="{{ route('orders.destroy', $o->or_id) }}" method="POST">
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