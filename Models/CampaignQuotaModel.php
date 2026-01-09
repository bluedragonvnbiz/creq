<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

class CampaignQuotaModel extends BaseModel {
    protected function getTableName() {
        return 'campaign_quotas';
    }

    
}