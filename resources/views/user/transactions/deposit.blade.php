<x-app-layout>
<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article">
                  <div class="article-header">
                    <div class="article-image" data-background="{{asset('')}}dashboard_assets/assets/img/blog/cards.jpg">
                    </div>
                    <!-- <div class="article-title">
                      <h2><a href="#">The oddest place you will find photo studios</a></h2>
                    </div> -->
                  </div>
                  <div class="article-details">
                    <p>Deposit using cards. </p>
                    <form method="POST" action="{{ route('pay') }}" role="form">
                  <input type="hidden" name="email" value="{{Auth::user()->email}}"> {{-- required --}}
                  <input type="hidden" name="orderID" value="345">
                  <select name="amount" class="form-control">
                        <option value="50">50</option>
                        <option value="100*100">100</option>
                        <option value="200 * 100">200</option>
                        <option value="500 * 100">500</option>
                    </select>
                  <!-- <input type="number" name="amount" value="*100" class="form-control"> {{-- required in kobo --}} -->
                  <!-- <input type="hidden" name="quantity" value="3"> -->
                  <input type="hidden" name="currency" value="NGN">
                  <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                  <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                  
                  <input type="hidden" name="callback_url" value="{{config('app.url').'register_subscription'}}">

                  <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
                  <br/>
                  <button class="btn btn-primary btn-lg btn-block" type="submit" value="Pay Now!">
                          <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                      </button>
                      </form>
                    <!-- <div class="article-cta">
                      <a href="#" class="btn btn-primary">Deposit</a>
                    </div> -->
                  </div>
                </article>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article">
                  <div class="article-header">
                    <div class="article-image" data-background="{{asset('')}}dashboard_assets/assets/img/blog/crypto.jpg">
                    </div>
                    <!-- <div class="article-title">
                      <h2><a href="#">The oddest place you will find photo studios</a></h2>
                    </div> -->
                  </div>
                  <div class="article-details">
                    <p>Deposit using Crypto</p>
                    <div class="article-cta">
                      <a href="#" class="btn btn-primary">Deposit</a>
                    </div>
                  </div>
                </article>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article">
                  <div class="article-header">
                    <div class="article-image" data-background="{{asset('')}}dashboard_assets/assets/img/blog/paypal.jpg">
                    </div>
                    <!-- <div class="article-title">
                      <h2><a href="#">The oddest place you will find photo studios</a></h2>
                    </div> -->
                  </div>
                  <div class="article-details">
                    <p>Deposit with Paypal</p>
                    <div class="article-cta">
                      <a href="#" class="btn btn-primary">Deposit</a>
                    </div>
                  </div>
                </article>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article">
                  <div class="article-header">
                    <div class="article-image" data-background="{{asset('')}}dashboard_assets/assets/img/blog/cards.jpg">
                    </div>
                    <!-- <div class="article-title">
                      <h2><a href="#">The oddest place you will find photo studios</a></h2>
                    </div> -->
                  </div>
                  <div class="article-details">
                    <p>Deposit with cards</p>
                    <div class="article-cta">
                      <a href="#" class="btn btn-primary">Deposit</a>
                    </div>
                  </div>
                </article>
              </div>
            </div>
</div>
          </div>
        </section>
</x-app-layout>

