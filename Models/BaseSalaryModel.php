<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

class BaseSalaryModel extends BaseModel {
    protected function getTableName() {
        return 'base_salaries';
    }

    /**
     * Lấy bảng lương cơ bản theo kênh
     * @param string $channel
     * @return object|null
     */
    public function getBaseSalariesByChannel($channel) {
        return $this->getResults('WHERE channel = %s', [$channel]);
    }
}