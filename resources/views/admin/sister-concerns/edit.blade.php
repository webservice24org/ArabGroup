@extends('admin.dashboard-master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            
            <form action="{{route('update.concern')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$editConcern->id}}">
                <div class="row">

                    <div class="col-md-8 col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="company_title">{{__('Company Title')}}</label>
                                    <input type="text" name="company_title" id="company_title" value="{{$editConcern->company_title}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="company_desc">{{__('Company Description')}}</label>
                                    <textarea name="company_desc" id="company_desc" cols="30" rows="10" class="form-control">{{$editConcern->company_desc}}</textarea>
                                    <span id="char_count">{{strlen($editConcern->company_desc)}}</span><span> / 255 characters. </span>
                                    <span id="char_message" style="color: black;"></span>
                                    @error('company_desc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="company_link">{{__('Company Link')}}</label>
                                    <input type="text" name="company_link" id="company_link" value="{{$editConcern->company_link}}" class="form-control">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label for="company_icon_one">{{__('Company Icon One')}}</label>
                                    <input type="file" name="company_icon_one" id="company_icon_one"  class="form-control">
                                    <input type="hidden" name="oldIconOne" value="{{$editConcern->company_icon_one}}">
                                </div>
                                <div class="form-group">
                                    <img src="{{asset($editConcern->company_icon_one)}}" class="img-thumbnail" id="companyIconOne" alt="{{$editConcern->company_title}}">
                                </div> 

                                <div class="form-group">
                                    <label for="company_icon_two">{{__('Company Icon Two')}}</label>
                                    <input type="file" name="company_icon_two" id="company_icon_two" class="form-control">
                                    <input type="hidden" name="oldIconTwo" value="{{$editConcern->company_icon_two}}">
                                </div>
                                <div class="form-group">
                                    <img src="{{asset($editConcern->company_icon_two)}}" class="img-thumbnail" id="companyIconTwo" alt="{{$editConcern->company_title}}">
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

            $('#company_icon_one').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#companyIconOne').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

            $('#company_icon_two').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#companyIconTwo').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });
            
            $('#company_desc').on('input', function() {
                var charCount = $(this).val().length;
                $('#char_count').text(charCount);

                if (charCount >= 255) {
                    $('#char_message').text('Character limit exceeded!').css('color', 'red');
                } else {
                    $('#char_message').text('').css('color', 'black');
                }
            });

        });
    </script>
@endsection