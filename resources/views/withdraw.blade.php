<link rel="stylesheet" href="{{asset('css/style2.css')}}">
<link rel="stylesheet" href="{{asset('css/jquery.jnotify-alt.css')}}">
<script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('js/jquery.jnotify.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.withdraw').click(function () {

            var amount = $(this).attr('rel');
            // alert(amount);

            var confirm1 = confirm('Do you want to withdraw ' + amount + ' Currency ?');
            if (confirm1) {
                $.ajax({
						type:'post',
						url: 'withdraw',
						data:{
							'_token':$('input[name=_token').val(),
							'amount' : amount
						},
						success:function(data){
                            // $('#balance').html( data );
							$.jnotify('You Have Withdrawn ' + amount + ' $ Of your Balance', 'success', 6000);
                            window.location = "/withdraw";


                            // if(data == 1)
                            // {
                            //     // $('#balance').html( data );
                            //     $.jnotify('You Have Withdrawn ' + amount + ' $ Of your Balance', 'success', 6000);
                            //     window.location = "/withdraw";
                            // } elseif(data == 0)
                            // {
                            //     alert('Balance is Not Enough');
                            // } else
                            // {
                            //     alert('Error Happens');
                            // }
                           
						},
					});


            }

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#withdrawBtn').click(function () {
            var amount = $('#withdrawTxt').val();
            if (Math.floor(amount) == amount && $.isNumeric(amount)) {
                if (amount > 2000) {
                    alert('Maximum Amount is 2000 Dollars');
                } else {
                    var confirm1 = confirm('Do you want to withdraw ' + amount + ' Dollars ?');
                    if (confirm1) 
                    {
                        $.ajax({
                            type:'post',
                            url: 'withdraw',
                            data:{
                                '_token':$('input[name=_token').val(),
                                'amount' : amount
                            },
                            success:function(data){
                                // $('#balance').html( data );
                                $.jnotify('You Have Withdrawn ' + amount + ' $ Of your Balance', 'success', 6000);
                                window.location = "/withdraw";
                            },
					    });
                    }
                }
            } else {
                alert('Only Numeric Didgits');
            }


        });
    });
</script>

<h4 align="center">Welcome {{ Session::get('client')->fullname}}</h4>
{{ csrf_field() }}
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
    You Have <label id="balance">{{ $dbCard->balance}}</label> $ in your Account 
</h3>
<h2 align="center">Select Category</h2>
<div>


    <table align ="center" class="main">

        <tr>
            <td align="center">
                <a class="withdraw" rel="50" href="#" >
                    <img src="{{URL::asset('/img/50.png')}}" width="100" height="100">
                    
                </a>
            </td>
            <td align="center">
                <a class="withdraw" rel="100" href="#" >
                    <img src="{{URL::asset('/img/100.png')}}" width="100" height="100">
                </a>
            </td>
        </tr>
        <tr>
            <td align="center">
                <a class="withdraw" rel="200" href="#" >
                    <img src="{{URL::asset('/img/200.jpg')}}" width="100" height="100">
                </a>
            </td>
            <td align="center">
                <a class="withdraw" rel="300" href="#" >
                    <img src="{{URL::asset('/img/300.png')}}" width="100" height="100">
                </a>
            </td>
        </tr>
        <tr>
            <td align="center">
                <a class="withdraw" rel="500" href="#" >
                    <img src="{{URL::asset('/img/500.png')}}" width="100" height="100">
                </a>
            </td>
            <td align="center">
                <a class="withdraw" rel="1000" href="#" >
                    <img src="{{URL::asset('/img/1000.png')}}" width="100" height="100">
                </a>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2" border="1">
                <table align ="center" >
                    <tr>
                        <td align="center">
                            <h3>or Withdraw of Limit 2000 Dollars</h3>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="text" name="amount" placeholder="Amount Value" id="withdrawTxt" />
                        </td>
                        <td align="center">
                            <input id="withdrawBtn" type="button" name="withdraw" value="withdraw" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>

