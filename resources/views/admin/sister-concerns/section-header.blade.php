@extends('admin.dashboard-master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            
            <form action="{{route('save.sec.header')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$secHeader->id}}">
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="sub_header">{{__('Section Sub Title')}}</label>
                                    <input type="text" name="sub_header" value="{{ $secHeader->sub_header }}" placeholder="Arab Group" id="sub_header" class="form-control">
                                    @error('sub_header')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sec_header">{{__('Section Sub Title')}}</label>
                                    <input type="text" name="sec_header" value="{{ $secHeader->sec_header }}" placeholder="Arab Group" id="sec_header" class="form-control">
                                    @error('sec_header')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sec_icon">{{__('Section Icon')}}</label>
                                    <input type="file" name="sec_icon" id="sec_icon" class="form-control">
                                    @error('sec_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img src="{{asset($secHeader->sec_icon)}}" class="img-thumbnail" id="sectionIcon" alt="{{$secHeader->sec_header}}">
                                </div> 
                                <input type="submit" value="submit" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </form>
                
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#sec_icon').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#sectionIcon').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });



        });
    </script>
@endsection