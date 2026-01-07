<?php extract((array)$args); ?>

<div class="modal fade admin-modal" id="base-salary-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="baseSalaryForm" class="base-salary-form" method="post">
                <div class="modal-body text-center">
                    <h5 class="modal-title">기본급 설정</h5>
                    <div class="salary-box-wrap">
                        <div class="salary-box">
                            <div class="label">등급</div>
                            <div class="label">기본급</div>
                        </div>
                        
                        <?php
                            foreach ($instagram_base_salaries as $level) {
                        ?>
                            <div class="salary-box">
                                <label class="label" for="baseSalary<?php echo $level->level_en_name; ?>"><?php echo $level->level_en_name; ?></label>
                                <div class="input-group">
                                    <input type="text" inputmode="numeric" 
                                        class="form-control input-numeric text-end pe-0 border-end-0" 
                                        name="base_salary[<?php echo $level->level_en_name; ?>]" 
                                        id="baseSalary<?php echo $level->level_en_name; ?>" 
                                        value="<?php echo number_format($level->base_salary); ?>"
                                        placeholder="0" 
                                        required
                                    >
                                    <div class="input-group-text fs-14">원</div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php wp_nonce_field('setting_base_salary_nonce', 'action_nonce'); ?>
				    <input type="hidden" name="action" value="setting_base_salary">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">취소</button>
                    <button type="submit" class="btn btn-primary" disabled>확인</button>
                </div>
            </form>
        </div>
    </div>
</div>