@extends('welcome')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto">
            <a href="{{url('student/create')}}" class="btn btn-danger"> Add Student </a>

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
              <th> Student Name  </th>
              <th> Student Mail  </th>
              <th> Student Number  </th>
              <th> Action </th>
            </tr>

            @foreach ($student as $row)
              <tr>
                <td> {{$row->id}} </td>
                <td> {{$row->name}} </td>
                <td> {{$row->email}} </td>
                <td> {{$row->phone}} </td>

                <td>
                  <a href="{{URL::to('student/'.$row->id)}}" class="btn btn-sm btn-info btn-sm"> View </a>

                  <form  action="{{url('student/'.$row->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-danger btn-sm" type="submit"  /> Delete </button>

                  </form>

                  <a href="{{URL::to('student/'.$row->id.'/edit')}}" class="btn btn-sm btn-info btn-sm"> Edit </a>

                </td>

              </tr>
            @endforeach


        </table>

        </div>
      </div>
    </div>
@endsection
