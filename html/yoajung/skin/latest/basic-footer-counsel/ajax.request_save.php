<?php
include_once('./_common.php');

if(!$bo_table)
	die(json_encode(array('error'=>'위젯설정에서 보드아이디를 설정해주세요.')));

if(!$is_member)
	die(json_encode(array('error'=>'회원가입후 이용해주세요.')));

$wr_1 = trim($_POST['name']);	//이름
$wr_2 = trim($_POST['region']);	//지역
$wr_3 = trim($_POST['tel1'].'-'.$_POST['tel2'].'-'.$_POST['tel3']);	//연락처

//$bo_table = "online";
$write_table = $g5['write_prefix'] . $bo_table;

$wr_num = get_next_num($write_table);
$wr_reply = "";
$html = 'html1';

if ($member['mb_id']) {
	$mb_id = $member['mb_id'];
	$wr_name = addslashes(clean_xss_tags($board['bo_use_name'] ? $member['mb_name'] : $member['mb_nick']));
	$wr_password = $member['mb_password'];
	if($member['mb_open']) {
		$wr_email = addslashes($member['mb_email']);
		$wr_homepage = addslashes(clean_xss_tags($member['mb_homepage']));
	} else {
		$wr_email = '';
		$wr_homepage = '';
	}
} else {
	$mb_id = '';
	// 비회원의 경우 이름이 누락되는 경우가 있음
	$wr_name = clean_xss_tags(trim($_POST['wr_name']));
	if (!$wr_name)
		alert('이름은 필히 입력하셔야 합니다.');
	$wr_password = get_encrypt_string($wr_password);
	$wr_email = get_email_address(trim($_POST['wr_email']));
	$wr_homepage = clean_xss_tags($wr_homepage);
}

$wr_subject = $wr_1."님 상담신청";
$wr_content = $wr_1."님 상담신청입니다.";

$sql = " insert into $write_table
			set wr_num = '$wr_num',
				wr_reply = '$wr_reply',
				wr_comment = 0,
				ca_name = '$ca_name',
				wr_option = '$html,$secret,$mail',
				wr_subject = '$wr_subject',
				wr_content = '$wr_content',
				wr_link1 = '$wr_link1',
				wr_link2 = '$wr_link2',
				wr_link1_hit = 0,
				wr_link2_hit = 0,
				wr_hit = 0,
				wr_good = 0,
				wr_nogood = 0,
				mb_id = '$mb_id',
				wr_password = '$wr_password',
				wr_name = '$wr_name',
				wr_email = '$wr_email',
				wr_homepage = '$wr_homepage',
				wr_datetime = '".G5_TIME_YMDHIS."',
				wr_last = '".G5_TIME_YMDHIS."',
				wr_ip = '{$_SERVER['REMOTE_ADDR']}',
				wr_1 = '$wr_1',
				wr_2 = '$wr_2',
				wr_3 = '$wr_3',
				wr_4 = '$wr_4',
				wr_5 = '$wr_5',
				wr_6 = '$wr_6',
				wr_7 = '$wr_7',
				wr_8 = '$wr_8',
				wr_9 = '$wr_9',
				wr_10 = '$wr_10' ";

if(sql_query($sql)){

    $wr_id = sql_insert_id();

    // 부모 아이디에 UPDATE
    sql_query(" update $write_table set wr_parent = '$wr_id' where wr_id = '$wr_id' ");

	// 새글 INSERT
    sql_query(" insert into {$g5['board_new_table']} ( bo_table, wr_id, wr_parent, bn_datetime, mb_id ) values ( '{$bo_table}', '{$wr_id}', '{$wr_id}', '".G5_TIME_YMDHIS."', '{$member['mb_id']}' ) ");

    // 게시글 1 증가
    sql_query("update {$g5['board_table']} set bo_count_write = bo_count_write + 1 where bo_table = '{$bo_table}'");

	delete_cache_latest($bo_table);

	die(json_encode(array('error'=>'')));

}else{
	die(json_encode(array('error'=>'접수에 문제가 있습니다. 관리자에게 문의하세요.')));
}
?>