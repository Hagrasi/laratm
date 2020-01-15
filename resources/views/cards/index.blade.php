@extends('layout')
@section('content')
<h2 align="center">All Cards</h2>
<div>
    <table align ="center" class="main">
        <tr>
            <th align="center" colspan="2">
                    <label>Card Number</label>
            </th>
            <th align="center" colspan="2">
                    <label>Card Owner</label>
            </th>
            <th align="center" colspan="2">
                    <label>Card Details</label>
            </th>
            <th align="center" colspan="2">
                    <label>Edit Card</label>
            </th>
        </tr>
        @foreach ($cards as $card)
        <tr>
            <td align="center" colspan="2">
                <label>{{ $card->card_number }}</label>
            </td>
            <td align="center" colspan="2">
                <label>{{ $clients[$card->id]->fullname }}</label>
            </td>
            <td align="center" colspan="2">
                <a href="/cards/{{ $card->id }}">Show Details</a>
            </td>
            <td align="center" colspan="2">
                <a href="/cards/{{ $card->id }}/edit">Edit</a>
            </td>
        </tr>
        @endforeach
        <tr>
            <td align="center" colspan="7">
                <a href="/cards/create">Create New Card</a>
            </td>
        </tr>
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