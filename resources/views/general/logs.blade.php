@extends('layouts.app')
@section('page_title')
Logs
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Activity Logs</h2>
        </div>
    </div>
</div>
<form action="{{route('search.records')}}" method="post">
@csrf
<div class="row">
  <div class="col-md-5">
    <div class="container">
      <input class="date form-control fromDate" name="to" type="date">
    </div>

  </div>
  <div class="col-md-5">
    <div class="container">
        <input class="date form-control toDate" name="from" type="date">
    </div>
    <div class="container">
        <input class="date form-control toDate" name="submit" type="submit">
    </div>

  </div>
</div>
</form>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    
                      <tr>
                        
                        <th>ID</th>
                        <th>Log Name</th>
                        <th>Description</th>
                        <th>Subject Type</th>
                        <th>Subject ID</th>
                        <th>Causer Type</th>
                        <th>Causer ID</th>
                        <th>Properties</th>
                      </tr>
                    
                    
                      @foreach($activities as $activity)
                      <tr>
                      
                        
                      
                        <td>{{$activity->id}}</td>
                        <td>{{$activity->log_name}}</td>
                        <td>{{$activity->description}}</td>
                        <td>{{$activity->subject_type}}</td>
                        <td>{{$activity->subject_id}}</td>
                        <td>{{$activity->causer_type}}</td>
                        <td>{{ $activity->user->name . ' (' . $activity->user->id . ')' ?? $activity->causer_id }}</td>
                        <td>{{$activity->properties}}</td>
                        
                        
                      </tr>
                      @endforeach
                    
                  </table>
                </div>
                
@endsection