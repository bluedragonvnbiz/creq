<div class="modal fade channel-modal" id="channel-style-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">계정이 추구하는 이미지를 선택하세요</h6>
            </div>
            <div class="modal-body">
                <div class="option-list grid-2">
                    <?php $styles = ['감성,비주얼', '유머,코미디', '매거진,정보전달', '일상,라이프스타일', '카툰 스타일']; ?>
                    <?php foreach ($styles as $index => $style) { ?>
                        <label class="option-item" for="style<?= $index + 1 ?>">
                            <input type="checkbox" name="channel_styles[]" id="style<?= $index + 1 ?>" value="<?= $index + 1 ?>">
                            <span class="option-label"><?= $style ?></span>
                        </label>
                    <?php } ?>
                </div>
                <div class="field-group other-option">
                    <label class="field-label">기타</label>
                    <input type="text" class="field-control" name="other_style" autocomplete="off" placeholder="직접 입력">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-confirm" disabled>확인</button>
            </div>
        </div>
    </div>
</div>