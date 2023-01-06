<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$thumb_width = ($options['thumb_width'])?$options['thumb_width']:1920;
$thumb_height = ($options['thumb_height'])?$options['thumb_height']:680;

$list_count = (is_array($list) && $list) ? count($list) : 0;

?>



<div class="main_slider swiper-wrapper">
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
	<div class="slide swiper-slide swiperea<?php echo $i; ?>" style="background:#1f202a url(<?php echo $img;?>) no-repeat 50% 0;">
		<div class="wrap">
			<div class="txt_box">
				<strong class="txt_big d-block"><?php echo $txt_big;?></strong>
				<span class="txt_small d-block"><?php echo $txt_small;?></span>
			</div>
			<a href="<?php echo $list[$i]['href'] ?>" class="ico_more d-none">더보기</a>
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