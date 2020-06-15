@extends('welcome')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
            <a href="{{route('add.category')}}" class="btn btn-danger"> Add Category </a>
            <a href="{{route('all.category')}}" class="btn btn-info">  All Category </a>
            <a href="{{route('all.post')}}" class="btn btn-info">  All Post </a>

            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            <hr>

        <div>

          <ol>

            <h4>{{$post->title}} </h4><hr><br>
            <div class="text-center">
              <img src="{{URL::to($post->image)}}" class="img-fluid" alt="Responsive image">
            </div>
            <p>{{$post->details}}</p><br>
              <b>Category Name :</b> {{$post->name}}
    
          </ol>

       </div>

        </div>
      </div>
    </div>
@endsection
