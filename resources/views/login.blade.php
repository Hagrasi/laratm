<link rel="stylesheet" href="{{asset('css/sl.css')}}">
<link rel="stylesheet" href="{{asset('css/jquery.jnotify-alt.css')}}">
<script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('js/jquery.jnotify.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
                $('#loginBtn').click(function () {
                    var cardNumber = $('#cardNumber').val();
                    var pinCode = $('#pinCode').val();
                    $.ajax({
						type:'post',
						url: 'loginAjax',
						data:{
							'_token':$('input[name=_token').val(),
							'cardNumber' : cardNumber,
							'pinCode' : pinCode
						},
						success:function(data){
							// window.location.reload();
                            alert(data.card_number + '  ' +data.pin_code);
                            // jQuery('.alert').show();
                            // jQuery('.alert').html(data.card_number);
						},
					});
                    // alert('Card Number must Contains 16 Digit');
                    // $('#error').html('Card Number must Contains 16 Digit');
            
                    // alert('coco');


                });
        });
    
    </script>

    


<!--
<script type="text/javascript">
    $(document).ready(function () {


        $('#commentForm').submit(function () {
            cardNumber = $('#cardNumber').val();
            pinCode = $('#pinCode').val();


            if (cardNumber.length != 16) {
                alert('Card Number Contains 16 Digit');
                $('#error').html('Card Number must Contains 16 Digit');
            } else {
                if (cardNumber != "" && pinCode != "") {

                    //alert('Works');
                    $.post("/login/loginAjax", {cardNumber: cardNumber, pinCode: pinCode},
                     function (data) {
                        //alert(data);
                        if(data == 0){
                            $.jnotify('Card Number Correct but Pin Code is not Correct', 'error', 3000)
                        }else{
                            $.each(data, function (index, element) {
                            if (index == "fullname") {
                                $.jnotify('Welcome ' + element, 'success', 3000)
                                setTimeout(function () {
                                    window.location = "/HomePage/index";
                                }, 3000);
                            }
//                            alert(index);
                            

                        });
                        }
                        
                        //alert(data);

//                        if (data == '1') {
//                            $('#error').html('you are logged in successfully');
//                            alert('you are logged in successfully');
//                            window.location = "/HomePage/index";
//                        } else {
//                            $('#error').html('The Username or The Password May Contains Error . Please Try Again');
//                            alert('Card Number or The Pin Code May Contains Error . Please Try Again');
//                        }
                    }, "json");
                }
            }



            return false;
        });
    });
    </script>
-->

<div class="container">
    <section id="content">
        <form action="/login" id="loginForm" method="post">
            {{ csrf_field() }}
            <h1>Insert your Card</h1>
            <img src="{{URL::asset('/img/cardLogo.png')}}" width="150" height="150" alt="profile Pic">
             
            <div>
                <input type="text" name="cardNumber" placeholder="Card Number Please" id="cardNumber" />
            </div>
            <div>
                <input type="password" name="pinCode" placeholder="Pin Code" id="pinCode" />
            </div>
            <!-- <div>

                <input type="button" name="submit" id="loginBtn" value="Log in btn" />
                <a href="#">Lost your Pin Code?</a>

            </div> -->
            <div>

                <input type="submit" name="submit" id="login" value="Login" />

            </div>
            <p id="error">

            </p>
            <p id="error1">

            </p>
        </form><!-- form -->
        @include('/includes/errors')
        <!-- button -->
    </section><!-- content -->
</div><!-- container -->

