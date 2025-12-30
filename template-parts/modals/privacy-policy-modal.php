<div class="modal fade term-modal" id="privacy-policy-modal" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">개인정보 처리방침</h6>
            </div>
            <div class="modal-body">
                <?php 
                    $privacy_page = get_page_by_path('privacy-policy');
                    if ( $privacy_page ) {
                        echo apply_filters('the_content', $privacy_page->post_content);
                    }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-close-modal" data-bs-dismiss="modal" aria-label="Close">닫기</button>
                <button type="button" class="btn-agree" data-name="agree_privacy">동의</button>
            </div>
        </div>
    </div>
</div>