@extends("layouts.app")
@section("title", "Webspace anzeigen")

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
                <th>User</th>
                <th>Server</th>
                <th>Interne Hostadresse</th>
                <th>Maintainer</th>
                <th>Package</th>
                <th>Quota</th>
                <th>PHP Version</th>
                <th>Aktiv</th>
                <th>Aktivierungsdatum</th>
                <th>Kommentar</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($webs as $w)
                <tr>
                    <td class="align-middle">{{ $w->we_user }}</td>
                    <td class="align-middle">{{ $w->we_server }}</td>
                    <td class="align-middle">{{ $w->we_internal_hostaddress }}</td>
                    <td class="align-middle">{{ $w->we_maintained_by }}</td>
                    <td class="align-middle">{{ $w->pa_id }}</td>
                    <td class="align-middle">{{ $w->we_quota }}</td>
                    <td class="align-middle">{{ $w->we_php_vers }}</td>
                    <td class="align-middle">
                        @if($w->we_is_online)
                            <i class="bi bi-check-lg text-success"></i>
                        @else
                            <i class="bi bi-x-lg text-danger"></i>
                        @endif
                    </td>
                    <td class="align-middle">{{ $w->we_online_since }}</td>
                    <td class="align-middle">{{ $w->we_comment }}</td>
                    <td><a href="{{ route('webs.edit', $w->we_user) }}" class="btn btn-link text-success text-decoration-none"><i class="bi bi-pencil-square"></i> Bearbeiten</a></td>
                    <td>
                        <form action="{{ route('webs.destroy', $w->we_user) }}" method="POST">
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