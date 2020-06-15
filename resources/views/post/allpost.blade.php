@extends('welcome')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto">
            <a href="{{route('write.post')}}" class="btn btn-danger"> Write Post </a>

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
              <th> Title  </th>
              <th> Image </th>
              <th> Action </th>
            </tr>

            @foreach ($post as $row)
              <tr>
                <td> {{$row->id}} </td>
                <td> {{$row->name}} </td>
                <td> {{$row->title}} </td>
                <td> <img src="{{URL::to($row->image)}}" style="heigth:40px;width:79px;" </td>

                <td>
                  <a href="{{URL::to('view/post/'.$row->id)}}" class="btn btn-sm btn-info btn-sm"> View </a>
                  <a href="{{URL::to('delete/post/'.$row->id)}}" class="btn btn-sm btn-danger btn-sm" id="delete"> Delete </a>
                  <a href="{{URL::to('edit/post/'.$row->id)}}" class="btn btn-sm btn-info btn-sm"> Edit </a>

                </td>

              </tr>
            @endforeach


        </table>

        </div>
      </div>
    </div>
@endsection
