<x-app-layout>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">

        <div class="col-md-6 col-lg-12 col-xl-6">
              <div class="card">
                <div class="card-header">
                  <h4>Projects Payments</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th>SL No</th>
                          <th>user ID</th>
                          <th>Level</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach($members as $memb)
                        <ul>
                            <li>{{$memb->referral_code}}</li>
                            <li>{{$memb->email}}</li>
                        </ul>
                        @endforeach
                   
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </section>
        </div>
</x-app-layout>