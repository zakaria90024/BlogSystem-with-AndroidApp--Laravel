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
        <div>
          <ol>
            <li> Category Name : {{$category->name}} </li>
            <li> Slug Name : {{$category->slug}} </li>
            <li> Created At : {{$category->created_at}} </li>

          </ol>
       </div>

        </div>
      </div>
    </div>
@endsection
