<?php
session_start();
$loggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
use App\Models\Product;
$conn = new mysqli("localhost", "root", "", "logindb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
@include('head')
<body>
<section class="free_shipping_alert">
    <div>Enjoy FREE SHIPPING on orders over 80 AED</div>
</section>
<section class="top-nav-bar">
    <div class="top-nav">
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <div class="top-nav-left d-none d-lg-block">
                    <span>Dr Nutrition UAE</span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="top-nav-right">
                    <ul class="list-inline top-nav-right-list">
                        <li>
                            <a title="Contact" href="#">
                                <i class="fa-solid fa-phone" style="color: #68367f; margin-right: 10px;"></i>
                                Contact
                            </a>
                        </li>
                        <li>
                            <a title="AED" href="">
                                <i class="fa-solid fa-money-bill " style="color: #68367f; margin-right: 10px;"></i>
                                AED
                            </a>
                        </li>
                        <li>
                            <a title="Login" data-bs-toggle="modal" data-bs-target="#exampleModal" href="index.php">
                                <i class="fa-solid fa-right-to-bracket" style="color: #68367f; margin-right: 10px;"></i>
                                <?php
                                if ($loggedIn) {
                                    echo 'Welcome '.$_SESSION['username'];
                                }
                                ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
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
                        <h2>Manage <b>Products</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
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
                                <a href="index.blade.php?showEditModal=1&id={{ $product->id }}" data-id="{{ $product->id }}" class="edit">
                                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                </a>
                                <a href="index.blade.php?showDeleteModal=1&id={{ $product->id }}" class="delete" data-toggle="modal">
                                    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                </a>
                            </td>
                            <td>
                                <a href="../../products/show.blade.php?product_id={{ $product->id }}">
                                    <i class="material-icons" title="View">&#xE8F4;</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>{{ $products->count() }}</b> out of <b>{{ $productCount }}</b> entries</div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</body>
</html>
<?php
$conn->close();

?>
