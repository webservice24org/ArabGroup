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
@include('admin.blogs.category-update')

<script>
    let currentPage = 1

    // Function to fetch and display the list of customers
    async function getList() {
        const perPage = document.getElementById("perPage").value
        const keyword = document.getElementById("keyword").value

        try {
            function showLoader() {
                document.getElementById('loader').classList.remove('d-none')
            }
            const response = await axios.get(
                `/blogs?page=${currentPage}&perPage=${perPage}&keyword=${keyword}`)
                console.log('helo js',response);
                //console.log(JSON.stringify(response.data, null, 2));
            updateTable(response.data.categories)
        } catch (error) {
            console.error('Error fetching customer data:', error);
        } finally {
            function hideLoader() {
                document.getElementById('loader').classList.add('d-none')
            }
        }
    }

    // Function to update the table with customer data
    function updateTable(data) {
    const tableList = document.getElementById("tableList");

        // Check if there are no categories to display
        if (!data.data.length) {
            tableList.innerHTML = '<tr><td colspan="4" class="text-center">No categories found.</td></tr>';
            return;
        }

        // Build the rows HTML string
        const rowsHtml = data.data.map(category => {
            return `<tr>
                        <td>${category.id}</td>
                        <td>${category.category_name}</td>
                        <td>${category.category_slug}</td>
                        <td>
                            <button data-id="${category.id}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                            <button data-id="${category.id}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>`;
        }).join('');

        // Update the table with the new rows
        tableList.innerHTML = rowsHtml;
    }


    // Event listeners for pagination and search
    document.getElementById('perPage').addEventListener('change', () => {
        currentPage = 1
        getList()
    })


    document.getElementById('searchButton').addEventListener('click', () => {
        currentPage = 1
        getList()
    })

    // Functions for handling pagination buttons
    function handlePrevious() {
        if (currentPage > 1) {
            currentPage--
            getList()
        }
    }

    function handleNext() {
        currentPage++
        getList()
    }

    // Function to delete a customer
    async function deleteCategory(id) {
        let isConfirmed = confirm("Are you sure you want to delete this category?")
        if (isConfirmed) {
            try {
                function showLoader() {
                document.getElementById('loader').classList.remove('d-none')
            }
                await axios.delete(`/blogs/${id}`)
                getList()
            } catch (error) {
                console.error('Error deleting category:', error)
            } finally {
                function hideLoader() {
                document.getElementById('loader').classList.add('d-none')
            }
            }
        }
    }

    // Attach event listeners to dynamically created buttons
    document.getElementById('tableList').addEventListener('click', function(event) {
        const target = event.target

        if (target.classList.contains('deleteBtn')) {
            const categoryId = target.getAttribute('data-id')
            deleteCategory(categoryId)
        }

        if (target.classList.contains('editBtn')) {
            const categoryId = target.getAttribute('data-id')
            fillUpUpdateForm(categoryId)
        }
    })

    // Initial list fetch
    getList()
</script>

@endsection