<?php get_admin_header(); ?>

<style>
	.camp-nav {
        margin-bottom: 12px;
    }
</style>

<?php get_admin_part("layouts/topbar", "", ["title" => "캠페인 관리"]); ?>
<?php get_admin_part("components/campaigns/campaign-header"); ?>
<?php get_admin_part("components/campaigns/campaign-navbar"); ?>

<div class="admin-section mb-12 table-responsive">
	<table class="table align-middle custom-table">
	  <thead>
	    <tr>
		    <th>인플루언서</th>
		    <th>진행단계</th>
		    <th>계약서 작성일</th>
		    <th>계약 상태</th>
		    <th style="width: 55px;">계약서</th>
	    </tr>
	  </thead>
	  <tbody>
	    	<tr>
		      <td>
		      	<div class="user d-flex align-items-center gap-15">
			      		<div class="d-flex gap-10 align-items-center">
			      			<img class="object-fit-cover rounded-circle" src="<?= IMAGES_URL ?>/demo/user-01.jpg" alt="" style="width:36px;height: 36px;">
			      		</div>
			      		<div class="d-flex flex-column">
			      			<div class="d-flex align-items-center gap-05">
			      				<svg width="15" height="15"><use href="#icon-blue-star"></use></svg>
			      				<span class="fw-semibold">leomessi</span>
			      			</div>
			      			<div class="d-flex align-items-center gap-05">
			      				<img class="object-fit-cover rounded-circle" src="<?= IMAGES_URL ?>/icons/instagram.svg" alt="" style="width:15px;height: 15px;">
			      				<span>Leo messi</span>
			      			</div>
			      		</div>
						</div>
		      </td>
		      <td>배송 중</td>
		      <td>2025.10.29</td>
		      <td>계약완료</td>
		      <td class="text-center">
		      	<svg width="15" height="19"><use href="#icon-paper"></use></svg>
		      </td>
		    </tr>
		    <tr>
		      <td>
		      	<div class="user d-flex align-items-center gap-15">
			      		<div class="d-flex gap-10 align-items-center">
			      			<img class="object-fit-cover rounded-circle" src="<?= IMAGES_URL ?>/demo/user-01.jpg" alt="" style="width:36px;height: 36px;">
			      		</div>
			      		<div class="d-flex flex-column">
			      			<div class="d-flex align-items-center gap-05">
			      				<svg width="15" height="15"><use href="#icon-blue-star"></use></svg>
			      				<span class="fw-semibold">leomessi</span>
			      			</div>
			      			<div class="d-flex align-items-center gap-05">
			      				<img class="object-fit-cover rounded-circle" src="<?= IMAGES_URL ?>/icons/instagram.svg" alt="" style="width:15px;height: 15px;">
			      				<span>Leo messi</span>
			      			</div>
			      		</div>
						</div>
		      </td>
		      <td>배송 중</td>
		      <td>2025.10.29</td>
		      <td><span class="text-danger">계약완료</span></td>
		      <td class="text-center">
		      	<svg width="15" height="19"><use href="#icon-paper"></use></svg>
		      </td>
		    </tr>
	  </tbody>
	</table>
</div>

 




<div class="d-none">
	<svg id="icon-blue-star" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M9.01515 1.28734L8.85648 1.06512C8.19173 0.134544 6.80873 0.134544 6.14398 1.06512L5.98532 1.28734C5.63433 1.77867 5.0451 2.04177 4.44501 1.97509L3.73749 1.89648C2.67597 1.77853 1.77902 2.67548 1.89697 3.737L1.97557 4.44452C2.04226 5.04461 1.77916 5.63384 1.28783 5.98483L1.06561 6.14349C0.135032 6.80824 0.135032 8.19124 1.06561 8.85599L1.28783 9.01466C1.77916 9.36566 2.04226 9.95491 1.97557 10.555L1.89697 11.2625C1.77902 12.324 2.67597 13.221 3.73749 13.103L4.44501 13.0244C5.0451 12.9577 5.63433 13.2208 5.98532 13.7122L6.14398 13.9343C6.80873 14.8649 8.19173 14.8649 8.85648 13.9343L9.01515 13.7122C9.36615 13.2208 9.9554 12.9577 10.5555 13.0244L11.263 13.103C12.3245 13.221 13.2215 12.324 13.1035 11.2625L13.0249 10.555C12.9582 9.95491 13.2213 9.36566 13.7127 9.01466L13.9348 8.85599C14.8654 8.19124 14.8654 6.80824 13.9348 6.14349L13.7127 5.98483C13.2213 5.63384 12.9582 5.04461 13.0249 4.44452L13.1035 3.737C13.2215 2.67548 12.3245 1.77853 11.263 1.89648L10.5555 1.97509C9.9554 2.04177 9.36615 1.77867 9.01515 1.28734Z" fill="#3B6FFF"/>
	<path d="M5 7.66667L6.51575 9.18242C6.59908 9.26575 6.73425 9.26575 6.81758 9.18242L10 6" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>
	<svg id="icon-paper" width="15" height="19" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M9.08333 0.750003H2.41667C1.97464 0.750003 1.55072 0.925597 1.23816 1.23816C0.925595 1.55072 0.75 1.97464 0.75 2.41667V15.75C0.75 16.192 0.925595 16.616 1.23816 16.9285C1.55072 17.2411 1.97464 17.4167 2.41667 17.4167H12.4167C12.8587 17.4167 13.2826 17.2411 13.5952 16.9285C13.9077 16.616 14.0833 16.192 14.0833 15.75V5.75M9.08333 0.750003C9.34713 0.749575 9.6084 0.801338 9.85211 0.90231C10.0958 1.00328 10.3171 1.15147 10.5033 1.33834L13.4933 4.32834C13.6807 4.51459 13.8293 4.73612 13.9306 4.98014C14.0318 5.22415 14.0838 5.48581 14.0833 5.75M9.08333 0.750003V4.91667C9.08333 5.13768 9.17113 5.34964 9.32741 5.50592C9.48369 5.6622 9.69565 5.75 9.91667 5.75L14.0833 5.75M5.75 6.58334H4.08333M10.75 9.91667H4.08333M10.75 13.25H4.08333" stroke="#373739" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>

</div>

<?php get_admin_footer(); ?>
