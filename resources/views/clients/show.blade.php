@extends('layout')
@section('content')
<h2 align="center">Client Profile: {{ $client->fullname }}</h2>
{{ method_field('PATCH') }}
{{ csrf_field() }}

    <table align ="center" class="main">
        <tr>
            <td align="center" colspan="2">
                <label>Fullname</label>
            </td>
            <td>
                <label>{{ $client->fullname }}</label>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Age</label>
            </td>
            <td>
                <label>{{ $client->age }}</label>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Email</label>
            </td>
            <td>
                <label>{{ $client->email }}</label>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <a href="/clients/{{ $client->id }}/edit">Edit This Client Profile</a>
                <label><?php echo "---------"; ?></label>
                <a href="/cards/create?client_id={{ $client->id }}">Create Him a Card</a>
            </td>
            <td>
                
            </td>
        </tr>
    </table>

    @if ($client->cards->count())
    <div id="cards">
    <h2 align="center">Client Cards</h2>
        <table align ="center" class="main">
            <tr>
                <th>Card Number</th>
                <th>Card Details</th>
            </tr>
                @foreach($client->cards as $card)
                    <tr>
                        <td>{{ $card->card_number }}</td>
                        <td><a href="/cards/{{ $card->id }}">Show Details</a></td>
                    </tr>
                @endforeach
        </table>
    </div>
    @endif

    @include('/includes/errors')

@endsection