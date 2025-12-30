<style>
	.camp-nav{margin-bottom: 0}
</style>
<div class="admin-section bg-white" style="border-bottom: 2px solid #DFE5EF">
	<div class="d-flex align-items-center justify-content-between p-10 px-0">
		<div class="d-flex align-items-center gap-15">
			<select class="form-select max-content">
				<option>인플루언서 전체</option>
				<option>2</option>
				<option>3</option>
			</select>
			<select class="form-select max-content">
				<option>등급 전체</option>
				<option>2</option>
				<option>3</option>
			</select>
		</div>
		<div class="d-flex gap-15 justify-content-end align-items-center">
			<span class="fs-14">마감 기한 ~2025.11.11</span>
			<button class="btn btn-outline-primary" type="button" disabled>인플루언서 확정</button>
			<button class="btn btn-primary" type="button" disabled>인원 추가</button>
		</div>
	</div>
</div>
<div class="admin-section p-10 d-flex gap-10 align-items-center">
	<button class="btn btn-outline-light" type="button">
		<span>전체</span>
		<span class="text-primary">0 / 0</span>
	</button>
	<?php  
	$type_arr = ["Seed","Starter","Newbie","Active","Core","Lead","Prime"];
	foreach ($type_arr as $key => $value) { ?>
		<button class="btn btn-outline-light" type="button">
			<span><?= $value ?></span>
			<span class="text-primary">0 / 0</span>
		</button>
	<?php
	}
	?>
	<button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#add-modal">+ 인원추가</button>
</div>
<div class="admin-section">
	<div class="custom-table influencer">
		<div class="table-row table-head table-section">
			<span>인플루언서</span>
			<span>카테고리</span>
			<span>등급</span>
			<span>Fit-Score</span>
			<span>예상 CPV</span>
			<span>팔로워 수</span>
			<span>2차활용 동의</span>
			<span>캠페인 진행 선정</span>
		</div>
		<div class="table-body">
			<div class="table-section">
				<div class="table-row">
					<span>인플루언서</span>
					<span>카테고리</span>
					<span>등급</span>
					<span>Fit-Score</span>
					<span>예상 CPV</span>
					<span>팔로워 수</span>
					<span>2차활용 동의</span>
					<span>캠페인 진행 선정</span>
				</div>
				<div class="influencer-item">
					
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="modal fade admin-modal" id="add-modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    	<div class="modal-body text-center">
    		<strong class="fw-semibold fs-18 mb-3 d-block">인원 추가 </strong>
    		<table class="table table-borderless mb-0">
    			<thead>
    				<tr>					      
    					<th scope="col">등급</th>
    					<th scope="col">현재인원</th>
    					<th scope="col">추가인원</th>
    					<th scope="col">총인원</th>
    				</tr>
    			</thead>
    			<tbody>
    			<?php  
    			foreach ($type_arr as $key => $value) { ?>
    				<tr>					      
    					<td><?= $value ?></td>
    					<td>1</td>
    					<td class="d-flex justify-content-center">
    						<input class="numberstyle" type="number" min="1" step="1" max="6" name="" placeholder="0" readonly>
    					</td>
    					<td class="text-primary">1</td>
    				</tr>
    			<?php
    			}
    			?>    				
    			</tbody>
    		</table>
    	</div>
    	<div class="modal-footer">
    		<button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">취소</button>
    		<button type="button" class="btn btn-primary" disabled>확인</button>
    	</div>
    </div>
  </div>
</div>