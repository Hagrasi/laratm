@extends('layout')
@section('content')
<h2 align="center">All Clients</h2>
<div>
    <table align ="center" class="main">
        <tr>
            <th align="center" colspan="2">
                    <label>Fullname</label>
            </th>
        </tr>
        @foreach ($clients as $client)
        <tr>
            <td align="center" colspan="2">
                <label>{{ $client->fullname }}</label>
            </td>
            <td align="center" colspan="2">
                <a href="/clients/{{ $client->id }}">Show Details</a>
            </td>
            <td align="center" colspan="2">
                <a href="/clients/{{ $client->id }}/edit">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>

    @if($errors->any())
        <div id="error">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>
@endsection