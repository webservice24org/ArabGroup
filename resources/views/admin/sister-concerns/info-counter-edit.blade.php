@extends('admin.dashboard-master')
@section('admin')
 <div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card shadow">
            <div class="card-header">
                <h5>{{__('Edit Information Counter of: ')}} <span class="text-dark font-weight-bold">{{$infoCounter->counter_title}}</span></h5>
            </div>

            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label for="counter">{{__('Counting Digits')}}</label>
                                <input type="text" name="counter" id="counter" value="{{$infoCounter->counter}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="counter_sub_title">{{__('Counter Sub Title')}}</label>
                                <input type="text" name="counter_sub_title" id="counter_sub_title" value="{{$infoCounter->counter_sub_title}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="counter_title">{{__('Counter Title')}}</label>
                                <input type="text" name="counter_title" id="counter_title" value="{{$infoCounter->counter_title}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <input type="submit" value="submit" class="btn btn-success" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>
@endsection