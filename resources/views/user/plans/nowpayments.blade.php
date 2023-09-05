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
<form type="POST" action="{{route('verify_nowpayments')}}" method="POST">
<div class="row">
<div class="form-group">

    <label for="email">Email Address</label>

    <input type="email" id="email-address" class="form-control" value="myemail@yahoo.com" required />

  </div>

  <div class="form-group">

    <label for="amount">Amount</label>

    <input type="tel" id="amount" class="form-control" required />

  </div>

  <div class="form-group">

    <label for="first-name">First Name</label>

    <input type="text" id="first-name" class="form-control"/>

  </div>

  <div class="form-group">

    <label for="last-name">Last Name</label>

    <input type="text" id="last-name" class="form-control"/>

  </div>

  <div class="form-submit">

    <button type="submit" class="btn btn-primary btn-lg btn-block"> Pay </button>

  </div>

</form>
</div>
          </div>
          </div>


</div>
  </div>
  </div>
              </div>
          </div>
        </section> 
</x-app-layout>