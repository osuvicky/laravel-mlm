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
                    <h4>Roles</h4>
                    <label> <code>: {{ $user->email}}</code></label>
                  </div>
                  <div class="card-body">
                    <div class="badges">
                  @if ($user->roles)
                      @foreach ($user->roles as $user_role)
                      <form class="btn btn-icon btn-danger" method="POST" action="{{route('admin.users.roles.remove', [$user->id, $user_role->id])}}" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-icon btn-danger" title="remove"><i class="fas fa-times"></i>  {{ $user_role->name}}</button>
                                            </form>
                      @endforeach
                    @endif
                    </div>
                  <form method="POST" action="{{route('admin.users.roles',$user->id)}}">
                     @csrf                  
                     <div class="form-group">
                      <label>Give <code>.roles</code></label>
                      <select class="form-select form-control form-control-sm" name="role">
                      @foreach($roles as $role)
                        <option value="{{$role->name}}">{{$role->name}}</option>
                      @endforeach
                      </select>
                    </div>
                    @error('role')
                      <div class="text-warning mb-2">{{$message}}</div>
                    @enderror
                    <div class="card-footer text-end">
                    <button class="btn btn-primary mr-1" type="submit">Assign</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                  </form>
                    </div>
            </div>

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4> Permissions</h4>
                  </div>
                  <div class="card-body">
                    <div class="badges">
                  @if ($user->permissions)
                      @foreach ($user->permissions as $user_permission)
                      <form class="btn btn-icon btn-danger" method="POST" action="{{route('admin.users.permissions.revoke', [$user->id, $user_permission->id])}}" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-icon btn-danger" title="remove"><i class="fas fa-times"></i>  {{ $user_permission->name}}</button>
                                            </form>
                      @endforeach
                    @endif
                    </div>
                  <form method="POST" action="{{route('admin.users.permissions',$user->id)}}">
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