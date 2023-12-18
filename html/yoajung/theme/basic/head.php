<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    define('G5_IS_COMMUNITY_PAGE', true);
    include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}
include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<!-- 상단 시작 { -->
<div id="hd">
  <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
  <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

  <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>

  <div id="hd_wrapper">

    <div class="hd_sch_wr">
      <fieldset id="hd_sch">
        <legend>사이트 내 전체검색</legend>
        <form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php"
          onsubmit="return fsearchbox_submit(this);">
          <input type="hidden" name="sfl" value="wr_subject||wr_content">
          <input type="hidden" name="sop" value="and">
          <label for="sch_stx" class="sound_only">검색어 필수</label>
          <input type="text" name="stx" id="sch_stx" maxlength="20" placeholder="검색어를 입력해주세요">
          <button type="submit" id="sch_submit" value="검색"><i class="fa fa-search" aria-hidden="true">
          </i><span
              class="sound_only">검색</span></button>
        </form>

        <script>
          function fsearchbox_submit(f) {
            var stx = f.stx.value.trim();
            if (stx.length < 2) {
              alert("검색어는 두글자 이상 입력하십시오.");
              f.stx.select();
              f.stx.focus();
              return false;
            }

            // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
            var cnt = 0;
            for (var i = 0; i < stx.length; i++) {
              if (stx.charAt(i) == ' ')
                cnt++;
            }

            if (cnt > 1) {
              alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
              f.stx.select();
              f.stx.focus();
              return false;
            }
            f.stx.value = stx;

            return true;
          }
        </script>

      </fieldset>

      
    </div>

    <div id="logo">
          <?php echo latest("ssh_logo", "adm_logo", 1, 100); ?>
    </div>

    <ul class="hd_login">
      <?php if ($is_member) {  ?>
      <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a>
      </li>
      <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
      <?php if ($is_admin) {  ?>
      <li class="tnb_admin"><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">관리자</a></li>
      <?php }  ?>
      <?php } else {  ?>
      <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
      <!-- url= 로그인시 보여줄페이지 -->
      <li><a href="<?php echo G5_BBS_URL ?>/login.php?url=<?php echo G5_BBS_URL ?>/content.php?co_id=company">로그인</a></li>
      <?php }  ?>

    </ul>
  </div>

    <div class="wrap wrap--main">
      <header class="gnb_wrapxxx" id="header">
        <div class="h_pc">
          <div class="h_main">
            <div class="h_main__wrap">
              <div class="h_main__lt">
                <ul id="gnb_1dulxxx" class="h_menu">
                 
                  <?php
                        $menu_datas = get_menu_db(0, true);
                        $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                        $i = 0;
                        foreach( $menu_datas as $row ){
                            if( empty($row) ) continue;
                            $add_class = (isset($row['sub']) && $row['sub']) ? 'gnb_al_li_plusxxx' : '';
                        ?>
                  <!-- gnb_1dli -->
                  <li class="gnb_1dlixxx h_menu__list <?php echo $add_class; ?>"
                    style="z-index:<?php echo $gnb_zindex--; ?>">
                    <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"
                      class="gnb_1daxxx h_menu__link">
                      <!-- `ssh 대메뉴 이름 -->
                      <?php echo $row['me_name'] ?>
                    </a>
                    <?php
                      $k = 0;
                      foreach( (array) $row['sub'] as $row2 ){
                          if( empty($row2) ) continue;
                          if($k == 0)
                              echo '
                            <span class="bg">하위분류</span>
                            <div class="gnb_2dulxxx">
                            <ul class="gnb_2dul_boxxxx h_submenu">'.PHP_EOL; ?>
                    <!-- 2depth ul(gnb_2dul_box) 시작-->
                  <li class="gnb_2dlixxx">
                    <!-- gnb_2dli -->
                    <a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"
                      class="gnb_2daxxx">
                      <!-- `ssh 서브메뉴 이름 -->
                      <?php echo $row2['me_name'] ?>
                    </a>
                  </li> <!-- /gnb_2dli -->
                  <?php
                    $k++;
                    }   //end foreach $row2
                    if($k > 0)
                        echo '</ul></div>'.PHP_EOL;
                    ?>
                  <!-- 2depth ul(gnb_2dul_box) 끝-->
                  </li> <!-- /gnb_1dli -->
                  <?php
                                  $i++;
                                  }   //end foreach $row
                                  if ($i == 0) {  ?>
                  <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a
                      href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수
                    있습니다.<?php } ?></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="h_bg"></div>
        </div>

        <!-- S:Mobile -->
        <div class="h_mo">
          <div class="h_left">
            <h1 class="h_logo">
              <?php echo latest("ssh_mobile_logo", "adm_mobile_logo", 1, 100); ?>
                <span class="blind">와플대학</span>
            </h1>
          </div>
          <div class="h_main">
            <div class="h_main__inner">
            <ul id="gnb_1dulxxx" class="h_menu">
                 
                 <?php
                       $menu_datas = get_menu_db(0, true);
                       $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                       $i = 0;
                       foreach( $menu_datas as $row ){
                           if( empty($row) ) continue;
                           $add_class = (isset($row['sub']) && $row['sub']) ? 'gnb_al_li_plusxxx' : '';
                       ?>
                 <!-- gnb_1dli -->
                 <li class="gnb_1dlixxx h_menu__list <?php echo $add_class; ?>"
                   style="z-index:<?php echo $gnb_zindex--; ?>">
                   <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"
                     class="gnb_1daxxx h_menu__link">
                     <!-- `ssh 대메뉴 이름 -->
                     <?php echo $row['me_name'] ?>
                   </a>
                   <?php
                     $k = 0;
                     foreach( (array) $row['sub'] as $row2 ){
                         if( empty($row2) ) continue;
                         if($k == 0)
                             echo '
                           
                           <ul class="gnb_2dul_boxxxx h_submenu">'.PHP_EOL; ?>
                   <!-- 2depth ul(gnb_2dul_box) 시작-->
                 <li class="gnb_2dlixxx">
                   <!-- gnb_2dli -->
                   <a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"
                     class="gnb_2daxxx">
                     <!-- `ssh 서브메뉴 이름 -->
                     <?php echo $row2['me_name'] ?>
                   </a>
                 </li> <!-- /gnb_2dli -->
                 <?php
                   $k++;
                   }   //end foreach $row2
                   if($k > 0)
                       echo '</ul>'.PHP_EOL;
                   ?>
                 <!-- 2depth ul(gnb_2dul_box) 끝-->
                 </li> <!-- /gnb_1dli -->
                 <?php
                                 $i++;
                                 }   //end foreach $row
                                 if ($i == 0) {  ?>
                 <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a
                     href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수
                   있습니다.<?php } ?></li>
                 <?php } ?>
               </ul>
            </div>
          </div>
          <div class="h_mobile">
            <button type="button" class="h_mobile__btn" aria-pressed="false">
              <span></span>
            </button>
          </div>
        </div>
      </header>
    </div>

  <script>
    $(function () {
      $(".gnb_menu_btn").click(function () {
        $("#gnb_all, #gnb_all_bg").show();
      });
      $(".gnb_close_btn, #gnb_all_bg").click(function () {
        $("#gnb_all, #gnb_all_bg").hide();
      });
    });
  </script>
</div>
<!-- } 상단 끝 -->


<hr>

<!-- 콘텐츠 시작 { -->
<!-- <div id="wrapper">
    <div id="container_wr"> -->

<?php  if(defined('_INDEX_')) {  //첫페이지 만 ?>
<div class="main_container">
  <?php  }else{  //게시판만 날씬하게 ?>

  <?php  
            if($bo_table) {
            echo '<div class="container boardpage">';
        }else{  
            echo '<div class="container normalpage">';
        }  ?>

  <?php  }  ?>

  <?php if (!defined("_INDEX_")) { ?><h2 id="container_title"><span
      title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span></h2><?php }