@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Corona Virus Data
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
      <form method="post" action="{{ route('coronas.local.update', $coronaLocalCase->id ) }}">
          <div class="form-group">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
              <label for="age">Age :</label>
              <input type="text" class="form-control" name="age" value="{{ $coronaLocalCase->age }}"/>
          </div>
          <div class="form-group">
            <label for="gender">Gender :</label>
            <input type="text" class="form-control" name="gender" value="{{ $coronaLocalCase->gender }}"/>
          </div>
          <div class="form-group">
            <label for="nationality">Nationality :</label>
            <input type="text" class="form-control" name="nationality" value="{{ $coronaLocalCase->nationality }}"/>
          </div>
          <div class="form-group">
            <label for="hospital_name">Hospital :</label>
            <input type="text" class="form-control" name="hospital_name" value="{{ $coronaLocalCase->hospital_name }}"/>
          </div>
          <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" name="status" value="{{ $coronaLocalCase->status }}"/>
        </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection