@php
    $sliders = App\Models\Slider::all();
@endphp

  <section class="featured-slider-one" style="background: grey;">
    <div class="containe">
      <div class="ro f-slider-one owl-carousel">
        @foreach ($sliders as $item)
            <div class="f-slider-layer">
                <img src="{{asset($item->slider_img)}}" alt="{{$item->slider_title}}">
                <div class="f-slider-one-data">
                    <h1>{{$item->slider_title}}</h1>
                    <p>{{$item->slider_desc}}</p>
                    <a href="{{$item->btn_link}}" data-bs-toggle="modal" data-bs-target="#{{$item->model_id}}" class="theme-btn">{{$item->btn_title}} <i class="fa-solid fa-angles-right"></i></a>
                </div>
            </div>
        @endforeach
      </div>
    </div>
  </section> 

