@extends('admin.layouts.main-layout')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
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
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Roles</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                      <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Date</th>
                          <th>Role</th>
                          <th>Permission</th>
                          <th>Delete</th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>                        
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>date</td>
                          <td><a href="{{ route('admin.users.show',$user->id)}}" class="btn btn-icon btn-warning"><i class="far fa-edit"></i>Roles</a></td>
                          <td><a href="{{ route('admin.users.show',$user->id)}}" class="btn btn-icon btn-success"><i class="far fa-edit"></i>Permission</a></td>
                          <td><form method="POST" action="{{route('admin.users.destroy',$user->id)}}" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </table>
                      
                    </div>
                  </div>	
                </div>
              </div>
            </div>
</div>
</div>
            @endsection