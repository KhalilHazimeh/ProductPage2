@extends('layouts.default')
@section('content')
<section class="info">
    <form id= "addToCartForm">
        <input type="hidden" name="product_id" value= "{{$product['id']}}">
        <input type="hidden" name="name" value= "{{ $product['name'] }}">
        <input type="hidden" name="price" value="{{ $product['price'] }}">
        <input type="hidden" name="quantity" value="1">
        <input type="hidden" name="option1" value= "">
        <input type="hidden" name="option1_Id" value= "">
        <input type="hidden" name="option2" value= "">
        <input type="hidden" name="option2_Id" value= "">
        <div class="info">
            <div class="row">
                <div class="col-xl-4 col-lg-4 image-box">
                    <img class=" product-img img-fluid" src="{{ $product['image'] }}" alt="">
                </div>
                <div class="col-xl-5 col-lg-5 details">
                    <div class="details-info">
                        <h3 id="product-title"><?php echo $product['name']; ?></h3>
                        <span class="free-delivery"><i class="las la-truck"></i>
                            Free Delivery On Orders Above AED&nbsp;80
                        </span>
                        <p id="brand-title">Brand: {{$product->brand->brand_name}}</p>
                    </div>
                    <div class="details-info-middle">
                        <div class="product-variants">
                            @foreach ($product->options as $option)
                                <div class="form-group variant-custom-selection">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>{{ $option->name }}</label><br>
                                            <ul id="optionList{{ $product['id'] }}" class="list-inline form-custom-radio custom-selection">
                                                @foreach ($product->combinations as $combination)
                                                    @if ($combination->first_option_id == $option->id)
                                                        @php
                                                            $firstOptionCategory = \App\Models\OptionCategories::find($combination->first_option_value_id);
                                                        @endphp
                                                        <li id="li_size_{{ $combination->id }}" data-id="{{ $combination->id }}" class="option{{ $option->id }} first-option">
                                                            <span href="#" class="option-label">{{ $firstOptionCategory->value_name }}</span>
                                                        </li>
                                                    @elseif ($combination->second_option_id == $option->id)
                                                        @php
                                                            $secondOptionCategory = \App\Models\OptionCategories::find($combination->second_option_value_id);
                                                        @endphp
                                                        <li id="li_size_{{ $combination->id }}" data-id="{{ $combination->id }}" class="option{{ $option->id }} second-option">
                                                            <span href="#" class="option-label">{{ $secondOptionCategory->value_name }}</span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bullet-points">
                        <ul>
                            <li>28 g Protein Per 30 g Serving (May vary from flavor to another)</li>
                            <li>0 sugar &amp; 0 carb &amp; 0 fat</li>
                            <li>Rapidly Absorbed</li>
                            <li>Supports Muscle Growth</li>
                            <li>Supports muscle recovery</li>
                        </ul>
                    </div>
                    <div class="additional-info-new">
                        <ul>
                            <li class="sku">
                                <label>Barcode:</label>
                                <span>6290360501499</span>
                            </li>
                            <li class="sku">
                                <label>Item No:</label>
                                <span>AE-00015681</span>
                            </li>
                            <li class="sku">
                                <label>Dimensions:</label>
                                <span>21</span>
                                <span>×</span>
                                <span>31</span>
                                <span>×</span>
                                <span>21</span>
                                <span>CM</span>
                            </li>
                            <li class="sku">
                                <label>Weight:</label>
                                <span>1.82</span>
                                <span>KG</span>
                            </li>
                            <li>
                                <label>Categories:</label>
                                <div>
                                    <ul class="list-inline form-custom-radio custom-selection">
                                        @foreach ($product->categories as $category)
                                            <li class="">
                                                <span href="#" class="option-label">{{ $category->category_name }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                    </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 right-side-bar">
                    <aside class="right-sidebar for-product-show">
                        <div class="details-info-middle right-product-details">
                            <div class="product-price d-none d-md-block">
                                <span class="pricee">AED <span id="originalPrice"><?php echo $product['price'];?></span> </span>
                                <span class="previous-price">AED <?php echo $product['oldprice']; ?></span>
                            </div>
                            <div class="details-info-middle-actions">
                                <div class="number-picker">
                                    <label for="qty">Quantity</label>
                                    <button type="button" onclick="decrement()" class="btn btn-number btn-minus">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                    <span id="counter">1</span>
                                    <button type="button" onclick="increment()" class="btn btn-number btn-plus">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                                <div>
                                    <button id ="addToCartButton" class="btn-add-to-cart">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        Add to Cart
                                    </button>
                                    <div class="btn-add-to-cart" id="loading" style="display: none;">Loading...</div>
                                    <div id="message"></div>
                                </div>
                                <div>
                                    <button type="button" class="btn-checkout" id="checkoutButton">
                                        <i class="fa-solid fa-money-check-dollar"></i>
                                        Continue to Checkout
                                    </button>
                                </div>
                            </div>
                    </aside>
                </div>
            </div>
        </div>
    </form>
</section>
@stop

