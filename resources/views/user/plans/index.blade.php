<x-app-layout>
<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-body">
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

            @foreach ($plans as $plan)
              <div class="col-12 col-md-4 col-lg-4">
                <div class="pricing pricing-highlight">
                  <div class="pricing-title">
                  <form method="POST" action="{{ route('pay') }}" role="form">
                  {{ $plan->name }}
                  </div>
                  <div class="pricing-padding">
                    <div class="pricing-price">
                      <div>${{ $plan->amount }}</div>
                      <div>per annum</div>
                    </div>
                    <div class="pricing-details">
                      <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">{{ $plan->pv }} PV</div>
                      </div>
                      <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">{{ $plan->ref_percent }}% per Referral</div>
                      </div>
                      <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">{{ $plan->gig_percent }}% per GIG</div>
                      </div>
                      <!-- <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">10 Custom domain</div>
                      </div>
                      <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">24/7 Support</div>
                      </div> -->
                    </div>
                  </div>
                  <input type="hidden" name="email" value="{{Auth::user()->email}}"> {{-- required --}}
                  <input type="hidden" name="orderID" value="345">
                  <input type="hidden" name="amount" value="{{ $plan->amount * 100 }}"> {{-- required in kobo --}}
                  <!-- <input type="hidden" name="quantity" value="3"> -->
                  <input type="hidden" name="currency" value="NGN">
                  <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                  <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                  
                  <input type="hidden" name="callback_url" value="{{config('app.url').'register_subscription'}}">

                  <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
        
                @if ($userData == '')
                <div class="pricing-cta">
                                  <button class="btn btn-primary btn-lg btn-block" type="submit" value="Pay Now!">
                                          <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                      </button>
                                    <!-- <a href="{{route('verify_nowpayments')}}">Subscribe <i class="fas fa-arrow-right"></i></a> -->
                                  </div>
                @elseif ($userData->is_active == 0)
                <div class="pricing-cta">
                                  <button class="btn btn-primary btn-lg btn-block" type="submit" value="Pay Now!">
                                          <i class="fa fa-plus-circle fa-lg"></i> Upgrade!
                                      </button>
                                    <!-- <a href="{{route('verify_nowpayments')}}">Subscribe <i class="fas fa-arrow-right"></i></a> -->
                                  </div>
                @endif                     

                  
                </div>
                </form>
                </div>
                @endforeach
          </div>
          </div>
          

</div>
  </div>
  </div>
              </div>
          </div>
        </section>
</x-app-layout>

