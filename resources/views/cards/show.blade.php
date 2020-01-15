@extends('layout')
@section('content')
<h2 align="center">Card Information</h2>
{{ method_field('PATCH') }}
{{ csrf_field() }}

    <table align ="center" class="main">
        <tr>
            <td align="center" colspan="2">
                <label>Card Number</label>
            </td>
            <td>
                <label>{{ $card->card_number }}</label>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Balance</label>
            </td>
            <td>
                <label>{{ $card->balance }}</label>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>This Card Belongs to</label>
            </td>
            <td>
                <label>{{ $client->fullname }}</label>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <a href="/cards/{{ $card->id }}/edit">Edit</a>
                <label><?php echo "---or----"; ?></label>
                <a href="/cards/{{ $card->id }}/edit">Delete</a>
            </td>
        </tr>
    </table>
    @include('/includes/errors')

@endsection