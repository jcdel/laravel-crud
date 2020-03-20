@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Corona Virus Data for China
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('coronas.local.store.local') }}">

        {{ csrf_field() }}

        {{-- <input type="hidden" value="{{$user->id}}" name="corona_global_id"> --}}
        

          <div class="form-group">
              <label for="name">Name:</label>
              <input type="hidden" value="1" name="corona_global_id"/>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="age">Age :</label>
              <input type="text" class="form-control" name="age"/>
          </div>
          <div class="form-group">
            <label for="sex">Sex :</label>
            <input type="text" class="form-control" name="sex"/>
          </div>
          <div class="form-group">
            <label for="address">Address :</label>
            <input type="text" class="form-control" name="address"/>
          </div>
          <div class="form-group">
            <label for="nationality">Nationality :</label>
            <input type="text" class="form-control" name="nationality"/>
          </div>
          <div class="form-group">
            <label for="hospital_name">Hospital :</label>
            <input type="text" class="form-control" name="hospital_name"/>
          </div>
          <button type="submit" class="btn btn-primary">Add Data</button>
      </form>
  </div>
</div>
@endsection