<div>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart )
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img width="100" src="{{asset('storage/'.$cart->product()->first()->image)}}"
                                            alt="">
                                        <h5>{{$cart->product()->first()->name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{ $cart->price}} $
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <form wire:submit.prevent="cartUpdate({{$cart->id}})">
                                                <input class="input-text qty" title="Qty" wire:model.defer="quantitys.{{$cart->id }}" style="width:30%;border-top:none; border-left:none; border-right:none; border-bottom:1px solid rgb(58, 57, 57);">
                                                <button type="submit" class="btn btn-light">SAVA</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{$cart->price * $cart->quantity}} $
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a wire:click="cartDelete({{$cart->id}})"> <span class="icon_close"></span> </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{route('home')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        @php
                        $total = 0;
                            foreach ($carts as $cart) {
                               $total = ($cart->price * $cart->quantity) +$total;
                            }
                        @endphp
                        <ul>
                            <li >Subtotal <span style="color:#000;">{{$total}} $</span></li>
                            <li>Total <span>{{$total}} $</span></li>
                        </ul>
                            <button wire:click="storeOrder" class="primary-btn" style="border: none; width:100%;">PROCEED TO CHECKOUT</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

</div>
