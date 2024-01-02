<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../../assets/css/app.css">
    <link rel="stylesheet" href="../../../assets/css/all.min.css"/>
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <section class="free_shipping_alert">
        <div>Enjoy FREE SHIPPING on orders over 80 AED</div>
    </section>
    <section class="top-nav-bar">
            <div class="top-nav">
                <div class="row justify-content-between">
                    <div class="col-xl-6 col-lg-6">
                    <div class="top-nav-left d-none d-lg-block">
                        <span>Dr Nutrition UAE</span>
                    </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
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
                                <a  title="Login" data-bs-toggle="modal" data-bs-target="#exampleModal"  href="">
                                    <i class="fa-solid fa-right-to-bracket"style="color: #68367f; margin-right: 10px;"></i>
                                    Login
                                </a>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action= "login.blade.php" method="post" >
                                                <?php
                                                    if (isset($_GET['status']) && $_GET['status'] === 'failed') {
                                                        echo'<p style="color: red;">Incorrect username or password.</p>';
                                                    }
                                                ?>
                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12" style="padding-bottom: 20px;">
                                                            <div class="row">
                                                                <div class="col-xl-4 col-lg-4">
                                                                    <label for="Username" style="font-size: 20px; padding-right: 20px;">Username</label>
                                                                </div>
                                                                <div class="col-xl-8 col-lg-8">
                                                                    <input name="username" type="text" class="Username">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-12" style="padding-bottom: 20px;">
                                                            <div class="row">
                                                                <div class="col-xl-4 col-lg-4">
                                                                    <label for="password" style="font-size: 20px; padding-right: 20px;">Password</label>
                                                                </div>
                                                                <div class="col-xl-8 col-lg-8">
                                                                    <input name="password" type="text" class="password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-12" style="padding-bottom: 20px;">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <input type="submit" value="Login">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a  data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                                    <i class="fa-solid fa-right-to-bracket"style="color: #68367f; margin-right: 10px;"></i>
                                    Register
                                </a>
                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Register</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                                <form action= "register.blade.php" method="post" >
                                                <?php
                                                    if (isset($_GET['register']) && $_GET['register'] === 'failed') {
                                                        echo'<p style="color: red;">Username not available.</p>';
                                                    }
                                                ?>
                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12" style="padding-bottom: 20px;">
                                                            <div class="row">
                                                                <div class="col-xl-4 col-lg-4">
                                                                    <label for="Username" style="font-size: 20px; padding-right: 20px;">Username</label>
                                                                </div>
                                                                <div class="col-xl-8 col-lg-8">
                                                                    <input name="username" type="text" class="Username">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-12" style="padding-bottom: 20px;">
                                                            <div class="row">
                                                                <div class="col-xl-4 col-lg-4">
                                                                    <label for="password" style="font-size: 20px; padding-right: 20px;">Password</label>
                                                                </div>
                                                                <div class="col-xl-8 col-lg-8">
                                                                    <input name="password" type="text" class="password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-12" style="padding-bottom: 20px;">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <input type="submit" value="Register">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                    </div>
                                </div>
                                </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
    <div id="edit" style="padding:5%">
        <form action="{{ route('products.update', ['product_id' => $product->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="edit_product_id" value="{{ $product->id}}">
            <div class="modal-header">
                <h4 class="modal-title">Edit Product</h4>
            </div>
                <div class="ceontent">
                    <div id="general-edit" class="general">
                    <div class="form-group">
                        <label>Title</label>
                        <input name="title" type="text" class="form-control" required value="{{ $product->name}}">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input name="price"  type="text" class="form-control" required value="{{ $product->price}}">
                    </div>
                    <div class="form-group">
                        <label>Old Price</label>
                        <input name="oldPrice" type="text" class="form-control" required value="{{ $product->oldprice}}">
                    </div>
                    <div class="form-group">
                        <label>Brand :</label>
                        <select name='brandID' class="form-control" required>
                            <option value="">Select a Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->brand_id }}" {{ $brand->brand_id == $product->brand_id ? 'selected' : '' }}>
                                    {{ $brand->brand_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Categories:</label><br>
                        @foreach($categories as $category)
                            <label>
                                <input type="checkbox" name="categories[]" value="{{ $category->category_id }}" {{ in_array($category->category_id, $product->categories->pluck('category_id')->toArray()) ? 'checked' : '' }}>
                                {{ $category->category_name }}
                            </label><br>
                        @endforeach
                    </div>
                    <div id="options-edit" class="options">
                        <div class="form-group">
                            <label>Product Options:</label><br>
                            @foreach($options as $option)
                                <label>
                                    <input type="checkbox" name="product_options[]" value="{{ $option->id }}" {{ in_array($option->id, $product->options->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    {{ $option->name }}
                                </label><br>
                            @endforeach
                        </div>
                    </div>
                    <div class="combinations">
                        <table class="table">
                            <thead>
                                <tr id="tableHeadRow">
                                    @foreach ($product->options as $option)
                                        <th>{{ $option->name }}</th>
                                    @endforeach
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="existingValuesTableBody">
                                @foreach ($product->option_combinations as $combination)
                                    <tr>
                                        @foreach ($product->options as $option)
                                            <td>
                                                <select>
                                                    @foreach ($optionsCat as $optionCategory)
                                                        @if ($optionCategory->option_id == $option->id)
                                                            <option value="{{$optionCategory->id}}" {{ in_array($optionCategory->value_name, optional($combination->optionsCat)->pluck('value_name') ?? []) ? 'selected' : '' }}>
                                                                {{ $optionCategory->value_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                        @endforeach
                                        <td>
                                            <button type="button" class="btn btn-sm btn-success" onclick="addRow(this)">Add</button>
                                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(this)">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="../../../assets/js/app.js?v={{ time() }}"></script>
<script src="../../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../../assets/js/all.min.js"></script>
<script src="../../../assets/js/bootstrap.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    function addRow(button) {
    var row = button.closest('tr').cloneNode(true);
    row.querySelector('select').value = '';

    var optionsCatSelect = row.querySelector('select');
    optionsCatSelect.innerHTML = button.closest('tr').querySelector('select').innerHTML;

    var buttons = row.querySelectorAll('button');
    buttons[0].innerText = 'Add';
    buttons[0].classList.remove('btn-danger');
    buttons[0].classList.add('btn-success');
    buttons[0].setAttribute('onclick', 'addRow(this)');

    buttons[1].innerText = 'Delete';
    buttons[1].classList.remove('btn-success');
    buttons[1].classList.add('btn-danger');
    buttons[1].setAttribute('onclick', 'deleteRow(this)');

    button.closest('tr').after(row);
    }

    function deleteRow(button) {
        button.closest('tr').remove();
    }
</script>
</body>
</html>
