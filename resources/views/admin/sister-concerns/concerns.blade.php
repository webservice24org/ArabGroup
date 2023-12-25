@extends('admin.dashboard-master')
@section('admin')
    <link rel="stylesheet" href="{{asset('backend-asset/css/switch-btn.css')}}">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <h6 class="m-0 font-weight-bold text-primary">{{__('Sister Concerns')}}</h6>
                            
                        </div>
                        <div class="col-md-2 col-sm-12">
                        <a href="{{route('concern.sec.header')}}" class="btn btn-success">{{__('Section Header')}}</a>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                        
                            <a href="{{route('add.concern')}}" class="btn btn-success">{{__('Add New')}}</a>
                            <a href="{{route('trashed.concern')}}" class="btn btn-danger">{{__('Trashed')}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="width:100%">
                                    <th style="width:5%">{{__('ID')}}</th>
                                    <th style="width:20%">{{__('Company Title')}}</th>
                                    <th style="width:50%">{{__('Company Description')}}</th>
                                    <th style="width:10%">{{__('Status')}}</th>
                                    <th style="width:15%">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($allConcerns as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->company_title}}</td>
                                        <td>{{$item->company_desc}}</td>
                                        <td>
                                        
                                           <a href="{{route('status',$item->id)}}" class="btn btn-{{$item->status ? 'success' : 'danger'}}"><span class="fa fa-{{$item->status ? 'lock' : 'unlock'}}"></span></a>
                                                        
                                        </td>
                                        <td>
                                            <a href="{{route('edit.concern',$item->id)}}" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{route('trash.concern',$item->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                            
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