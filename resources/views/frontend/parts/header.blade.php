@php
    $header= App\Models\Header::first();    
    $contact= App\Models\AddressCard::first();    
    $intro= App\Models\CompanyIntro::first();    
@endphp
<header class="header-style-one" >
    <div class="container">
      <div class="row">
        <div class="desktop-nav" id="stickyHeader">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="d-flex-all justify-content-between">
                  <div class="header-logo">
                    <a href="{{url('/')}}">
                      <figure>
                        <img src="{{asset($header->header_logo)}}" alt="logoo">
                      </figure>
                    </a>
                  </div>
                  <div class="nav-bar">
                    <ul>
                      <li class="menu-item-has-children">
                        <a href="javascript:void(0)">Home</a>
                        <ul class="sub-menu">
                          <li><a href="index.html">Home One</a></li>
                          <li><a href="index-2.html">Home Two</a></li>
                          <li><a href="index-3.html">Home Three</a></li>
                        </ul>
                      </li>
                      <li class="menu-item-has-children">
                        <a href="javascript:void(0)">About</a>
                        <ul class="sub-menu">
                          <li><a href="about.html">About Company</a></li>
                          <li><a href="core-values.html">Core Values</a></li>
                          <li><a href="leadership.html">Leadership</a></li>
                          <li><a href="history.html">History</a></li>
                        </ul>
                      </li>
                      <li class="menu-item-has-children"><a href="JavaScript:void(0)">Shop</a>
                        <ul class="sub-menu">
                          <li class="menu-item-has-children">
                            <a href="javascript:void(0)">Our Products</a>
                            <ul class="sub-menu">
                              <li><a href="product-list.html">Product List</a></li>
                              <li><a href="product-grid.html">Product Grid</a></li>
                            </ul>
                          </li>
                          <li><a href="product-detail.html">Product Details</a></li>
                          <li><a href="cart.html">Shop Cart</a></li>
                          <li><a href="checkout.html">Cart Checkout</a></li>
                        </ul>
                      </li>
                      <li class="menu-item-has-children"><a href="JavaScript:void(0)">Pages</a>
                        <ul class="sub-menu">
                          <li class="menu-item-has-children">
                            <a href="javascript:void(0)">Services</a>
                            <ul class="sub-menu">
                              <li><a href="services.html">what we do</a></li>
                              <li><a href="service-detail.html">Service Detail</a></li>
                            </ul>
                          </li>
                          <li class="menu-item-has-children">
                            <a href="javascript:void(0)">Projects</a>
                            <ul class="sub-menu">
                              <li><a href="our-projects-1.html">Our Projects One</a></li>
                              <li><a href="our-projects-2.html">Our Projects Two</a></li>
                              <li><a href="project-detail.html">Project Detail</a></li>
                            </ul>
                          </li>
                          <li class="menu-item-has-children">
                            <a href="javascript:void(0)">Team</a>
                            <ul class="sub-menu">
                              <li><a href="our-team.html">Our Team</a></li>
                              <li><a href="team-detail.html">Team Detail</a></li>
                            </ul>
                          </li>
                          <li><a href="login.html">Login & Register</a></li>
                        </ul>
                      </li>
                      <li class="menu-item-has-children">
                        <a href="javascript:void(0)">News</a>
                        <ul class="sub-menu">
                          <li><a href="our-blog-1.html">Our Blog One</a></li>
                          <li><a href="our-blog-2.html">Our Blog Two</a></li>
                          <li><a href="blog-detail.html">Blog Detail</a></li>
                        </ul>
                      </li>
                      <li>
                        <a href="contact.html">Contact</a>
                      </li>
                    </ul>
                    
                    <div class="extras">
                      <div class="theme-color">
                        <img src="{{asset('front-asset/assets/images/sun.png')}}" alt="" id="theme-icon">

                    </div>
                      <a href="javascript:void(0)" id="mobile-menu" class="menu-start">
                        <svg id="ham-menu" viewBox="0 0 100 100"> <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" /> <path class="line line2" d="M 20,50 H 80" /> <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" /> </svg>
                      </a>
                      <a href="javascript:void(0)" id="desktop-menu" class="menu-start">
                        <svg id="ham-menue" viewBox="0 0 100 100"> <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" /> <path class="line line2" d="M 20,50 H 80" /> <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" /> </svg>
                      </a>
                      <a href="tel:{{$header->mobile}}" class="theme-btn">{{$header->mobile}} 
                        <i>
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="62" viewBox="0 0 40 62">
                          <defs>
                            <clipPath id="saddasdasdasdasda">
                              <rect width="40" height="62"/>
                            </clipPath>
                          </defs>
                          <g id="Mobisdfle" clip-path="url(#saddasdasdasdasda)">
                            <path id="Path_125" data-name="Path 1" d="M10,6a4,4,0,0,0-4,4V50a4,4,0,0,0,4,4H28a4,4,0,0,0,4-4V10a4,4,0,0,0-4-4H10m0-6H28A10,10,0,0,1,38,10V50A10,10,0,0,1,28,60H10A10,10,0,0,1,0,50V10A10,10,0,0,1,10,0Z" transform="translate(1 1)"/>
                            <path id="Path_4342" data-name="Path 2" d="M2.5,0h7a2.5,2.5,0,0,1,0,5h-7a2.5,2.5,0,0,1,0-5Z" transform="translate(14 48)"/>
                          </g>
                        </svg>
                        </i>
                      </a>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mobile-nav" id="mobile-nav">
          <div class="res-log">
            <a href="index.html">
              <img src="{{asset('front-asset/assets/images/Builty-Logo.svg')}}" alt="Responsive Logo">
            </a>
          </div>
          <ul>
            <li class="menu-item-has-children">
              <a href="javascript:void(0)">Home</a>
              <ul class="sub-menu">
                <li><a href="index.html">Home One</a></li>
                <li><a href="index-2.html">Home Two</a></li>
                <li><a href="index-3.html">Home Three</a></li>
              </ul>
            </li>
            <li class="menu-item-has-children">
              <a href="javascript:void(0)">About</a>
              <ul class="sub-menu">
                <li><a href="about.html">About Company</a></li>
                <li><a href="core-values.html">Core Values</a></li>
                <li><a href="leadership.html">Leadership</a></li>
                <li><a href="history.html">History</a></li>
              </ul>
            </li>
            <li class="menu-item-has-children"><a href="JavaScript:void(0)">Shop</a>
              <ul class="sub-menu">
                <li class="menu-item-has-children">
                  <a href="javascript:void(0)">Our Products</a>
                  <ul class="sub-menu">
                    <li><a href="product-list.html">Product List</a></li>
                    <li><a href="product-grid.html">Product Grid</a></li>
                  </ul>
                </li>
                <li><a href="product-detail.html">Product Details</a></li>
                <li><a href="cart.html">Shop Cart</a></li>
                <li><a href="checkout.html">Cart Checkout</a></li>
              </ul>
            </li>
            <li class="menu-item-has-children"><a href="JavaScript:void(0)">Pages</a>
              <ul class="sub-menu">
                <li class="menu-item-has-children">
                  <a href="javascript:void(0)">Services</a>
                  <ul class="sub-menu">
                    <li><a href="services.html">what we do</a></li>
                    <li><a href="service-detail.html">Service Detail</a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children">
                  <a href="javascript:void(0)">Projects</a>
                  <ul class="sub-menu">
                    <li><a href="our-projects-1.html">Our Projects One</a></li>
                    <li><a href="our-projects-2.html">Our Projects Two</a></li>
                    <li><a href="project-detail.html">Project Detail</a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children">
                  <a href="javascript:void(0)">Team</a>
                  <ul class="sub-menu">
                    <li><a href="our-team.html">Our Team</a></li>
                    <li><a href="team-detail.html">Team Detail</a></li>
                  </ul>
                </li>
                <li><a href="login.html">Login & Register</a></li>
              </ul>
            </li>
            <li class="menu-item-has-children">
              <a href="javascript:void(0)">News</a>
              <ul class="sub-menu">
                <li><a href="our-blog-1.html">Our Blog One</a></li>
                <li><a href="our-blog-2.html">Our Blog Two</a></li>
                <li><a href="blog-detail.html">Blog Detail</a></li>
              </ul>
            </li>
            <li>
              <a href="contact.html">Contact</a>
            </li>
          </ul>
          <a href="JavaScript:void(0)" id="res-cross"></a>
        </div>
        <div class="mobile-nav desktop-menu">
          <h2>{{$intro->about_title}}</h2>
          <p class="des">{{$intro->about_desc}}</p>
          <figure>
            <img src="{{asset($intro->about_img)}}" alt="{{$intro->about_title}}">
          </figure>
          <h3>{{$contact->widget_title}}</h3>
          <p class="num">{{$contact->office_phone}}</p>
          <p class="adrs">{{$contact->address}}</p>
          <div class="social-medias">
              <a href="javascript:void(0)">Facebook</a>
              <a href="javascript:void(0)">Twitter</a>
              <a href="javascript:void(0)">Linkedin</a>
            </div>
        </div>
      </div>
    </div>
  </header>