<?php
$vendor = isset( $vendor ) ? $vendor : yith_get_vendor( 'current', 'product' );
if( $vendor->is_valid() && $vendor->vacation_message ) : ?>
    <div class="vacation woocommerce-info">
        <?php echo $vendor->vacation_message; ?>
    </div>
<?php endif; ?>