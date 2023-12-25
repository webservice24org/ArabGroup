@extends('admin.dashboard-master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            
            <form action="{{route('welcomeSave')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$welcome->id}}">
                <div class="row">

                    <div class="col-md-8 col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="welcome_sub_title">{{__('Welcome Sub Title')}}</label>
                                    <input type="text" name="welcome_sub_title" id="welcome_sub_title" value="{{ $welcome->welcome_sub_title }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="welcome_title">{{__('Welcome Title')}}</label>
                                    <input type="text" name="welcome_title" id="welcome_title" value="{{ $welcome->welcome_title }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="welcome_message">{{__('Welcome Description')}}</label>
                                    <textarea name="welcome_message" id="welcome_message" cols="30" rows="10" class="form-control">{{$welcome->welcome_message}}</textarea>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="sign">{{__('Welcome Sign')}}</label>
                                    <input type="file" name="sign" id="sign" class="form-control">
                                    <input type="hidden" name="oldSign" value="{{ $welcome->sign }}">
                                </div>
                                <div class="form-group" style="max-width:200px; max-height:200px;">
                                    <img src="{{ asset($welcome->sign) }}" class="img-thumbnail"
                                        id="signImg" alt="{{$welcome->user_name}}">
                                </div>

                                <div class="form-group">
                                    <label for="user_name">{{__('Welcome Person')}}</label>
                                    <input type="text" name="user_name" id="user_name" value="{{ $welcome->user_name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="user_designation">{{__('Person\'s Designation')}}</label>
                                    <input type="text" name="user_designation" id="user_designation" value="{{ $welcome->user_designation }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="welcome_image_one">{{__('Welcome Image One')}}</label>
                                    <input type="file" name="welcome_image_one" id="welcome_image_one" class="form-control">
                                    <input type="hidden" name="oldImgOne" value="{{ $welcome->welcome_image_one }}">
                                </div>
                                <div class="form-group mb-5">
                                    <img src="{{ asset($welcome->welcome_image_one) }}" class="img-thumbnail"
                                        id="WelcomeImgOne" alt="{{$welcome->welcome_title}}">
                                </div>
                                
                                <div class="form-group mt-5">
                                    <label for="welcome_image_two">{{__('Welcome Image Two')}}</label>
                                    <input type="file" name="welcome_image_two" id="welcome_image_two" class="form-control">
                                    <input type="hidden" name="oldImgTwo" value="{{ $welcome->welcome_image_two }}">
                                </div>
                                <div class="form-group mb-3" >
                                    <img src="{{ asset($welcome->welcome_image_two) }}" class="img-thumbnail"
                                        id="WelcomeImgTwo" alt="{{$welcome->welcome_image_two}}">
                                </div>
                               
                            </div>
                            <div class="card-footer">
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

            $('#sign').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#signImg').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });
            
            $('#welcome_image_one').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#WelcomeImgOne').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

            $('#welcome_image_two').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#WelcomeImgTwo').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

                });

        });
    </script>
@endsection