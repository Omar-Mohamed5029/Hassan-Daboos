@extends('front.layouts.app')
@section('content')

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>All plants</h2>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Breadcrumbs -->
  <br>
  <div class="container" data-aos="fade-up">
    <a href="{{route('allplants.create')}}">create plant</a>
    <br>
  </div>
  <section id="service" class="services pt-0">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <span>Our Plants</span>
        <h2>Our Plants</h2>

      </div>

      <div class="row gy-4">
        @foreach($plants as $plant)
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="card">
            <div class="card-img">
              <img src="{{asset('front/uploads/'.$plant->image)}}" alt="" class="img-fluid">
            </div>
            <h3><a>{{$plant->name}}</a></h3>
            <p>{{$plant->price}} $</p>
            <p>{{$plant->description}}</p>
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <div class="text-center">
                    <!-- <button type="submit" class="btn btn-info">Edit</button>
                    <button type="submit" class="btn btn-danger">Delete</button> -->
                    <a class="btn btn-info me-3" href="{{route('allplants.edit', $plant->id) }}">edit</a>
                    <br>
                    <form action="{{ route('allplants.destroy',$plant->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger me-3">Delete</button>
                    </form>
                  </div>
                  <br>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Card Item -->
        @endforeach

      </div>

    </div>
  </section>
  <br>
  @if(session('success')!= null)
  <div class="alert alert-success">{{session('success')}}</div>
  <br>
  @endif





</main>


@endsection