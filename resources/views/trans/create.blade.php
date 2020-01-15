<script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('js/jquery.jnotify.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.button_cont').click(function () {
                var card_id = $('.radioCard:checked').val();
                var withdrawn = $('#withdrawn').val();
                var description = $('#description').val();
                $.ajax({
						type:'post',
						url: '/transactions',
						data:{
							'_token' : $('input[name=_token').val(),
                            'card_id' : card_id,
                            'withdrawn' : withdrawn,
                            'description' : description
						},
						success:function(data){
							alert(data);
                            if(data == 1){
                                alert('success');
                                window.location.reload();
                            } else if(data == 0){
                                alert('Withdrawn Amount Not Not Logical');
                            } else {
                                alert(data);
                            }
						}
					});
        });
    });
</script>
<script type="text/javascript">
        $(document).ready(function () {
                $('.radioCard').click(function () {
                    var card_id = $(this).val();
                    $.ajax({
						type:'post',
						url: '/trans/getCardBalance',
						data:{
							'_token':$('input[name=_token').val(),
                            'card_id':card_id
						},
						success:function(data){
                            var balance = data - 100
                            $('#limit').html('Withdrawn Amount Must Less than '+balance);
							// alert(balance);
						}
					});
                });
        });
    
</script>
@extends('layout')
@section('content')
<title>Create Client</title>
<h2 align="center">Create a New Transaction</h2>
<div>
<form action="" id="clients" method="POST">
{{ csrf_field() }}
    <table align ="center" class="main">
        
        <tr>
            <td align="center" colspan="2">
                <label>Select Card Number</label>
            </td>
            <td align="left">
                @empty($request)
                    @foreach($cards as $key => $card)
                        <input type="radio" class="radioCard" name="card" value="{{ $card->id }}" required>
                        {{ $card->card_number.' *** '. $card->client->fullname }}<br>
                    @endforeach        
                @endempty
                @isset($request)
                    
                @endisset
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label id="limit">Withdrawn Amount</label>
            </td>
            <td>
                <input type="Text" id="withdrawn" name="withdrawn" value="" placeholder="Withdrawn Amount">
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <label>Description</label>
            </td>
            <td>
                <textarea name="description" id="description" placeholder="Write Description For ... " cols="30" rows="10"></textarea>
            </td>            
        </tr>
        <tr>
            <td colspan="3">
                <div class="button_cont" align="center">
                    <a class="example_d" href="#">Create Transaction</a>
                </div>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="3">
                <div align="center">
                    <input type="submit" name="submit" id="submit" value="Create Transaction" />
                </div>
                
            </td>
        </tr>
    </table>
    @include('/includes/errors')
</form>
</div>
@endsection