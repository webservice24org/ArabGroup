@extends('admin.dashboard-master')
@section('admin')
    <link rel="stylesheet" href="{{asset('backend-asset/css/switch-btn.css')}}">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <h6 class="m-0 font-weight-bold text-primary">{{__('Trashed Sister Concerns')}}</h6>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <a href="{{route('add.concern')}}" class="btn btn-success">{{__('Add New')}}</a>
                            <a href="{{route('all.concerns')}}" class="btn btn-primary">{{__('All Concerns')}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Company Title')}}</th>
                                    <th>{{__('Company Description')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($trashed as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->company_title}}</td>
                                        <td>{{$item->company_desc}}</td>
                                        <td>
                                            <a href="{{route('restore.concern',$item->id)}}" class="btn btn-success">{{__('Re-Store')}}</a>
                                            <a href="{{route('delete',$item->id)}}" class="btn btn-danger">{{__('Delete')}}</a>
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