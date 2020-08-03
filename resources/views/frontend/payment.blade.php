@extends('frontend.layouts.app')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://khalti.com/static/khalti-checkout.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
<div id="content"> 
    
    <!-- Ship Process -->
    <div class="ship-process padding-top-30 padding-bottom-30">
      <div class="container">
        <ul class="row">
          
          <!-- Step 1 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="flaticon-shopping"></i> </div>
            <div class="media-body"> <span>Step 1</span>
              <h6>Shopping Cart</h6>
            </div>
          </li>
          
          <!-- Step 2 -->
          <li class="col-sm-3 current">
            <div class="media-left"> <i class="flaticon-business"></i> </div>
            <div class="media-body"> <span>Step 2</span>
              <h6>Payment Methods</h6>
            </div>
          </li>
          
          <!-- Step 3 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
            <div class="media-body"> <span>Step 3</span>
              <h6>Delivery Methods</h6>
            </div>
          </li>
          
          <!-- Step 4 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="fa fa-check"></i> </div>
            <div class="media-body"> <span>Step 4</span>
              <h6>Confirmation</h6>
            </div>
          </li>
        </ul>
      </div>
    </div>
    
    <!-- Payout Method -->
    <section class="padding-bottom-60">
      <div class="container"> 
        <!-- Payout Method -->
        <div class="pay-method">
          <div class="row">
            <div class="col-md-6"> 
              
              <!-- Your Card -->
              <div class="heading">
                <h2>Your Card</h2>
                <hr>
              </div>
              <img src="/frontend/images/card-icon.png" alt="" > <br><br>
              <a href="#">
               <form action="#" method="POST">
                @csrf
                <input type="hidden" name="payment_method" value="esewa">
                <button class="btn-round">E-sewa</button>
                </form>
              </a>
              <form>
              <div class="form-group" id="pay-button">
              <p id="error-amount" style="color: red;"></p>
              <input type="hidden" step="any" class="form-control" id="amount" placeholder="Enter Amount" value="{{ \Cart::getTotal()}}">
              </div>
              <br>
                <button id="payment-button" style="background-color: #773292; color: #fff; border: none; padding: 5px 10px; border-radius: 2px">Pay with Khalti</button>
              </form>
            </div>
            <div class="col-md-6"> 
              
              <!-- Your information -->
              <div class="heading">
                <h2>Your information</h2>
                <hr>
              </div>
              <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false"
              data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                @csrf
                <div class="row"> 
                  
                  <!-- Cardholder Name -->
                  <div class="col-sm-6">
                    <label> Cardholder Name
                     <input class='form-control' size='4' type='text'>
                    </label>
                  </div>
                  
                  <!-- Card Number -->
                  <div class="col-sm-6">
                    <label> Card Number
                      <input autocomplete='off' class='form-control card-number' size='20'type='text'>
                    </label>
                  </div>
                  
                  <!-- Card Number -->
                  <div class="col-sm-7">
                    <div class="row">
                      <div class="col-xs-6">
                        <label class='control-label'>Expiration Month</label> <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                      </div>
                      <div class="col-xs-6">
                        <label class='control-label'>Expiration Year</label> 
                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <label> CVV
                     <input autocomplete='off'class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                    </label>
                  </div>
                   <div class='form-row row'>
                        <div class='col-md-12 error form-group hide'>
                        <div class='alert-danger alert'>Please correct the errors and try again.
                        </div>
                    </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        
        <!-- Button -->
        <div class="pro-btn"> <a href="#." class="btn-round btn-light">Back to Shopping Cart</a> 
        <button type="submit" class="btn-round">Go Delivery Methods</button>
    </div>
     </form>
      </div>
    </section>
    
    <!-- Clients img -->
    <section class="light-gry-bg clients-img">
      <div class="container">
        <ul>
          <li><img src="images/c-img-1.png" alt="" ></li>
          <li><img src="images/c-img-2.png" alt="" ></li>
          <li><img src="images/c-img-3.png" alt="" ></li>
          <li><img src="images/c-img-4.png" alt="" ></li>
          <li><img src="images/c-img-5.png" alt="" ></li>
        </ul>
      </div>
    </section>
    
    <!-- Newslatter -->
    <section class="newslatter">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Subscribe our Newsletter <span>Get <strong>25% Off</strong> first purchase!</span></h3>
          </div>
          <div class="col-md-6">
            <form>
              <input type="email" placeholder="Your email address here...">
              <button type="submit">Subscribe!</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>
<script>
    var config = {
        // replace the publicKey with yours
            "publicKey": "{{env('KHALTI_TEST_PUBLIC', '')}}",
            @foreach(\Cart::getContent() as $item)
            "productIdentity": "{{ $item->id}}",
            "productName": "Account Topup",
            "productName": "{{ $item->name}}",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            @endforeach
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                    $.ajax({
                        url: "{{route('khalti.verification')}}",
                        type: 'POST',
                        data: {
                          amount: payload.amount,
                          mobile: payload.mobile,
                          user_id : payload.product_identity,
                          token : payload.token
                          },
                        success: function(data) 
                        {
                          console.log(data);
                          //redirect to sucess page
                        },
                        error: function(data) 
                        {
                          console.log("error");
                          //redirext to error page
                        }
                   });
                },
                onError (error) {
                    console.log(error);
                    //redirect as needed
                },
                onClose () {
                    console.log('widget is closing');
                    //redirect as needed
                }
            }
    };
        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function (e) {
          e.preventDefault();
          var amount = parseFloat($('#amount').val() * 100.00);
            checkout.show({amount: amount});
        }
    </script>
@endsection