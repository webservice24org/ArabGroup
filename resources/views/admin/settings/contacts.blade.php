@extends('admin.dashboard-master')
@section('admin')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{__('Contact Details for Home Page')}}</h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{route('contact.save')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$contact->id}}">
                        <div class="form-group">
                            <label for="widget_title">{{__('Contact Widget')}}</label>
                            <input type="text" name="widget_title" id="widget_title" value="{{$contact->widget_title}}" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="office_phone">{{__('Header Mobile')}}</label>
                            <input type="text" name="office_phone" id="office_phone" value="{{ $contact->office_phone }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">{{__('Contact E-mail')}}</label>
                            <input type="text" name="email" id="email" value="{{ $contact->email }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="address">{{__('Contact Address')}}</label>
                            <input type="text" name="address" id="address" value="{{ $contact->address }}" class="form-control">
                        </div>

                        <input type="submit" class="btn btn-success" value="{{__('Save Changes')}}">
                        
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection