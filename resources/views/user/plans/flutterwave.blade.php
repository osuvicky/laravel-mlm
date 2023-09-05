<x-app-layout>
    <!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Payment</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                  @if(Session::has('success'))
              <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ Session::get('success') }}
                      </div>
                    </div>
                
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ Session::get('error') }}
                      </div>
                    </div>               
                @endif
                <form id="makePaymentForm">
                <input type="hidden" name="public_key" value="FLWPUBK_TEST-SANDBOXDEMOKEY-X" />
                <input type="hidden" name="tx_ref" value="bitethtx-019203" />
                <input type="hidden" id="amount" name="amount" value="3400" />
                <input type="hidden" name="currency" value="NGN" />
                <input type="hidden" name="redirect_url" value="https://demoredirect.localhost.me/" />
                <input type="hidden" name="meta[token]" value="54" />
                <input type="hidden" id="name" name="customer[name]" value="Jesse Pinkman" />
                <input type="hidden" id="email" name="customer[email]" value="jessepinkman@walterwhite.org" />
                <button type="submit" class="btn btn-primary btn-lg btn-block">Pay Now</button>
                </form>
</div>
          </div>
          </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
  $(function (){
    $("#makePaymentForm").submit(function (e){
      e.preventDefault();
      var name = $("#name").val();
      var email = $("#email").val();
      var amount = $("#amount").val();

      makePayment(amount,email,name);
    });
  });

    function makePayment(amount,email,name) {
  FlutterwaveCheckout({
    public_key: "FLWPUBK-96f6f19cc5722648ba56a037cb6d2783-X",
    tx_ref: "RX1_{{substr(rand(0,time()),0,7)}}",
    amount,
    currency: "USD",
    payment_options: "card, mobilemoneyghana, ussd",
    redirect_url: "https://glaciers.titanic.com/handle-flutterwave-payment",
    
    customer: {
      email,
      phone_number: "08102909304",
      name,
    },
    customizations: {
      title: "The Titanic Store",
      description: "Payment for an awesome cruise",
      logo: "https://www.logolynx.com/images/logolynx/22/2239ca38f5505fbfce7e55bbc0604386.jpeg",
    },
  });
}
</script>
</div>
  </div>
  </div>
              </div>
          </div>
        </section> 
</x-app-layout>