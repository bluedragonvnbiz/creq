<div class="modal fade channel-modal" id="channel-category-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">콘텐츠 주요 카테고리를 선택하세요</h6>
            </div>
            <div class="modal-body">
                <div class="option-list grid-4">
                    <?php $categories = ['패션', '뷰티', '푸드', 'IT,테크', '리빙', '육아', '헬스', '맛집', '여행', '펫', '자기개발', '도서', '게임']; ?>
                    <?php foreach ($categories as $index => $category) { ?>
                        <label class="option-item" for="category<?= $index + 1 ?>">
                            <input type="checkbox" name="channel_categories[]" id="category<?= $index + 1 ?>" value="<?= $index + 1 ?>">
                            <span class="option-label"><?= $category ?></span>
                        </label>
                    <?php } ?>
                </div>
                <div class="field-group other-option">
                    <label class="field-label">기타</label>
                    <input type="text" class="field-control" name="other_category" autocomplete="off" placeholder="직접 입력">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-confirm" disabled>확인</button>
            </div>
        </div>
    </div>
</div>