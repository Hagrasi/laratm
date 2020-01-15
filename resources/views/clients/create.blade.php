@extends('layout')
@section('content')
<title>Create Client</title>
<h2 align="center">Create a New Client</h2>
<div>
<form action="/clients" id="clients" method="POST">
{{ csrf_field() }}
    <table align ="center" class="main">
        <tr>
            <td align="center" colspan="2">
                <label>Fullname</label>
            </td>
            <td>
                <input type="text" name="fullname" id="fullname" placeholder="Write Fullname" value="{{ old('fullname') }}"/>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Age</label>
            </td>
            <td>
                <input type="text" name="age" id="age" placeholder="Write Age" value="{{ old('age') }}"/>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Email</label>
            </td>
            <td>
                <input type="text" name="email" id="email" placeholder="Write Email" value="{{ old('email') }}"/>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Add Client</label>
            </td>
            <td>
                <input type="submit" name="submit" id="submit" value="Create Client" />
            </td>
        </tr>
    </table>
    @include('/includes/errors')
</form>
</div>
@endsection