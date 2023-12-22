@extends('admin.dashboard-master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{__('Home Page Header Settings')}}</h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{route('header.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$header->id}}">
                        <div class="form-group">
                            <label for="header_logo">{{__('Header Logo')}}</label>
                            <input type="file" name="header_logo" id="header_logo" class="form-control">
                            <input type="hidden" name="oldLogo" value="{{ $header->header_logo }}">
                        </div>
                        <div class="form-group" style="max-width:200px; max-height:200px;">
                            <img src="{{ asset($header->header_logo) }}" class="img-thumbnail"
                                id="headerLogo" alt="site logo">
                        </div>
                        <div class="form-group">
                            <label for="mobile">{{__('Header Mobile')}}</label>
                            <input type="text" name="mobile" id="mobile" value="{{ $header->mobile }}" class="form-control">
                        </div>

                        <input type="submit" class="btn btn-success" value="{{__('Save Changes')}}">
                        
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {



            $('#header_logo').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#headerLogo').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });
            
            

        });
    </script>
@endsection