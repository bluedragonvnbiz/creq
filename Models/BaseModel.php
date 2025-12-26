<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

abstract class BaseModel {
    protected $wpdb;
    protected $table;
    protected $primary_key = 'id';

    /**
     * Lấy tên bảng (không có prefix)
     * @return string
     */
    abstract protected function getTableName();

    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $wpdb->prefix . $this->getTableName();
    }

    /**
     * Lấy tất cả bản ghi
     * @param string $sql_tail
     * @param array $args
     * @param string|array $fields
     * @return array
     */
    public function getResults($sql_tail = '', $args = [], $fields = '*') {
        if (is_array($fields)) {
            $fields = array_map(function ($field) {
                return preg_match('/^[a-zA-Z0-9_\.]+$/', $field) ? $field : '`' . esc_sql($field) . '`';
            }, $fields);
            $fields = implode(', ', $fields);
        }

        $sql = "SELECT {$fields} FROM {$this->table}";

        if (!empty($sql_tail)) {
            $sql .= " {$sql_tail}";
        }

        if (!empty($args)) {
            return $this->wpdb->get_results($this->wpdb->prepare($sql, ...$args));
        }

        return $this->wpdb->get_results($sql);
    }

    /**
     * Lấy 1 bản ghi theo điều kiện
     * @param string $sql_tail
     * @param array $args
     * @param string|array $fields
     * @return object|null
     */
    public function getRow($sql_tail = '', $args = [], $fields = '*', $type = OBJECT) {
        if (is_array($fields)) {
            $fields = array_map(function ($field) {
                return preg_match('/^[a-zA-Z0-9_\.]+$/', $field) ? $field : '`' . esc_sql($field) . '`';
            }, $fields);
            $fields = implode(', ', $fields);
        }

        $sql = "SELECT {$fields} FROM {$this->table}";

        if (!empty($sql_tail)) {
            $sql .= " {$sql_tail}";
        }

        // Thêm LIMIT = 1 nếu $sql_tail không chứa LIMIT
        if (stripos($sql_tail, 'LIMIT') === false) {
            $sql .= " LIMIT 1";
        }

        if (!empty($args)) {
            return $this->wpdb->get_row($this->wpdb->prepare($sql, ...$args), $type);
        }

        return $this->wpdb->get_row($sql, $type);
    }

    /**
     * Tạo bản ghi mới
     * @param array $data
     * @return int|false
     */
    public function insert(array $data) {
        $result = $this->wpdb->insert($this->table, $data);
        
        if ($result === false) {
            return false;
        }
        
        return $this->wpdb->insert_id;
    }

    /**
     * Cập nhật bản ghi
     * @param array $data
     * @param array $conditions
     * @return bool
     */
    public function update(array $data, array $conditions) {

        $result = $this->wpdb->update(
            $this->table,
            $data,
            $conditions
        );

        if ($result === false) {
            return false;
        }

        return true;
    }

    /**
     * Xóa bản ghi
     * @param array $conditions
     * @return bool
     */
    public function delete(array $conditions) {
        return (bool) $this->wpdb->delete(
            $this->table,
            $conditions
        );
    }
}