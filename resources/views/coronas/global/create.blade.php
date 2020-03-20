@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="back-btn mb-40"><a href="{{ route('coronas.global.index') }}" class="btn btn-primary">Back to Home</a></div>
<div class="card uper">
  <div class="card-header">
    Add Corona Virus Data
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
      <form method="post" action="{{ route('coronas.global.store.global') }}">

        {{ csrf_field() }}

          <div class="form-group">
              <label for="country_name">Country Name:</label>
              <input type="text" class="form-control" name="country_name"/>
          </div>
          <div class="form-group">
              <label for="cases">Cases :</label>
              <input type="text" class="form-control" name="cases"/>
          </div>
          <div class="form-group">
            <label for="deaths">Deaths :</label>
            <input type="text" class="form-control" name="deaths"/>
          </div>
          <div class="form-group">
            <label for="recovered">Recovered :</label>
            <input type="text" class="form-control" name="recovered"/>
          </div>
          <button type="submit" class="btn btn-primary">Add Data</button>
      </form>
  </div>
</div>
@endsection