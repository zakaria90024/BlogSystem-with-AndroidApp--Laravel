@extends('welcome')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">


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
          <form action="{{url('student/'.$student->id)}}" method="post">
              @csrf
              @method('PUT')
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Category Name</label>
                <input type="text" class="form-control" placeholder="Student name" value="{{$student->name}}" name="name" >

              </div>
            </div>

            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Slug Name</label>
                <input type="text" class="form-control" placeholder="Student email" value="{{$student->email}}" name="email" >

              </div>
            </div>

            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Slug Name</label>
                <input type="number" class="form-control" placeholder="Student phone"  value="{{$student->phone}}" name="phone" >

              </div>
            </div>

            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection
