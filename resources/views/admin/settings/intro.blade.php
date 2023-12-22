@extends('admin.dashboard-master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{__('Contact Details for Home Page')}}</h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{route('intro.save')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$intro->id}}">
                        <div class="form-group">
                            <label for="widget_title">{{__('About Widget Title')}}</label>
                            <input type="text" name="widget_title" id="widget_title" value="{{$intro->widget_title}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="about_title">{{__('About Title')}}</label>
                            <input type="text" name="about_title" id="about_title" value="{{$intro->about_title}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="about_desc">{{__('About Description')}}</label>
                            <textarea name="about_desc" id="about_desc" cols="30" rows="10" class="form-control">{{$intro->about_desc}}</textarea>
                            
                        </div>
                        <div class="form-group">
                            <label for="about_img">{{__('About Image')}}</label>
                            <input type="file" name="about_img" id="about_img" class="form-control">
                            <input type="hidden" name="oldImg" value="{{ $intro->about_img }}">
                        </div>
                        <div class="form-group" style="max-width:200px; max-height:200px;">
                            <img src="{{ asset($intro->about_img) }}" class="img-thumbnail"
                                id="aboutImg" alt="{{$intro->about_title}}">
                        </div>

                        <input type="submit" class="btn btn-success" value="{{__('Save Changes')}}">
                        
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {



            $('#about_img').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#aboutImg').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });
            
            

        });
    </script>
@endsection