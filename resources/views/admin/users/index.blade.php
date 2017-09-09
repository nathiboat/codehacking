@extends('layouts.admin')
@section('content')
    @if(Session::has('deleted_user'))
       <div class="row">
           <div class="col-xs-12">
               <div class="panel panel-danger">
                   <div class="panel-body">
                       <p>{{session('deleted_user')}}</p>
                   </div>
               </div>
           </div>
       </div>
    @endif
    <h1>User</h1>
    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
         @if($users)
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>
                    <img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/50x50'}}" alt="" class="img-responsive img-rounded" style="width: 50px">
                </td>
                <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
            </tr>
            @endforeach
         @endif

        </tbody>

    </table>

@stop