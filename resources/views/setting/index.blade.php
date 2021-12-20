@extends('layouts.app')

@section('page_title')
	Settings
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Settings</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('settings.create') }}"> Add New Setting</a>
            @endcan
        </div>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-bordered">
                    
                      <tr>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Action</th>
                      </tr>
                    
                    
                      <tr>
                      @foreach($sets as $set)
                        <td><h5>{{$set->name}}</h5></td>
                        <td><p>{{$set->value}}</p></td>
                        <td>
                        <a class="btn btn-primary" href="{{route('settings.edit', $set->id)}}">Edit</a>
                            <a class="btn btn-danger" type="button" href = "{{route('settings.destroy',$set->id)}}">
                            
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>
                        </td>
                      </tr>
                      @endforeach
                    
  </table>
</div>

@endsection