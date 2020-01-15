<link rel="stylesheet" href="{{asset('css/style2.css')}}">
<link rel="stylesheet" href="{{asset('css/jquery.jnotify-alt.css')}}">
<script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('js/jquery.jnotify.js')}}"></script>



<h4 align="center">Welcome {{ Session::get('client')->fullname}}</h4>
<table align ="center" id="header">
    <tr>
        <td align="center">
            <a href="/home" >
                <img src="{{URL::asset('/img/homepage.png')}}" width="50" height="50">
            </a>
            <h4>
                <a href="/home">Home Page</a>
            </h4>
        </td>
        <td align="center">
            <a href="/logout" >
                <img src="{{URL::asset('/img/logout.png')}}" width="50" height="50">
            </a>
            <h4>
                <a href="/logout">logout</a>
            </h4>
        </td>
    </tr>
</table>


<h3 align="center">
    You Have {{ Session::get('card')->balance }} $ in your Account 
</h3>
<h1 align="center">Last Five Transactions</h1>
<div>
    <table align ="center" class="main" border="1">

        <tr>
            <td>
                <h3 align="center">Date</h3>
            </td>
            <td>
                <h3 align="center">Withdrawn Amount</h3>
            </td>
            <td>
                <h3 align="center">Remaining Balance</h3>
            </td>
        </tr>

        @foreach ($transactions as $transaction)
        <tr>
            <td align="center" >
                <label>{{ $transaction->trans_dateTime }}</label>
            </td>
            <td align="center" >
                <label>{{ $transaction->withdrawn }}</label>
            </td>
            <td align="center" >
                <label>{{ $transaction->remaining_balance }}</label>
            </td>
        </tr>
        @endforeach
    </table>
</div>