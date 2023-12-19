<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


$thumb_width = 210;
$thumb_height = 150;
$list_count = (is_array($list) && $list) ? count($list) : 0;

?>


<h2 class="menu_title"><a href="<?php echo get_pretty_url($bo_table); ?>"><?php echo $bo_subject ?></a></h2>

<div class="swiper <?php echo $bo_table; ?> " >
   
    <div class="swiper-wrapper">
    <?php
    for ($i=0; $i<$list_count; $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
					
        $img = $thumb['ori'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" class="img-fluid" alt="'.$thumb['alt'].'" >';
    $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
    ?>
        <div  class="swiper-slide">
        
            <?php           
            echo "<a href=\"".$wr_href."\"> ";          
            echo  $img_content; 
            echo "</a>";
            ?>

      <div class="slide-title"><?php echo $list[$i]['subject']; ?></div> 
           
        </div>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    게시물이 없습니다.
    <?php }  ?>
    </div>
     <div class="swiper-pagination"></div>
     <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
    
</div>
<script>
const menuswiper = new Swiper('.swiper.<?php echo $bo_table; ?>', {
  slidesPerView: 1,
  loop: true, 
  centeredSlides: true,
  spaceBetween: 50,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: '.swiper.<?php echo $bo_table; ?> .swiper-button-next',
    prevEl: '.swiper.<?php echo $bo_table; ?> .swiper-button-prev',
  },
  breakpoints: {
        600: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        900: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1200: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1400: {
          slidesPerView: 5,
          spaceBetween: 50,
        },
      },
});
</script>
<style>
.menu_title {
  text-align: center;
  font-size: 3rem;
  margin-bottom: 2rem;
  color: darkblue;
}
.slide-title {
    text-align: center;
    font-size: 2rem;
    margin-top: 2rem;
    font-family: 'Pretendard-Regular', sans-serif;
}
.swiper.menu .swiper-slide img{
  border-radius: 10px;
}
.swiper.menu .swiper-slide-active img {

} 

</style>