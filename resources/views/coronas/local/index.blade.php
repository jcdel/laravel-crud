@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
  .mb-40 {
    margin-bottom: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <div class="back-btn mb-40"><a href="{{ route('coronas.global.index') }}" class="btn btn-primary">Back to Home</a></div>
  <div class="title text-center mb-40"><h1>Corona Virus of China</h1></div>
  <div class="create-btn mb-40"><a href="{{ route('coronas.local.create.local', Request::segment(2)) }}" class="btn btn-primary">Add Data</a></div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Case No.</td>
          <td>Age</td>
          <td>Gender</td>
          <td>Nationality</td>
          <td>Hospital</td>
          <td>Status</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>

        @foreach($coronaLocalCases as $case)
        <tr>
            <td>{{ $case['id'] }}</td>
            <td>{{ $case['age'] }}</td>
            <td>{{ $case['gender'] }}</td>
            <td>{{ $case['nationality'] }}</td>
            <td>{{ $case['hospital_name'] }}</td>
            <td>{{ $case['status'] }}</td>
            <td><a href="{{ route('coronas.local.edit', $case['id'])}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('coronas.local.destroy', $case['id'])}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection