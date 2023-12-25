@extends('admin.dashboard-master')

@section('admin')
<div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <h6 class="m-0 font-weight-bold text-primary">{{__('Home Page Information Counters')}}</h6>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="width:100%">
                                    <th style="width:5%">{{__('ID')}}</th>
                                    <th style="width:20%">{{__('Counter Digits')}}</th>
                                    <th style="width:20%">{{__('Counter Sub Title')}}</th>
                                    <th style="width:40%">{{__('Counter Title')}}</th>
                                    <th style="width:15%">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($infoCounter as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->counter}}</td>
                                        <td>{{$item->counter_sub_title}}</td>
                                        <td>{{$item->counter_title}}</td>
                                        <td>
                                            <a href="{{route('infoCounterEdit',$item->id)}}" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                            
                                        </td>
                                       
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