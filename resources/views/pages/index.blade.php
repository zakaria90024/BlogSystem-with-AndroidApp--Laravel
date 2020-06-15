@extends('welcome')
@section('content')
  <div class="row">
    <div class="col-lg-12 col-md-12 mx-auto">
      <div class="post-preview">
        @foreach ($post as $key)
          <a href="{{URL::to('view/post/'.$key->id)}}">
            <h4 class="post-title">
                <a href="{{URL::to('view/post/'.$key->id)}}"> {{$key->title}} </a>

            </h4>  <p> Created At :  {{$key->created_at}}</p><hr><br>

            <img src="" style="heigth:250px; width:400px; float:center;">
            <div class="text-center">
              <img src="{{$key->image}}" class="img-fluid" alt="Responsive image">
          </div>
            <p>
              {{$key->details}}
            </p>
          </a>

        <p> Category:<b> {{$key->name}} </b>
          Slug in <b> {{$key->slug}}</b>
            </p>
        </p><hr><br>

        @endforeach
        {{$post->links()}}



      </div>
      <hr>

    </div>
  </div>
@endsection
