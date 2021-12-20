@extends('layouts.app')
@section('page_title')
Edit
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>edit Settings</h4>
              </div>
              @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
            @endif
              <form action="{{route('settings.update',$set->id)}}" method="post"  enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea name="value" class="form-control" placeholder="value"value="{{ $set->value }}"></textarea>
                      </div>
                </div>
                <!-- <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Value</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea><input name="value" class="form-control" placeholder="value"value="{{ $set->value }}"></textarea>
                  </div>
                </div> -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection