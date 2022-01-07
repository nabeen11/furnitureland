<!-- Page Template on invalid IPN request response -->
<style>
    .main-content {
    	position: relative;
    	display: block;
        width: 80%;
        text-align: center;
        margin: 0 auto;
        background: #fafafa;
        padding: 20px;
    }
    .msg-content {
        margin-bottom: 25px;
    }
    .btn-msg {
        background: #6ab82f;
        color: #fff;
        padding: 5px 20px;
        border: 1px solid #6ab82f;
        text-decoration: none;
        transition: all ease-in-out .3s;
    }
    .btn-msg:hover {
        background: #508d23;
}
</style>

<div class="main-content">
	<div class="msg-content">
		<p><?php esc_html_e('Sorry! Request failed.','esewa-woocommerce'); ?></p>
	</div>
	<a href="<?php echo esc_url(home_url('/')); ?>" class="btn-msg"><?php esc_html_e('Go Back Home.','esewa-woocommerce'); ?></a>
</div>
