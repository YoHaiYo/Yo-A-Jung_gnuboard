<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
    return;
}
?>

    </div>
 
<!-- </div>

</div> -->
<!-- } 콘텐츠 끝 -->

<?php 

$options = array();
$options['is_login']    = 0;            //회원여부(0:비회원,1:회원)
$options['category']    = '분류2';            //게시판분류명(분류가 없을경우 첫번째 분류값을 적용)
$options['footer_h']    = '155';        //상담높이
$options['bgcolor']        = '#161d2e';    //배경색상
$options['background']    = '';            //배경이미지
$options['title_chk']    = 0;            //타이틀사용여부(0:기본/1:커스텀)
$options['title']        = $config['cf_title'].'에 고객님들이 관심을 보여주셨습니다.'; //타이틀
$options['title_fs']    = '30';            //타이틀 폰트크기
$options['title_fc']    = 'white';        //타이틀 폰트색상
$options['btn']            = '간편상담';    //버튼
$options['btnc']        = 'black';        //버튼색상


echo latest('basic-footer-counsel', 'adm_form',  4, 23, '', $options); ?>

<!-- 하단 시작 { -->
<!-- S:하단 -->
<footer id="footer">
    <div class="f_main">
      <div class="f_main__wrap">

        <div class="f_info">
          <div class="f_info__item">
            <span>대표이사 : 박진주</span>
            <span>사업자등록번호: 696-86-02195</span>
          </div>
          <div class="f_info__item">
            <span>상호명: 주식회사 트릴리언즈</span>
            <span>주소 : 서울특별시 성동구 광나루로 130, 지하 1층 비 107호(성수동1가, 서울숲IT캐슬)</span>
            <span>Office Hour : 평일 09:00 ~ 18:00 (점심시간 11:30 – 13:00 )</span>
          </div>
          <div class="f_info__item">
            <span>대표이메일: awesomebrosis@naver.com</span>
            <span>대표번호: 010-2896-1302</span>
          </div>
        </div>
      </div>
    </div>
    <div class="f_copy">
      <p class="f_copy__txt">
      Copyright ⓒ 2023 요거트 아이스크림의 정석 공식홈페이지 All rights reserved.
      </p>
    </div>
  </footer>
  <!-- E:하단 -->

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>




<?php
include_once(G5_THEME_PATH."/tail.sub.php");