<div class="modal fade term-modal" id="terms-conditions-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">서비스 이용약관</h6>
            </div>
            <div class="modal-body">
                <?php 
                    $terms_page = get_page_by_path('terms-conditions');
                    if ( $terms_page ) {
                        echo apply_filters('the_content', $terms_page->post_content);
                    }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-close-modal" data-bs-dismiss="modal" aria-label="Close">닫기</button>
                <button type="button" class="btn-agree" data-name="agree_terms">동의</button>
            </div>
        </div>
    </div>
</div>