<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

class CampaignModel extends BaseModel {
    protected function getTableName() {
        return 'campaigns';
    }

    
}