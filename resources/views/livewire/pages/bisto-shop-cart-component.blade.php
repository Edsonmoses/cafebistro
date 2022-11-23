 <section class="shop-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <table class="cart-table table table-bordered">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#" class="remove"><i class="fa fa-times"></i></a>
                                        </td>
                                        <td>
                                            <a href="./shop_single_full.html"><img src="{{ asset('assets/frontend/img/shop/1.png')}}" alt="" height="90" width="90"></a>
                                        </td>
                                        <td>
                                            <a href="./shop_single_full.html">Delicious Food Name</a>
                                        </td>
                                        <td>
                                            <span class="amount">£69.99</span>
                                        </td>
                                        <td>
                                            <div class="quantity">1</div>
                                        </td>
                                        <td>
                                            <span class="amount">£69.99</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#" class="remove"><i class="fa fa-times"></i></a>
                                        </td>
                                        <td>
                                            <a href="./shop_single_full.html"><img src="{{ asset('assets/frontend/img/shop/2.png')}}" alt="" height="90" width="90"></a>
                                        </td>
                                        <td>
                                            <a href="./shop_single_full.html">Dry fruit Food Name</a>
                                        </td>
                                        <td>
                                            <span class="amount">£119.99</span>
                                        </td>
                                        <td>
                                            <div class="quantity">1</div>
                                        </td>
                                        <td>
                                            <span class="amount">£119.99</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="actions">
                                            <div class="col-md-6">
                                                <div class="coupon form-group">
                                                    <label>Coupon:</label>
                                                    <br>
                                                    <input placeholder="Coupon code" class="form-control" type="text">
                                                    <button type="submit">Apply</button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="cart-btn">
                                                    <button class="btn btn-default" type="submit">Update Cart</button>
                                                    <button class="btn btn-success" type="submit" onclick="window.open('./shop_checkout.html', '_self')">Checkout</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="cart_totals">
                                <div class="col-md-6 push-md-6 no-padding">
                                    <h4 class="text-left">Cart Totals</h4>
                                    <br>
                                    <table class="table table-bordered col-md-6">
                                        <tbody>
                                            <tr>
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">£190.00</span></td>
                                            </tr>
                                            <tr>
                                                <th>Shipping and Handling</th>
                                                <td>
                                                    Free Shipping
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">£190.00</span></strong> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>