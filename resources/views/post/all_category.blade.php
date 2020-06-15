@extends('welcome')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
            <a href="{{route('add.category')}}" class="btn btn-danger"> Add Category </a>
            <a href="{{route('all.category')}}" class="btn btn-info">  All Category </a>
          {{-- for requird fied validation  --}}
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
        {{-- table  --}}
        <hr>
        <table class="table table-resposive">
            <tr>
              <th> Sl </th>
              <th> Category  </th>
              <th> Slug  </th>
              <th> Action </th>
            </tr>

            @foreach ($category as $row)
              <tr>
                <td> {{$row->id}} </td>
                <td> {{$row->name}} </td>
                <td> {{$row->slug}} </td>

                <td>
                  <a href="{{URL::to('view/category/'.$row->id)}}" class="btn btn-sm btn-info btn-sm"> View </a>
                  <a href="{{URL::to('delete/category/'.$row->id)}}" class="btn btn-sm btn-danger btn-sm" id="delete"> Delete </a>
                  <a href="{{URL::to('edit/category/'.$row->id)}}" class="btn btn-sm btn-info btn-sm"> Edit </a>

                </td>

              </tr>
            @endforeach


        </table>

        </div>
      </div>
    </div>
@endsection
