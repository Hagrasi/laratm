@extends('layout')
@section('content')
<h2 align="center">Edit Card Data</h2>
<form action="/cards/{{ $card->id }}" method="POST">
{{ method_field('PATCH') }}
{{ csrf_field() }}
    <table align ="center" class="main">
        <tr>
            <td align="center" colspan="2">
                <label>Card Number</label>
            </td>
            <td>
                <input type="text" name="card_number" id="card_number" placeholder="Write Card Number" value="{{ $card->card_number }}"/>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Old PinCode</label>
            </td>
            <td>
                <input type="password" name="old_pin_code" id="old_pin_code" placeholder="Old Pin Code" value=""/>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>New PinCode</label>
            </td>
            <td>
                <input type="password" name="pin_code" id="pin_code" placeholder="New Pin Code" value=""/>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Balance</label>
            </td>
            <td>
                <input type="text" name="balance" id="balance" placeholder="Write Balance" value="{{ $card->balance }}"/>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Client : </label>
            </td>
            <td>
                <label>{{$client->fullname}} </label>
            </td>
        </tr>
        
        <tr>
            <td colspan="3" align="center">
                <input type="submit" name="update" id="updateSubmit" value="Update Card" />
            </td>
        </tr>
    </table>
</form>

<form action="/cards/{{ $card->id }}" method="POST">
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