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
<div class="title text-center mb-40"><h1>2019-2020 Corona Virus Pandemic</h1></div>
 <div class="create-btn mb-40"><a href="{{ route('coronas.global.create')}}" class="btn btn-primary">Add Corona Virus Data</a></div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Country Name</td>
          <td>Cases</td>
          <td>Deaths</td>
          <td>Recovered</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($coronaGlobalCases as $case)
        <tr>
            <td>{{ $case->id }}</td>
            <td>{{ $case->country_name }}</td>
            <td>{{ number_format($case->cases) }}</td>
            <td>{{ number_format($case->deaths) }}</td>
            <td>{{ number_format($case->recovered) }}</td>
            <td>
              <form action="{{ route('coronas.global.edit', $case->id)}}" method="post">
                @csrf
                @method('PATCH')
                <button class="btn btn-primary" type="submit">Edit</button>
              </form>
            </td>
              {{-- <a href="{{ route('coronas.global.edit', $case->id)}}" class="btn btn-primary">Edit</a></td> --}}
            <td>
                <form action="{{ route('coronas.global.destroy', $case->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection