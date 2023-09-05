@extends('admin.layouts.main-layout')
@section('content')
   <!-- Main Content -->
   <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
            @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{$message}}
                      </div>
                    </div>
            @elseif ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{$message}}
                      </div>
                    </div>
            @endif
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Permission</h4>
                  </div>
                  <div class="card-body">
                  <form method="POST" action="{{route('admin.plans.update',$plan)}}">
                     @csrf
                     @method('PUT')
                     <div class="row">
                     <div class="form-group col-6">
                      <label>Please input plan name</label>
                      <input type="text" name="name" class="form-control" required value="{{$plan->name}}">
                    </div>
                    @error('name')
                      <div class="text-warning mb-2">{{$message}}</div>
                    @enderror
                    <div class="form-group col-6">
                      <label>Please input plan amount</label>
                      <input type="text" name="amount" class="form-control" required value="{{$plan->amount}}">
                    </div>
                    @error('amount')
                      <div class="text-warning mb-2">{{$message}}</div>
                    @enderror
                    <div class="form-group col-4">
                      <label>Please input plan PV</label>
                      <input type="text" name="pv" class="form-control" required value="{{$plan->pv}}">
                    </div>
                    @error('pv')
                      <div class="text-warning mb-2">{{$message}}</div>
                    @enderror
                    <div class="form-group col-4">
                      <label>Please input plan Referral Percentage</label>
                      <input type="text" name="ref_percent" class="form-control" required value="{{$plan->ref_percent}}">
                    </div>
                    @error('ref_percent')
                      <div class="text-warning mb-2">{{$message}}</div>
                    @enderror
                    <div class="form-group col-4">
                      <label>Please input plan GiG Percent</label>
                      <input type="text" name="gig_percent" class="form-control" required value="{{$plan->gig_percent}}">
                    </div>
                    @error('gig_percent')
                      <div class="text-warning mb-2">{{$message}}</div>
                    @enderror
                    <div class="card-footer text-end">
                    <button class="btn btn-primary mr-1" type="submit">Update</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
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
@endsection