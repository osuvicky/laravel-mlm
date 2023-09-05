@extends('admin.layouts.main-layout')
@section('content')
   <!-- Main Content -->
   <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Plan</h4>
                  </div>
                  <div class="card-body">
                  <form method="POST" action="{{route('admin.plans.store')}}">
                     @csrf
                     <div class="row">
                     <div class="form-group col-6">
                      <label>Please input plan name</label>
                      <input type="text" name="name" class="form-control" required value="{{old('name')}}">
                    </div>
                    @error('name')
                      <div class="text-warning mb-2">{{$message}}</div>
                    @enderror
                    <div class="form-group col-6">
                      <label>Please input plan amount</label>
                      <input type="text" name="amount" class="form-control" required value="{{old('amount')}}">
                    </div>
                    @error('amount')
                      <div class="text-warning mb-2">{{$message}}</div>
                    @enderror
                    <div class="form-group col-4">
                      <label>Please input plan PV</label>
                      <input type="text" name="pv" class="form-control" required value="{{old('pv')}}">
                    </div>
                    @error('pv')
                      <div class="text-warning mb-2">{{$message}}</div>
                    @enderror
                    <div class="form-group col-4">
                      <label>Please input plan Referral Percentage</label>
                      <input type="text" name="ref_percent" class="form-control" required value="{{old('ref_percent')}}">
                    </div>
                    @error('ref_percent')
                      <div class="text-warning mb-2">{{$message}}</div>
                    @enderror
                    <div class="form-group col-4">
                      <label>Please input plan GiG Percent</label>
                      <input type="text" name="gig_percent" class="form-control" required value="{{old('gig_percent')}}">
                    </div>
                    @error('gig_percent')
                      <div class="text-warning mb-2">{{$message}}</div>
                    @enderror
                    <div class="card-footer text-end">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
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
@endsection