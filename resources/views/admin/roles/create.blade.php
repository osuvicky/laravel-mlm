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
                    <h4>Create Role</h4>
                  </div>
                  <div class="card-body">
                  <form method="POST" action="{{route('admin.roles.store')}}">
                     @csrf
                    <div class="form-group">
                      <label>Please input role name</label>
                      <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    </div>
                    @error('name')
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

@endsection