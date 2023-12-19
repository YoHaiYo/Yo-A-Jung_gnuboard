<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>


<?php if(defined('_INDEX_')) {?><!-- index에서만 실행 -->
    
<div class="wrap wrap--main">
  <!-- S:상단 -->

  <!-- E:상단 -->

  <!-- S:창업문의 밴드 -->
  <div class="band">
    <!-- S:밴드 버튼 -->
    <div class="band-def">
      <div class="din">
        <div class="lt">
          <img src="https://www.waffleuniv.com/child/img/inc/brand_logo.png" alt="">
        </div>
        <div class="cnt">
          <p>와플대학 창업 문의</p>
        </div>
        <div class="rt">
          <img src="https://www.waffleuniv.com/child/img/inc/brand_arrow.png" alt="">
        </div>
      </div>
    </div>
    <!-- E:밴드 버튼 -->
    <!-- S:밴드 폼 -->
    <div class="band-action">
      <div class="band-container">
        <div class="din">
          <div class="lt">
            <div class="text">
              <p class="t01">1588-1706</p>
              <p class="t02">
                어려웠던 창업! K-와플로 고민 해결! <br>
                와플대학과 함께라면 행복한 창업이 시작됩니다.
              </p>
            </div>
          </div>
          <div class="rt">
            <div class="band-form">
              <!-- S:폼 -->
              <form id="frm" class="form" action="" method>
                <div class="formmail-table">
                  <div class="row row--w100">
                    <div class="td">
                      <ul class="radio-list">
                        <li>
                          <input type="radio" name="shop_info" id="user_radio01" value="보유">
                          <label for="user_radio01">
                            <span>점포 있음</span>
                          </label>
                        </li>
                        <li>
                          <input type="radio" checked="checked" name="shop_info" id="user_radio02" value="미보유">
                          <label for="user_radio02">
                            <span>점포 없음</span>
                          </label>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="td">
                      <select name="sido" id="sido" onchange="set_gugun(this)">
                        <option value="" selected>창업 희망 시/도 선택</option>
                        <option value="강원특별자치도">강원특별자치도</option>
                        <option value="경기도">경기도</option>
                        <option value="경상남도">경상남도</option>
                        <option value="경상북도">경상북도</option>
                        <option value="광주광역시">광주광역시</option>
                        <option value="대구광역시">대구광역시</option>
                        <option value="대전광역시">대전광역시</option>
                        <option value="부산광역시">부산광역시</option>
                        <option value="서울특별시">서울특별시</option>
                        <option value="세종세종특별자치시">세종세종특별자치시</option>
                        <option value="울산광역시">울산광역시</option>
                        <option value="인천광역시">인천광역시</option>
                        <option value="전라남도">전라남도</option>
                        <option value="전라북도">전라북도</option>
                        <option value="제주특별자치도">제주특별자치도</option>
                        <option value="충청남도">충청남도</option>
                        <option value="충청북도">충청북도</option>
                      </select>

                    </div>
                    <div class="td">
                      <select name="gugun" id="gugun">
                        <option value="">창업 희망 구/군 선택</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="td">
                      <input type="text" name="user_name" id="user_name" placeholder="이름">
                    </div>
                    <div class="td">
                      <input type="tel" name="user_tel" id="user_tel" placeholder="휴대폰번호(-없이 적으셔도됩니다)">
                    </div>
                  </div>
                  <div class="row row--w100">
                    <div class="td">
                      <textarea id="user_textarea" name="user_textarea" placeholder="문의내용"></textarea>
                    </div>
                  </div>
                </div>
                <div class="formmail-submit">
                  <div class="formmail-agree">
                    <label class="agreement-label" for="agreement-check">
                      <input type="checkbox" name="agreement" id="agreement-check" value="Y">
                      <i></i>
                      <p>
                        개인정보처리방침 동의 <button type="button"
                          onclick="window.open('/child/sub/member/privacy.php', '개인정보처리방침', 'width=430, height=500, location=no, status=no, scrollbars=yes');">[전문보기]</button>
                      </p>
                    </label>
                  </div>
                  <div class="formmail-btns">
                    <button type="button" onclick="regInquiry()" class="button button--blue">상담신청하기</button>
                  </div>
                </div>
              </form>
              <!-- E:폼 -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- E:밴드 폼 -->
  </div>
  <!-- E:창업문의 밴드 -->
  <main role="main" id="main">

    <!-- S:비주얼 -->
    <div class="sec sec--01">
      <div class="visual">
        <div class="din">
          <div class="lt">
            <div class="visual-tit" data-aos="fade-in">
              <img src="https://www.waffleuniv.com/child/img/main/visual/sec01_visual__tit01.png" alt="">
            </div>
          </div>
          <div class="rt">
            <div class="visual-photo">
              <div class="swiper swiper-container swiper-container--photo">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="photo">
                      <div class="photo_thumb"
                        style="background-image:url('https://www.waffleuniv.com/upload/banner/65530187081d4.png');">
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="photo">
                      <div class="photo_thumb"
                        style="background-image:url('https://www.waffleuniv.com/upload/banner/655daffe96867.png');">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-navi">
                  <div class="prev"></div>
                  <div class="next"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="pagination"></div>
      </div>
    </div>
    <!-- E:비주얼 -->

    <!-- S:메뉴 -->
    <div class="sec sec--02">
      <div class="container container--w1600">

         <!-- `ssh 메뉴 넣기 -->
    <?php echo latest("ssh_menu", "menu", 8, 100); ?>
        
      </div>
    </div>
    <!-- E:메뉴 -->
 


    <!-- S:브랜드 -->
    <div class="sec sec--03">
      <div class="brand">
        <div class="container">
          <div class="text" data-aos="fade-up">
            <p class="t01 font-family--montserrat">WAFFLE & COFFEE</p>
            <p class="t02">와플대학 BRAND STORY</p>
            <p class="t03">2008년부터 시작한 대한민국 와플 <b>NO.1,</b></p>
            <p class="t04">
              와플대학은 다양한 10가지 맛 크림과 맛있는 토핑으로 만든 <br class="pc" />
              바삭한 와플을 커플, 가족, 친구, 아이와 함께 즐길 수 있는 카페입니다.
            </p>
            <p class="t04">와플대학에서 K와플을 즐겨보세요!</p>
            <ul class="list list--link">
              <li>
                <a href="http://yohayo.dothome.co.kr/yoajung/bbs/content.php?co_id=franchise_procedure" class="button button--lineblue">창업 문의</a>
              </li>
              <li>
                <a href="http://yohayo.dothome.co.kr/yoajung/bbs/content.php?co_id=brand" class="button button--blue">브랜드 소개</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- E:브랜드 -->

    <!-- S:게시판 -->
    <div class="sec sec--04">
      <div class="container container--w1600" data-aos="fade-up">
 
        <div class="con">

          <div class="board board--main">
            <ul class="tab-menu">
              <li class="on">
                <!-- <button type="button" class="button">이벤트</button> -->
              </li>
            </ul>
            <ul class="tab-con">
              <li class="on">
                <div class="block">
                  <!-- `ssh 이벤트메뉴 -->
                  <?php echo latest("ssh_event", "event", 4, 100); ?>

                </div>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- E:게시판 -->

   

  </main>
  <!-- E:메인 -->

  

</div>

<?php } ?><!-- index에서만 실행 -->