@extends('admin.dashboard-master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            
            <form action="{{route('slider.save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$editSlider->id}}">
                <div class="row">

                    <div class="col-md-8 col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="slider_title">{{__('Slider Title')}}</label>
                                    <input type="text" name="slider_title" id="slider_title" value="{{ $editSlider->slider_title }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="slider_desc">{{__('Slider Description')}}</label>
                                    <textarea name="slider_desc" id="slider_desc" cols="30" rows="10" class="form-control">{{$editSlider->slider_desc}}</textarea>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="slider_img">{{__('Slider Image')}}</label>
                                    <input type="file" name="slider_img" id="slider_img" class="form-control">
                                    <input type="hidden" name="slider_old_img" value="{{ $editSlider->slider_img }}">
                                </div>
                                <div class="form-group">
                                    <img src="{{ asset($editSlider->slider_img) }}" class="img-thumbnail" id="SliderImg" alt="site logo">
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="btn_title">{{__('Slider Button Title')}}</label>
                                    <input type="text" name="btn_title" id="btn_title" value="{{ $editSlider->btn_title }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="btn_link">{{__('Slider Button Link')}}</label>
                                    <input type="text" name="btn_link" id="btn_link" value="{{ $editSlider->btn_link }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="model_id">{{__('Slider Modal ID')}}</label>
                                    <input type="text" name="model_id" id="model_id" value="{{ $editSlider->model_id }}" class="form-control">
                                </div>
                                <input type="submit" class="btn btn-success" value="{{__('Save Changes')}}">
                            </div>
                        </div>
                    </div>
                </div>
                
            </form>
                
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {



            $('#slider_img').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#SliderImg').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });
            
            

        });
    </script>
@endsection