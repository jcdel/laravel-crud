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
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value="{{ $coronaLocalCase->name }}"/>
          </div>
          <div class="form-group">
              <label for="age">Age :</label>
              <input type="text" class="form-control" name="age" value="{{ $coronaLocalCase->age }}"/>
          </div>
          <div class="form-group">
            <label for="sex">Sex :</label>
            <input type="text" class="form-control" name="sex" value="{{ $coronaLocalCase->sex }}"/>
          </div>
          <div class="form-group">
            <label for="address">Address :</label>
            <input type="text" class="form-control" name="address" value="{{ $coronaLocalCase->address }}"/>
          </div>
          <div class="form-group">
            <label for="nationality">Nationality :</label>
            <input type="text" class="form-control" name="nationality" value="{{ $coronaLocalCase->nationality }}"/>
          </div>
          <div class="form-group">
            <label for="hospital_name">Hospital :</label>
            <input type="text" class="form-control" name="hospital_name" value="{{ $coronaLocalCase->hospital_name }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection