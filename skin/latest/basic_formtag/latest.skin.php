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
	<div class="form_div d-flex flex-column justify-content-center align-items-center inner">
		<div class="txt_big_wrap">
			<strong class="txt_big"><?php echo $txt_big;?></strong>
		</div>
		<div class="wrap">
			<span class="txt_small"><?php echo $txt_small;?>
				<div class="input_agree d-flex align-items-center">
					<span>개인정보 처리에 동의합니다.</span>
					<label for="agree_check" class="m-0">
						<input type="checkbox" id="agree_check" name="agree_check" class="d-none">
						<div class="input_icon"></div>
					</label>
				</div>
			</span>
		</div>
		<div class="form_bottom">
			<form action="데이터 저장 경로 넣기" method="post" name="contact" id="contact">
			<input type="hidden" name="area">
				<ul class="d-flex">
					<li class="my-2 col-md-4 li_1">
						<label for="con_Nm"></label>
						<input name="con_Nm" type="text" placeholder="이름" class="rounded">
					</li>
					<li class="my-2 col-md-4 li_2">
						<label for="con_Num"></label>
						<input name="con_Num" type="text" placeholder="연락처(휴대전화)" class="rounded">
					</li>
					<li class="my-2 col-md-4 li_3">
						<label for="con_mail"></label>
						<input name="con_mail" type="text" placeholder="이메일" class="rounded">
					</li>
					<li class="my-2 col-md-12">
						<label for="con_text"></label>
						<textarea name="con_text" placeholder="문의내용" class="rounded" cols="30" rows="10"></textarea>
					</li>
				</ul>
				<div id="submit">
					<div class="d-flex justify-content-center align-items-center">
						<input type="submit" value="상담 신청" class="rounded">
					</div>
				</div>
			</form>
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