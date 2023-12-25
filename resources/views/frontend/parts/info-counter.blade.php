@php
    $counter = App\Models\InfoCounter::take(3)->get();
@endphp
<section class="gap no-top counter-style-one">
    <div class="container">
      <div class="row">
        @foreach($counter as $item)
        <div class="col-lg-4" >
          <div class="counter-data">
            <div class="counttt">
                <span class="odometer" data-count="{{$item->counter}}" data-status="yes">0</span><i>{{$item->counter_sub_title}}</i>
             
            </div>
            <h4>{{$item->counter_title}}</h4>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>