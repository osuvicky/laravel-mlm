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
                    <h4>Edit Role</h4>
                  </div>
                  <div class="card-body">
                  <form method="POST" action="{{route('admin.roles.update',$role)}}">
                     @csrf
                     @method('PUT')
                    <div class="form-group">
                      <label>role name</label>
                      <input type="text" name="name" class="form-control" value="{{$role->name}}">
                    </div>
                    @error('name')
                      <div class="text-warning mb-2">{{$message}}</div>
                    @enderror
                    <div class="card-footer text-end">
                    <button class="btn btn-primary mr-1" type="submit">Update</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                  </form>
                    </div>
                </div>
            
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Give Permission</h4>
                  </div>
                  <div class="card-body">
                    <div class="badges">
                  @if ($role->permissions)
                      @foreach ($role->permissions as $role_permission)
                      <form class="btn btn-icon btn-danger" method="POST" action="{{route('admin.roles.permissions.revoke', [$role->id, $role_permission->id])}}" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-icon btn-danger" title="remove"><i class="fas fa-times"></i>  {{ $role_permission->name}}</button>
                                            </form>
                      @endforeach
                    @endif
                    </div>
                  <form method="POST" action="{{route('admin.roles.permissions',$role->id)}}">
                     @csrf                  
                     <div class="form-group">
                      <label>Give <code>.permissions</code></label>
                      <select class="form-select form-control form-control-sm" name="permission">
                      @foreach($permissions as $permission)
                        <option value="{{$permission->name}}">{{$permission->name}}</option>
                      @endforeach
                      </select>
                    </div>
                    @error('permission')
                      <div class="text-warning mb-2">{{$message}}</div>
                    @enderror
                    <div class="card-footer text-end">
                    <button class="btn btn-primary mr-1" type="submit">Assign</button>
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