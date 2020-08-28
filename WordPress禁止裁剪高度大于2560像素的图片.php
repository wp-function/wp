<?php
//WordPress禁止裁剪高度大于2560像素的图片
add_filter( 'big_image_size_threshold', '__return_false' );
