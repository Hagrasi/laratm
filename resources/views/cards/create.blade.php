@extends('layout')
@section('content')
<title>Create Client</title>
<h2 align="center">Create a New Card</h2>
<div>
<form action="/cards" id="clients" method="POST">
{{ csrf_field() }}
    <table align ="center" class="main">
        <tr>
            <td align="center" colspan="3">
                <h3 align="center">Card Number and Pin Code will Created Automatically</h2>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Card Number</label>
            </td>
            <td>
            <?php
                echo $card_number = rand(10000000,99999999);
            ?>
            <input type="hidden" id="card_number" name="card_number" value="{{ $card_number }}">
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Pin Code</label>
            </td>
            <td>
            <?php
                $pin_code = rand(1000,9999);
                echo 'hidden';
            ?>
                <input type="hidden" id="pin_code" name="pin_code" value="{{ $pin_code }}">
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Balance</label>
            </td>
            <td>
                <input type="text" name="balance" id="balance" placeholder="Write Balance" value="{{ old('balance') }}"/>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Client</label>
            </td>
            <td>
                @empty($request)
                <select name="client">
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">
                                {{ $client->fullname }}
                            </option>
                        @endforeach
                </select>
                @endempty
                @isset($request)
                    <label>{{ $clients->fullname }}</label>
                    <input type="hidden" id="client_id" name="client_id" value="{{ $clients->id }}">
                @endisset
            </td>
        </tr>
        <tr>
            <td align="center" colspan="3">
                <input type="submit" name="submit" id="submit" value="Create Card" />
            </td>
        </tr>
    </table>
    @include('/includes/errors')
</form>
</div>
@endsection