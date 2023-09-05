<x-app-layout>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <img alt="image" src="{{asset('')}}dashboard_assets/assets/img/users/user1.png" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>
                      </div>
                      <div class="author-box-job">{{ Auth::user()->email }}</div>
                    </div>
                    <div class="text-center">
                      <div class="author-box-description">
                      <input type="text" class="form-control" placeholder="1234 Main St" value="{{ URL::to('/') }}/referral-register?ref={{ Auth::user()->referral_code }}" >
                        
                        <!-- <p>{{ Auth::user()->referral_code }}</p> -->
                        <p style="cursor:pointer;" data-code="{{ Auth::user()->referral_code }}" class="copy"><span class="fa fa-copy mr-1"></span>
                          copy referral link
                        </p>
                      </div>
                      <div class="mb-2 mt-3">
                        <div class="text-small fw-bold">Share Your Link</div>
                      </div>
                      <a href="https://www.facebook.com/sharer.php?u={{ URL::to('/') }}/referral-register?ref={{ Auth::user()->referral_code }}" title="Share via Facebook" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                      <a href="https://www.twitter.com/intent/tweet?text={{ URL::to('/') }}/referral-register?ref={{ Auth::user()->referral_code }}" title="Share via Facebook" target="_blank">
                        <i class="fab fa-twitter"></i>
                      </a>
                      <a href="https://api.whatsapp.com/send?text={{ URL::to('/') }}/referral-register?ref={{ Auth::user()->referral_code }}" target="_blank" data-action="share/whatsapp/share" title="share via Whatsapp">
                        <i class="fab fa-whatsapp"></i>
                      </a>
                      <a href="https://www.instagram.com/sharer.php?u={{ URL::to('/') }}/referral-register?ref={{ Auth::user()->referral_code }}" title="Share via Facebook" target="_blank">
                        <i class="fab fa-instagram"></i>
                      </a>
                      <a href="https://t.me/share/url?url={{ URL::to('/') }}/referral-register?ref={{ Auth::user()->referral_code }}&text=Referral%20Link!" title="Share via Facebook" target="_blank">
                      <i class="fab fa-telegram"></i>
                      </a> 
                      <a href="https://mail.google.com/mail/u/0/?view=cm&to&su=Referral+Link!&body={{ URL::to('/') }}/referral-register?ref={{ Auth::user()->referral_code }}%0A&bcc&cc&fs=1&tf=1">
                      <i class="far fa-envelope"></i>
                      </a>
       
                      <!-- <a href="#" class="btn btn-social-icon mr-1 btn-github">
                        <i class="fab fa-telegram-plane"></i>
                      </a>
                      <button class="btn btn-social-icon mr-1 btn-github" onclick="Hello()" title="Copy Link"><i class="fa fa-clipboard fa-2x"></i></button> -->
                      <div class="w-100 d-sm-none"></div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Personal Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-4">
                      <p class="clearfix">
                        <span class="float-start">
                          Birthday
                        </span>
                        <span class="float-right text-muted">
                          30-05-1998
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-start">
                          Phone
                        </span>
                        <span class="float-right text-muted">
                          (0123)123456789
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-start">
                          Mail
                        </span>
                        <span class="float-right text-muted">
                          {{ Auth::user()->email }}
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-start">
                          Facebook
                        </span>
                        <span class="float-right text-muted">
                          <a href="#">John Deo</a>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-start">
                          Twitter
                        </span>
                        <span class="float-right text-muted">
                          <a href="#">@johndeo</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Skills</h4>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                      <li class="media">
                        <div class="media-body">
                          <div class="media-title">Java</div>
                        </div>
                        <div class="media-progressbar p-t-10">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-primary" data-width="70%"></div>
                          </div>
                        </div>
                      </li>
                      <li class="media">
                        <div class="media-body">
                          <div class="media-title">Web Design</div>
                        </div>
                        <div class="media-progressbar p-t-10">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-warning" data-width="80%"></div>
                          </div>
                        </div>
                      </li>
                      <li class="media">
                        <div class="media-body">
                          <div class="media-title">Photoshop</div>
                        </div>
                        <div class="media-progressbar p-t-10">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-green" data-width="48%"></div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="row">
                        <div class="card-header">
                            <h4>Update Profile</h4>
                          </div>
                        @include('profile.partials.update-profile-information-form')
                        </div>
                        
                      </div>
                      
                  </div>
                </div>
              </div>
            
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="row">
                        <div class="card-header">
                            <h4>Update Password</h4>
                          </div>
                          @include('profile.partials.update-password-form')
                        </div>
                        
                      </div>
                      
                  </div>
                </div>
              </div>
            </div>

          </div>
        </section>
        <script>
        $(document).ready(function(){
          $('.copy').click(function(){
            $(this).parent().prepend('<span class="text-success mb-2">Copied</span>');

            var code = $(this).attr('data-code');
            var url = "{{ URL::to('/') }}/referral-register?ref="+code;

            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(url).select();
            document.execCommand("copy");
            $temp.remove();

            setTimeout(() => {
              $('.copied_text').remove();
            }, 1000);
          });
        });
      </script>
</x-app-layout>
