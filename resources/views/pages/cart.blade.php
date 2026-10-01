@extends('layouts.master')

@section('content')

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                  <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($cartItems ?? [] as $item)
                      <tr> 
                            <td class="cart__product__item">
                                <img 
                                src="{{ asset('storage/'.$item->product->image) }}"
                                alt="{{ $item->product->name }}">
                                <div class="cart__product__item__title">
                                    <h6>
                                        {{ $item->product->name }}
                                    </h6>
                                    <div class="country-name">
                                       <img 
                                        src="{{ asset('images/flags/'.$item->product->country->flag) }}"
                                        width="20">

                                        {{ $item->product->country->name }}
                                    </div>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                           </td>
                          <td class="cart__price">
                                ৳ {{ number_format($item->price,2) }}
                            </td>
                            <td class="cart__quantity">
                                <div class="pro-qty">
                                    <input 
                                    type="number"
                                    min="1"
                                    value="{{ $item->quantity }}">
                                </div>
                            </td>
                            <td class="cart__total">
                                ৳ {{ number_format($item->price * $item->quantity,2) }}
                            </td>
                            <td class="cart__close">
                                <a href="#"><span class="icon_close"></span> </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <h5>
                                    Your cart is empty
                                </h5>
                                <a href="{{ route('cart') }}"  class="primary-btn mt-3">Continue Shopping </a>
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="{{ route('cart') }}"> Continue Shopping</a>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn update__btn">
                    <a href="#">
                        <span class="icon_loading"></span> Update Cart</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="discount__content">
                    <h6>
                        Discount Codes
                    </h6>
                    <form action="#" method="POST">
                        @csrf
                        <input 
                        type="text"
                        name="coupon"
                        placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn"> Apply</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced"><h6> Cart Total</h6><ul>
                        <li>
                            Subtotal
                            <span>
                                ৳ {{ number_format($subtotal ?? 0,2) }}
                            </span>
                        </li>
                        <li>
                            Delivery Charge
                            <span>
                                ৳ {{ number_format($delivery ?? 0,2) }}
                            </span>
                        </li>
                        <li>
                            Total
                            <span>
                                ৳ {{ number_format($total ?? 0,2) }}
                            </span>
                        </li>
                    </ul>
                    <a href="{{ route('checkout') }}"
                    class="primary-btn"> Proceed To Checkout </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Cart Section End -->
@endsection