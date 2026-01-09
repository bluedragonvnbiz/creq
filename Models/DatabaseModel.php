<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

class DatabaseModel
{
    protected $file_list = [];

    public function __construct()
    {
        // Khởi tạo danh sách các file schema
        $this->file_list = [
            'user_info.php',
            'base_salaries.php',
            'campaigns.php',
            'campaign_quotas.php',
            // Thêm các file schema khác nếu cần
        ];
    }

    /**
     * Khởi tạo tất cả các bảng
     */
    public function initTables()
    {
        // Lấy các file schemas trong themes/edite/database/schemas
        $file_list = $this->file_list;

        foreach ($file_list as $file) {
            require_once get_stylesheet_directory() . '/database/schemas/' . $file;
            $function_name = 'create_table_' . basename($file, '.php');
            
            if (function_exists($function_name)) {
                call_user_func($function_name, $this);
            }
        }

        $this->updateTables();
    }

    public function updateTables()
    {
        // Lấy các file schemas trong themes/edite/database/schemas
        $file_list = $this->file_list;

        foreach ($file_list as $file) {
            require_once get_stylesheet_directory() . '/database/schemas/' . $file;
            $function_name = 'update_table_' . basename($file, '.php');

            if (function_exists($function_name)) {
                call_user_func($function_name, $this);
            }
        }
    }
    
    /**
     * Cập nhật schema
     */
    public function updateSchema()
    {
        // Check version và thực hiện cập nhật
        $current_version = get_option('custom_db_version', '0.0');
        $target_version = '1.5'; // Cập nhật khi thay đổi schema

        if (version_compare($current_version, $target_version, '<')) {
            $this->initTables();
            update_option('custom_db_version', $target_version);
        }else{
            $this->updateTables();
        }
    }

    public function addForeignKeyIfMissing($table_name, $column_name, $referenced_table, $referenced_column = 'id', $constraint_name = '', $on_delete = 'CASCADE')
    {
        global $wpdb;
        
        // Đảm bảo bảng tồn tại
        if ($wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") !== $table_name) return;

        // Đảm bảo cột tồn tại
        $has_column = $wpdb->get_results("SHOW COLUMNS FROM {$table_name} LIKE '{$column_name}'");
        if (empty($has_column)) return;

        // Nếu chưa đặt tên constraint thì tự động đặt
        if (empty($constraint_name)) {
            $constraint_name = "fk_creq_{$column_name}_to_" . str_replace($wpdb->prefix, '', $referenced_table);
        }

        // Kiểm tra constraint đã tồn tại chưa
        $foreign_key_check = $wpdb->get_results("
            SELECT CONSTRAINT_NAME 
            FROM information_schema.KEY_COLUMN_USAGE 
            WHERE TABLE_NAME = '{$table_name}'
            AND CONSTRAINT_NAME = '{$constraint_name}'
            AND TABLE_SCHEMA = DATABASE()
        ");

        if (empty($foreign_key_check)) {
            $wpdb->query("
                ALTER TABLE {$table_name}
                ADD CONSTRAINT {$constraint_name} 
                FOREIGN KEY (`{$column_name}`) 
                REFERENCES {$referenced_table}(`{$referenced_column}`) 
                ON DELETE {$on_delete}
            ");
        }
    }

    public function checkIfColumnExists($table_name, $column_name)
    {
        global $wpdb;
        $column_exists = $wpdb->get_results("SHOW COLUMNS FROM {$table_name} LIKE '{$column_name}'");
        return !empty($column_exists);
    }
}