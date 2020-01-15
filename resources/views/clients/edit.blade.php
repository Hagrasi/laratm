@extends('layout')
@section('content')
<h2 align="center">Edit Client : {{ $client->fullname }}</h2>
<form action="/clients/{{ $client->id }}" method="POST">
{{ method_field('PATCH') }}
{{ csrf_field() }}

    <table align ="center" class="main">
        <tr>
            <td align="center" colspan="2">
                <label>Fullname</label>
            </td>
            <td>
                <input type="text" name="fullname" id="fullname" placeholder="Write Fullname" value="{{ $client->fullname }}"/>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Age</label>
            </td>
            <td>
                <input type="text" name="age" id="age" placeholder="Write Age" value="{{ $client->age }}"/>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Email</label>
            </td>
            <td>
                <input type="text" name="email" id="email" placeholder="Write Email" value="{{ $client->email }}"/>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Update Client</label>
            </td>
            <td>
                <input type="submit" name="update" id="updateSubmit" value="Update Client" />
            </td>
        </tr>
    </table>
</form>

<form action="/clients/{{ $client->id }}" method="POST">
@method('DELETE')
@csrf
<table align ="center" class="main">
    <tr>
        <td>
            <input type="submit" name="delete" id="deleteSubmit" value="Delete Client" />
        </td>
    </tr>
</table>

@include('/includes/errors')

</form>
@endsection