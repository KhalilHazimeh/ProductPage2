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
						<h2>Manage <b>Options</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addOptionModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Option</span></a>
						<a href="#deleteOptionModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete All Options</span></a>
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
                        <th>Option</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
					@foreach ($options as $option)
                        <tr>
                        <td>
                        <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox+{{$option->id}}" name="options[]" value="1">
                        <label for="checkbox+{{$option->id}}"></label>
                        </span>
                        </td>
                        <td>{{$option->id}}</td>
                        <td>{{$option->name}}</td>
                        <td>
                        <a href="options.php?showEditModal=1&id={{$option->id}}" data-id="{{$option->id}}" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="options.php?showDeleteModal=1&id={{$option->id}}" data-id="{{$option->id}}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
@stop
