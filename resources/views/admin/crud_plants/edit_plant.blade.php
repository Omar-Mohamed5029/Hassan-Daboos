@extends('front.layouts.app')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Create plant</h2>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Breadcrumbs -->
      <br>
    <div class="container" data-aos="fade-up">
    <form action="{{route('allplants.update', $plant->id)}}"  method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product name</label>
    <input type="text" name ="name" value="{{$plant->name}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product price</label>
    <input type="num" name ="price" value="{{$plant->price}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
<br>
  <label for="exampleInputEmail1" class="form-label">Desription</label>
  <div class="form-floating">
  <textarea class="form-control"  name="description" value="{{$plant->description}}"  style="height: 100px"></textarea>
</div>
<br>
<div class="mb-3">
  <label for="formFile" class="form-label">uplaod</label>
  <input class="form-control" name="image" value="{{asset('front/uploads/'.$plant->image)}}"  type="file" id="formFile">
</div>
 
 <br>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>
    </div>
    <br>
    @if(session('success')!= null)
                    <div class="alert alert-success">{{session('success')}}</div>
                    <br>
                  @endif
  </main>


@endsection
