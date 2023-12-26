@extends('admin.dashboard-master')
@section('admin')
    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h5>{{__('Blog Categories')}}</h5>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">
                        {{__('Add Category')}}
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 px-2">
                    <div class="form-group">
                        <label>Per Page</label>
                        <select id="perPage" class="form-control form-select-sm form-select">
                            <option>5</option>
                            <option>10</option>
                            <option>15</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2 px-2">
                    <div class="form-group">
                        <label>Search</label>
                        <div class="input-group">
                            <input value="" type="text" id="keyword" class="form-control">
                            <button class="form-control btn btn-success" type="button" id="searchButton">Search</button>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="row">

                <div class="col-md-12 p-2 col-sm-12 col-lg-12">
                    <div class="table-responsive bg-white rounded-3 p-2">
                        <table class="table table-bordered" id="tableData">
                            <thead>
                                <tr class="bg-light">
                                    <th>{{__('Category ID')}}</th>
                                    <th>{{__('Category Name')}}</th>
                                    <th>{{__('Category Slug')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody id="tableList">

                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="col-md-2 p-2">
                    <div class="">
                        <button onclick="handlePrevious()" id="previousButton" class="btn btn-sm btn-success">{{__('Previous')}}</button>
                        <button onclick="handleNext()" id="nextButton" class="btn btn-sm mx-1 btn-success">{{__('Next')}}</button>
                    </div>
                </div>

            </div>


        </div>
    </div>
    
    <!-- Button trigger modal -->

@include('admin.blogs.category-create')


@endsection