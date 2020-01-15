<link rel="stylesheet" href="{{asset('css/style2.css')}}">
<link rel="stylesheet" href="{{asset('css/jquery.jnotify-alt.css')}}">
<script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('js/jquery.jnotify.js')}}"></script>
<table width="100%" align ="center" id="header"> 
    <tr>
        <td align="center">
            <?php echo '<h4 align="center">welcome ' . $client->fullname.'</h4>'; ?>
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

<!-- @if(Session::has('card'))
<div class="alert alert-danger">
  {{ Session::get('card')->balance}}
</div>
@endif -->

<h1 align="center">What Do you Want to Do ?</h1>
<div>


    <table align ="center" class="main">
        <tr>
            <td align="center">
                <a href="/withdraw" >
                    <img src="{{URL::asset('/img/withdraw.JPG')}}" width="100" height="100">
                </a>
                <h4>
                    <a href="/withdraw">Withdraw</a>
                </h4>
            </td>
            <td align="center">
                <a href="/trans">
                    <img src="{{URL::asset('/img/transaction.PNG')}}" width="100" height="100">
                </a>
                <h4>
                    <a href="/trans">View Transactions</a>
                </h4>
            </td>
        </tr>
    </table>
</div>

