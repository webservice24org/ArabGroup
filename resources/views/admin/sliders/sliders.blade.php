@extends('admin.dashboard-master')
@section('admin')
    <link rel="stylesheet" href="{{asset('backend-asset/css/switch-btn.css')}}">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{__('Home page sliders')}}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Slider Title')}}</th>
                                    <th>{{__('Button Title')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($allSliders as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->slider_title}}</td>
                                        <td>{{$item->btn_title}}</td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider"></span>
                                              </label>
                                        </td>
                                        <td><a href="{{route('editSlider',$item->id)}}" class="btn btn-success">{{__('Edit')}}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection