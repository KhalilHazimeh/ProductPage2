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
			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        	<div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Brands</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addBrandModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Brand</span></a>
						<a href="#deleteBrandModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete All Brands</span></a>
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
						<tr id="{{$brand->brand_id}}">
						<td>'
                        <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox+{{$brand->brand_id}}" name="options[]" value="1">
							<label for="checkbox+{{$brand->brand_id}}"></label>
						</span>
						</td>
                        <td>{{$brand->brand_id}}</td>
                        <td>{{$brand->brand_name}}</td>
						<td>
                            <a href="brands.php?showEditModal=1&id={{$brand->brand_id}}" data-id="{{$brand->brand_id}}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="brands.php?showDeleteModal=1&id={{$brand->brand_id}}"class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
			<div class="clearfix">
                <div class="hint-text">Showing <b>{{$brand->count}}</b> out of <b>{{$brandCount}}</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item "><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
		</main>
    </div>
</div>
@stop
