@php
    $welcome = App\Models\WelcomeMessage::first();
@endphp
<section class="gap about-style-one">
    <div class="container">
      <div class="row">
        <div class="col-lg-6" >
          <div class="about-data-left">
            <figure>
              <img src="{{asset($welcome->welcome_image_one)}}" alt="About One">
            </figure>
            <figure class="about-image">
              <img src="{{asset($welcome->welcome_image_two)}}" alt="About Two">
            </figure>
          </div>
        </div>
        <div class="col-lg-6" >
          <div class="about-data-right">
            <span>{{$welcome->welcome_sub_title}}</span>
            <h2>{{$welcome->welcome_title}}</h2>
            <div class="about-info">
              <p>
                {{$welcome->welcome_message}}
              </p>
              <figure>
                <img src="{{asset($welcome->sign)}}" alt="Signature">
              </figure>
              <h3>{{$welcome->user_name}}</h3>
              <h4>{{$welcome->user_designation}}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>