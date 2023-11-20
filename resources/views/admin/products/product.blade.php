@extends('admin.layouts.default')
@section('content')
<div class="row">
    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
        <div class="position-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="products">
                        Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="categories">
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="brands">
                        Brands
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="options_categories">
                        Options Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="options">
                        Options
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="col-md-9 col-lg-10">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Products</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal" ><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
                        <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete All Products</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Old Price</th>
                        <th>Brand Name</th>
                        <th>Categories</th>
                        <th>Actions</th>
						<th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr id="{{ $product->id }}">
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox+{{ $product->id }}" name="options[]" value="1">
                                    <label for="checkbox+{{ $product->id }}"></label>
                                </span>
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->oldprice }}</td>
                            <td>{{ $product->brand->brand_name }}</td>
                            <td>
                                @foreach($product->categories as $category)
                                    {{ $category['category_name'] }}
                                    <br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('products.edit', ['product_id' => $product->id]) }}" class="edit">
                                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                </a>
                                <a href="#" class="delete" data-toggle="modal" data-target="#deleteEmployeeModal" data-id="{{ $product->id }}">
                                    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('products.show', ['product_id' => $product->id]) }}">
                                    <i class="material-icons" title="View">&#xE8F4;</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>{{ $products->count() }}</b> out of <b>{{  $products->count() }}</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </main>
</div>
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('product.delete') }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="delete_product_id" id="delete_product_id" value="">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog" >
        <div class="modal-content" style="width:800px;">
            <form method="post" action="{{ route('product.add') }}">
                @csrf
                <input type="hidden" name="form_submitted" value="1">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#general-add">General Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#options-add">Product Options</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#combinations-add">Combinations</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="general-add" class="tab-pane fade active">
						<div class="form-group">
							<label>Name</label>
							<input name='name' type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Price</label>
							<input name='price' type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Old Price</label>
							<input name='oldPrice' type="text" class="form-control" required>
						</div>
                        <div class="form-group">
                            <label>Image</label>
                            <input name="image" type="file" class="form-control">
                        </div>
                        <div class="form-group">
							<label>Brand :</label>
							<select name='brandID' class="form-control" required>
                                <option value="">Select a Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
						</div>
						<div class="form-group">
							<label>Categories:</label><br>
							@foreach($categories as $category)
                                <label>
                                    <input type="checkbox" name="categories[]" value="{{ $category->category_id }}"> {{ $category->category_name }}
                                </label><br>
                            @endforeach
						</div>
                    </div>
                    <div id="options-add" class="tab-pane fade">
                        <div class="form-group">
                            @foreach($options as $option)
                                <div class="form-check">
                                    <input type="checkbox" name="product_options[]" value="{{ $option->id }}" class="form-check-input">
                                    <label class="form-check-label">{{ $option->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="combinations-add" class="tab-pane fade">
                        <table id="combinationsTable" class="table">
                            <thead>
                                <th id="actionHeaderPlaceholder"></th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

@stop


