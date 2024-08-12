@extends('layouts.admin')

@section('body')
    <table class="table table-auto mt-3">
        <tr>
            <th colspan="3">
                List Of Users
                <a class="btn btn-warning float-end" href="{{ route('admin.pengguna.export') }}"><box-icon name='download'></box-icon> Export
                    User Data</a>
            </th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        @foreach ($penggunas as $index => $pengguna)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{ $pengguna->nama }}</td>
                <td>{{ $pengguna->email }}</td>
            </tr>
        @endforeach
    </table>
@endsection
