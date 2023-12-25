@php
    $concerns = App\Models\SisterConcern::all();
    $head = App\Models\ConcernHeader::first();
@endphp
<section class="service-style-one">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="heading">
                    <figure>
                      <img src="{{asset($head->sec_icon)}}" alt="Heading Icon">
                    </figure>
                    <span>{{$head->sub_header}}</span>
                    <h2>{{$head->sec_header}}</h2>
                  </div>
            </div>
        </div>
      <div class="row">
        @foreach($concerns as $item)
          @if($item->status == 1)
            <div class="col-lg-4 col-md-6 col-sm-12 text-center mb-3" >
            <div class="service-data shadow">
              <div class="svg-icon d-flex-all">
                <img class="light-icon" src="{{asset($item->company_icon_one)}}" alt="{{$item->company_title}}">
                <img class="dark-icon" src="{{asset($item->company_icon_two)}}" alt="{{$item->company_title}}">
              </div>
              <h3><a href="service-detail.html">{{$item->company_title}}</a></h3>
              <p>{!! $item->company_desc !!}</p>
              <a class="icon" href="service-detail.html">
                <i class="fa-solid fa-angles-right"></i>
              </a>
            </div>
          </div>
          @endif
        @endforeach  
      </div>
    </div>
  </section>