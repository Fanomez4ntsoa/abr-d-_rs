<div class="paymentWrap d-flex align-items-start flex-wrap">
    <div class="paymentLeft">
        <p class="payment_tab_title pb-30"><?php echo e(get_phrase('Select payment gateway')); ?></p>
        <!-- Tab -->
        <div class="nav flex-md-column flex-row nav-pills payment_modalTab" role="tablist" aria-orientation="vertical">

            <?php $__currentLoopData = $payment_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment_gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tabItem" onclick="showPaymentGatewayByAjax('<?php echo e($payment_gateway->identifier); ?>')"
                    id="<?php echo e($payment_gateway->identifier); ?>-tab" data-bs-toggle="pill"
                    data-bs-target="#<?php echo e($payment_gateway->identifier); ?>" role="tab"
                    aria-controls="<?php echo e($payment_gateway->identifier); ?>" aria-selected="true">
                    <div class="payment_gateway_option d-flex align-items-center">
                        <div class="logo">
                            <img width="100px"
                                src="<?php echo e(get_image('assets/payment/' . $payment_gateway->identifier . '.png')); ?>"
                                alt="" />
                        </div>
                        <div class="info">
                            <p class="card_no"><?php echo e($payment_gateway->title); ?></p>
                            <p class="card_date"></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
    <div class="paymentRight">
        <p class="payment_tab_title pb-30"><?php echo e(get_phrase('Item List')); ?></p>
        <div class="payment_table">
            <div class="table-responsive">
                <table class="table eTable eTable-2">
                    <tbody>

                        <?php
                            $total_payable_amount = 0;
                            $counter = 0;
                        ?>
                        <?php $__currentLoopData = $payment_details['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $counter++; ?>
                            <tr>
                                <td>
                                    <div class="dAdmin_info_name">
                                        <p><span>#<?php echo e($counter); ?></span></p>
                                    </div>
                                </td>
                                <td>
                                    <div class="dAdmin_info_name min-w-100px">
                                        <p><?php echo e($item['title']); ?></p>
                                    </div>
                                </td>
                                <td>
                                    <div class="dAdmin_info_name min-w-150px text-end">
                                        <?php if($item['discount_percentage'] > 0): ?>
                                            <p class="text-dark"><small
                                                    class="text-muted"><del><?php echo e(currency($item['price'])); ?></del></small>
                                                <?php echo e(currency($item['discount_price'])); ?></p>
                                        <?php else: ?>
                                            <p><?php echo e(currency($item['price'])); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($payment_details['tax'] > 0): ?>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="dAdmin_info_name min-w-100px">
                                        <p><?php echo e(get_phrase('Tax')); ?></p>
                                    </div>
                                </td>
                                <td>
                                    <div class="dAdmin_info_name min-w-150px text-end">
                                        <p><?php echo e(currency($payment_details['tax'])); ?></p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>


                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="dAdmin_info_name min-w-150px text-end">
                                    <p><span><?php echo e(get_phrase('Grand Total')); ?>:
                                            <?php echo e($payment_details['items'][0]['price']); ?></span></p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Content -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="showPaymentGatewayByAjax">
            </div>
        </div>
    </div>
</div>


<script src="https://checkout.flutterwave.com/v3.js"></script>
<script type="text/javascript">
    function showPaymentGatewayByAjax(identifier) {
        $('#showPaymentGatewayByAjax').html(
            '<div class="w-100 text-center my-5"><div class="spinner-border" style="width: 3.5rem; height: 3.5rem;" role="status"><span class="visually-hidden"></span></div></div>'
        );
        $.ajax({
            url: "<?php echo e(route('payment.show_payment_gateway_by_ajax', '')); ?>/" + identifier,
            success(response) {
                $('#showPaymentGatewayByAjax').html(response);
            }
        });
    }
</script>
<?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/payment/payment_gateway.blade.php ENDPATH**/ ?>