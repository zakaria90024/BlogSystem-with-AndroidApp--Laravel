@extends('welcome')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
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

          <form action="{{url('update/post/'.$post->id)}}" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Title</label>
                <input type="text" class="form-control" value="{{$post->title}}" placeholder="Title" name="title" required>

              </div>
            </div>




            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Post image</label>
                <input type="file" class="form-control"   name="image">
                <img src="{{URL::to($post->image)}}" style="heigth:90px width:90px float:cente">
                <input type="hidden" name="old_image" value="{{$post->image}}">
              </div>
            </div>



            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Post Details</label>
                <textarea rows="5" class="form-control"  placeholder="Details" required name="details">
                  {{$post->details}}
                </textarea>

              </div>
            </div>

            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Category</label>
                <select class="form-control" name="category_id">
                  @foreach ($category as $key )
                    <option value="{{$key->id}}" <?php if($key->id == $post->category_id)echo "selected";?> >{{$key->name}} </option>
                  @endforeach


                </select>
              </div>
            </div>

            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection
