@extends('user.master')

@section('content')
<style>
    /* Stripe CSS */
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  padding: 10px 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  /* background-color: white; */

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
#card-errors{
    color: red;
}
    /* Stripe CSS */
    .p-4 {
        padding: 90px;
    }

    .m-4 {
        margin: 4px;
    }

    .my-4 {
        margin: 50px 0px;
    }

    .md-4 {
        margin: 0px 0px 50px 0px;
    }

    .mt-4 {
        margin: 50px 0px 0px 0px;
    }

    .py-4 {
        padding: 50px 0px;
    }
</style>

<!-- 
@if($errors->any())
<h4> {{ $errors->first() }} </h4>
@endif -->

<!-- <div class="container">
    <form method="POST" action="{{ route('processFile') }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file_name">
        <button type="submit" class="btn btn-default">Upload to Cloud</button>
    </form>
</div> -->

<div class="row">
    <div class="col-md-12">
        <!-- The time line -->
        <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label my-4">
                <span class="bg-blue md-4">
                    1. Upload a file
                </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
                <i class="fa fa-file-text bg-blue"></i>

                <form method="POST" action="{{ route('processFile') }}" enctype="multipart/form-data" class="timeline-item">
                    @csrf
                    <h3 class="timeline-header"> Upload a Json file</h3>

                    <div class="timeline-body">
                        <input type="file" class="btn btn-primary" name="file_name" disabled>
                    </div>
                    <div class="timeline-footer">
                        <button type="submit" class="btn btn-primary btn-md" disabled>Upload to Cloud</button>
                    </div>
                </form>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <!-- END timeline item -->


            <!-- Pay for it -->
            <a id="payment"></a>
            <li class="time-label my-4">
                <span class="bg-green md-4">
                    2. Pay for it
                </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
                <i class="fa fa-dollar bg-green"></i>

                <form method="POST" action="{{ route('payment.verify') }}" enctype="multipart/form-data" class="timeline-item" id="payment-form">
                    @csrf  
                    <h3 class="timeline-header"> Payment Method</h3>

                    <div class="timeline-body">
                        <h4> File Name: {{ $fileInfo['file_name'] }} </h4>
                        <h4> File Size: {{ $fileInfo['file_size'] }} </h4>
                        <h4> Total Price: {{ $fileInfo['file_price'] }} $</h4> <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cardholder name</label>
                                    <input type="text" class="form-control" name="name_on_card" minlength="3" maxlength="90" id="name_on_card" placeholder="Cardholder name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address</label>
                                    <input type="address" class="form-control" name="address" minlength="8" maxlength="90" id="address" placeholder="Enter your address" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="card-element">
                                Credit or debit card
                                </label>
                                <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-footer">
                        <button type="submit" class="btn btn-success" id="complete-order"><i class="fa fa-credit-card"></i> Submit Payment
                        </button>
                        <!-- <button type="submit" class="btn btn-success btn-md">Pay</button>   -->
                    </div>
                </form>
            </li>

            @if( $errors->payment->any() )
            <li>
                <i class="fa fa-exclamation-circle bg-red"></i>
                <div class="timeline-item">

                    <h3 class="timeline-header"> Error!! </h3>

                    <div class="timeline-body">
                        <h4> {{ $errors->payment->first() }} </h4>
                    </div>
                    <div class="timeline-footer">
                        <!-- <a class="btn btn-danger btn-flat btn-xs">View comment</a> -->
                    </div>
                </div>
            </li>
            @endif
            <!-- END timeline item -->


            <!-- Download it -->
            <li class="time-label my-4">
                <span class="bg-gray md-4">
                    3. Download
                </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
                <i class="fa fa-arrow-circle-down bg-gray"></i>

                <div class="timeline-item">

                    <h3 class="timeline-header"> Download your file</h3>

                    <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                    </div>
                    <div class="timeline-footer">
                        <!-- <a class="btn btn-warning btn-flat btn-xs">Download</a> -->
                    </div>
                </div>
            </li>
            <!-- END timeline item -->

            <li>
                <i class="fa  fa-heart bg-gray"></i>
            </li>
        </ul>
    </div>
    <!-- /.col -->
</div>

<script>
// Create a Stripe client.
var stripe = Stripe('pk_test_ApRYZ0Nq7mZjT0HVYDUdSGuJ00mRxiIvo3');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {
    style: style, 
    hidePostalCode:true});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  // Disable the submit button to prevent double clicks
  document.getElementById('complete-order').disabled = true;

    var options = {
        name: document.getElementById('name_on_card').value,
        name: document.getElementById('address').value,
        // name: document.getElementById('city').value,
        // name: document.getElementById('province').value,
        // name: document.getElementById('postalcode').value,
    }

  stripe.createToken(card, options).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;

    // If failed enable the button again
    document.getElementById('complete-order').disabled = false;

    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>

@endsection

<!-- @section('stripe-js')
@endsection -->
