
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2>Giỏ hàng</h2>
                </div>
            </div>
        </div>
        <form method="post" action="#">
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <td>
                                
                                <form method="post" action="?act=delete-cart">
                                    <!-- Thay đổi 'remove_from_cart.php' thành tên file xử lý của bạn -->
                                    <input type="hidden" name="product_id" value="123"> <!-- Đặt ID sản phẩm để xoá -->
                                    <button type="submit" name="delete" class="btn btn-danger">Xoá</button>
                                </form>
                            </td>
                            <th scope="col">&nbsp;</th>
							<th scope="col">Tên</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng cộng</th>
                        </tr>
                    </thead>
                    <tbody>

						<?php
                        $total = 0 ;
                        foreach($Cart as $ca){
							$total_price = $ca['price_sp'] * $ca['soluong'];
							$total += $total_price;
							?>
                        <tr class="cart_item container  ">
                            <td>
                                <input type="checkbox" name="product_id[]" value="<?=$ca['id_sp']?>"> <!-- Đặt ID sản phẩm để xoá -->
                            </td>
                            <td><a title="Remove this item" class="remove" href="#"></a></td>
                            <td><?=$ca['name_sp']?></td>
							<td><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail"
                                    src="../img/<?=$ca['image_sp']?>"></td>
s                            <td><span><?=number_format((int)$ca['price_sp'], 0, ",", ".")?>₫</span></td>
                            <td>
                                <!-- Tăng giảm số lươngj  -->
                            
                                <div class="input-group">
                                <button class="btn btn-outline-secondary btn-number" type="button" data-type="minus" data-field="quantity[<?=$ca['id_sp']?>]">
                                <i class="fa-solid fa-minus"></i>
                                </button>
                                <input type="text" name="quantity[<?=$ca['id_sp']?>]" class="form-control input-number" value="<?=$ca['soluong']?>" min="1" style="width: 10px; height: 40px;">
                                <button class="btn btn-outline-secondary btn-number" type="button" data-type="plus" data-field="quantity[<?=$ca['id_sp']?>]">
                                <i class="fa-solid fa-plus"></i>
                                </button>
                                </div>
                            

                             <!-- kết thúc tăng giảm  -->
                                
                            </td>
                            <td><?=number_format((int)$total_price, 0, ",", ".")?>₫ </td>
                            
                        </tr>
						<?php } ?>
                        <tr>
                            <td colspan="6" align="right"><strong>Tổng tiền:</strong></td>
                            <td align="right"><strong><?=number_format((int)$total, 0, ",", ".")?>₫</strong></td> 
                        </tr>
                        <td colspan="6">
                            <div class="coupon">
                                <label for="coupon_code">Mã giảm giá:</label>
                                <input type="text" placeholder="Nhập mã" value="" id="coupon_code" class="input-text"
                                    name="coupon_code">
                                <input type="submit" value="Áp dụng" name="apply_coupon" class="btn btn-warning">
                                <input type="submit" value="Cập nhật" name="update_cart" class="btn btn-danger">
                                <a href="Paypal.html" class="btn btn-primary">Thanh toán</a>

                            </div>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
        <script>
    document.addEventListener('DOMContentLoaded', function() {
        var btns = document.querySelectorAll('.btn-number');
        btns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var type = this.getAttribute('data-type');
                var input = document.querySelector('input[name="' + this.getAttribute('data-field') + '"]');
                var currentValue = parseInt(input.value);
                var minValue = parseInt(input.getAttribute('min'));
                var maxValue = parseInt(input.getAttribute('max'));
                if (!isNaN(currentValue)) {
                    if (type === 'minus') {
                        if (currentValue > minValue) {
                            input.value = currentValue - 1;
                        }
                    } else if (type === 'plus') {
                        if (currentValue < maxValue || !maxValue) {
                            input.value = currentValue + 1;
                        }
                    }
                }
            });
        });
    });
    
    
</script>
