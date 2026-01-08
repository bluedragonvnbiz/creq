<?php
get_template_part("template-parts/components/header","main",["title" => "캠페인"]);
?>
<style>body{background-color: #F8F8FA}</style>
<div class="container bg-white py-2">
	<ul class="nav nav-tabs pv-tabs flex-nowrap" role="tablist">
	  <li class="nav-item">
	    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#campain-tab-1" type="button" role="tab">전체</button>
	  </li>
	  <li class="nav-item">
	    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#campain-tab-2" type="button" role="tab">제안</button>
	  </li>
	  <li class="nav-item">
	    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#campain-tab-3" type="button" role="tab">신청완료</button>
	  </li>
	  <li class="nav-item">
	    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#campain-tab-4" type="button" role="tab">보류</button>
	  </li>
	</ul>
</div>

<div class="tab-content campain">
  <div class="tab-pane fade show active" id="campain-tab-1">
  	<div class="container bg-white filter-box p-3 d-flex flex-column gap-12">
  		<div class="input-group">
		  <input type="text" class="form-control" placeholder="캠페인명을 검색해보세요">
		  <span class="input-group-text"><svg width="20" height="20"><use href="#icon-search"></use></svg></span>
		</div>
		<div class="d-flex column-gap-2 align-items-center">
			<button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#type-modal">
				<span>채널</span>
				<svg width="15" height="15"><use href="#icon-arrow-down"></use></svg>		
			</button>
			<button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#category-modal">
				<span>카테고리</span>
				<svg width="15" height="15"><use href="#icon-arrow-down"></use></svg>		
			</button>
			<button class="btn btn-outline-light" type="button">모집완료 포함</button>
		</div>
  	</div>
  	<div class="list-items px-3 py-4 d-flex flex-column row-gap-3">
  		<?php  
        for ($i=0; $i < 5; $i++) { 
            echo '<div class="swiper-slide">';
                get_template_part('template-parts/campaigns/item-type-2');
            echo '</div>';
        }
        ?> 
  	</div>
  </div>
  <div class="tab-pane fade" id="campain-tab-2">
  	<div class="container bg-white filter-box p-3 d-flex flex-column gap-12">
  		<div class="input-group">
		  <input type="text" class="form-control" placeholder="캠페인명을 검색해보세요">
		  <span class="input-group-text"><svg width="20" height="20"><use href="#icon-search"></use></svg></span>
		</div>
		<div class="d-flex column-gap-2 align-items-center">
			<button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#type-modal">
				<span>채널</span>
				<svg width="15" height="15"><use href="#icon-arrow-down"></use></svg>		
			</button>
			<button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#category-modal">
				<span>카테고리</span>
				<svg width="15" height="15"><use href="#icon-arrow-down"></use></svg>		
			</button>
			<button class="btn btn-outline-light" type="button">모집완료 포함</button>
		</div>
  	</div>
  	<div class="list-items px-3 py-4 d-flex flex-column row-gap-3">
  		<?php  
        for ($i=0; $i < 5; $i++) { 
            echo '<div class="swiper-slide">';
                get_template_part('template-parts/campaigns/item','type-2',[]);
            echo '</div>';
        }
        ?> 
  	</div>
  </div>
  <div class="tab-pane fade" id="campain-tab-3">
  	<div class="container bg-white filter-box p-3 d-flex flex-column gap-12">
  		<div class="input-group">
		  <input type="text" class="form-control" placeholder="캠페인명을 검색해보세요">
		  <span class="input-group-text"><svg width="20" height="20"><use href="#icon-search"></use></svg></span>
		</div>
		<div class="d-flex column-gap-2 align-items-center">
			<button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#type-modal">
				<span>채널</span>
				<svg width="15" height="15"><use href="#icon-arrow-down"></use></svg>		
			</button>
			<button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#category-modal">
				<span>카테고리</span>
				<svg width="15" height="15"><use href="#icon-arrow-down"></use></svg>		
			</button>
			<button class="btn btn-outline-light" type="button">모집완료 포함</button>
		</div>
  	</div>
  	<div class="list-items px-3 py-4 d-flex flex-column row-gap-3">
  		<?php  
        for ($i=0; $i < 5; $i++) { 
            echo '<div class="swiper-slide">';
                get_template_part('template-parts/campaigns/item','type-2',["type"=>"success"]);
            echo '</div>';
        }
        ?> 
  	</div>
  </div>
  <div class="tab-pane fade" id="campain-tab-4">
  	<div class="container bg-white filter-box p-3 d-flex flex-column gap-12">
  		<div class="input-group">
		  <input type="text" class="form-control" placeholder="캠페인명을 검색해보세요">
		  <span class="input-group-text"><svg width="20" height="20"><use href="#icon-search"></use></svg></span>
		</div>
		<div class="d-flex column-gap-2 align-items-center">
			<button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#type-modal">
				<span>채널</span>
				<svg width="15" height="15"><use href="#icon-arrow-down"></use></svg>		
			</button>
			<button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#category-modal">
				<span>카테고리</span>
				<svg width="15" height="15"><use href="#icon-arrow-down"></use></svg>		
			</button>
			<button class="btn btn-outline-light" type="button">모집완료 포함</button>
		</div>
  	</div>
  	<div class="list-items px-3 py-4 d-flex flex-column row-gap-3">
  		<?php  
        for ($i=0; $i < 5; $i++) { 
            echo '<div class="swiper-slide">';
                get_template_part('template-parts/campaigns/item-type-2');
            echo '</div>';
        }
        ?> 
  	</div>
  </div>
</div>

<div class="d-none">
	<svg id="icon-search" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	<g clip-path="url(#clip0_888_11503)">
	<path d="M17.2583 16.075L14.425 13.25C15.3392 12.0854 15.8352 10.6472 15.8333 9.16667C15.8333 7.84813 15.4423 6.5592 14.7098 5.46287C13.9773 4.36654 12.9361 3.51206 11.7179 3.00747C10.4997 2.50289 9.15927 2.37087 7.86607 2.6281C6.57286 2.88534 5.38497 3.52027 4.45262 4.45262C3.52027 5.38497 2.88534 6.57286 2.6281 7.86607C2.37087 9.15927 2.50289 10.4997 3.00747 11.7179C3.51206 12.9361 4.36654 13.9773 5.46287 14.7098C6.5592 15.4423 7.84813 15.8333 9.16667 15.8333C10.6472 15.8352 12.0854 15.3392 13.25 14.425L16.075 17.2583C16.1525 17.3364 16.2446 17.3984 16.3462 17.4407C16.4477 17.4831 16.5567 17.5048 16.6667 17.5048C16.7767 17.5048 16.8856 17.4831 16.9872 17.4407C17.0887 17.3984 17.1809 17.3364 17.2583 17.2583C17.3364 17.1809 17.3984 17.0887 17.4407 16.9872C17.4831 16.8856 17.5048 16.7767 17.5048 16.6667C17.5048 16.5567 17.4831 16.4477 17.4407 16.3462C17.3984 16.2446 17.3364 16.1525 17.2583 16.075ZM4.16667 9.16667C4.16667 8.17776 4.45991 7.21106 5.00932 6.38882C5.55873 5.56657 6.33962 4.92571 7.25325 4.54727C8.16688 4.16883 9.17222 4.06982 10.1421 4.26274C11.112 4.45567 12.0029 4.93187 12.7022 5.63114C13.4015 6.3304 13.8777 7.22131 14.0706 8.19122C14.2635 9.16112 14.1645 10.1665 13.7861 11.0801C13.4076 11.9937 12.7668 12.7746 11.9445 13.324C11.1223 13.8734 10.1556 14.1667 9.16667 14.1667C7.84059 14.1667 6.56882 13.6399 5.63114 12.7022C4.69345 11.7645 4.16667 10.4928 4.16667 9.16667Z" fill="#69696B"/>
	</g>
	<defs>
	<clipPath id="clip0_888_11503">
	<rect width="20" height="20" fill="white"/>
	</clipPath>
	</defs>
	</svg>
	<svg id="icon-arrow-down" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M7.85577 10.1397C7.66001 10.338 7.33999 10.338 7.14423 10.1397L2.84771 5.78891C2.65509 5.59386 2.65544 5.28009 2.84848 5.08547L3.07421 4.85789C3.2698 4.66071 3.58861 4.66071 3.78419 4.85789L7.14501 8.2462C7.3406 8.44338 7.6594 8.44338 7.85499 8.2462L11.2158 4.85789C11.4114 4.66071 11.7302 4.66071 11.9258 4.85789L12.1515 5.08547C12.3446 5.28009 12.3449 5.59386 12.1523 5.78891L7.85577 10.1397Z" fill="#69696B"/>
	</svg>
</div>
<?php
get_template_part("template-parts/modals/campain");
get_template_part("template-parts/components/mobile-tab-bottom");
