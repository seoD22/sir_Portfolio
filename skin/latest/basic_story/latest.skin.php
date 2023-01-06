<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$thumb_width = ($options['thumb_width'])?$options['thumb_width']:1920;
$thumb_height = ($options['thumb_height'])?$options['thumb_height']:680;

$list_count = (is_array($list) && $list) ? count($list) : 0;

?>



<div>
    <?php
    for ($i=0; $i<count($list); $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['ori'];
    } else {
        $img = $latest_skin_url.'/img/no_img.png';
    }

	$txt_big = $list[$i]['wr_subject'];
	$txt_small = $list[$i]['wr_content'];

	$list[$i]['href'] = ($list[$i]['wr_link1'])?$list[$i]['wr_link1']:$list[$i]['href'];

    ?>
	<div class="d-md-flex">
		<strong class="txt_big d-block order-1" data-aos="fade-up" data-aos-delay="200" data-aos-duration="600"><?php echo $txt_big;?></strong>
		<div class="img-wrapper col-12 col-md-5">
			<img src="<?php echo $img;?>" alt="" class="img_box img-fluid" data-aos="fade-right" data-aos-delay="500" data-aos-duration="600">
		</div>
		<div class="wrap d-md-flex justify-content-start order-2">
			<span class="txt_small d-block" data-aos="fade-up" data-aos-delay="800" data-aos-duration="600"><?php echo $txt_small;?>
				<a href="<?php echo $list[$i]['href'] ?>" class="ico_more d-none d-md-flex justify-content-center align-items-center rounded-pill">view more</a>
			</span>
		</div>
	</div>
    <?php }  ?>
    <?php
	if (count($list) == 0) { //게시물이 없을 때
		
	?>
	
	<?php

	}  //if
	?>
</div>

<script> AOS.init()</script>