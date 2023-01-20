<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_quotation_property_model extends CO_Core_Model {

    protected $tableName = 'product_quotation_property';

    public function __construct() {
        parent::__construct($this->tableName);
    }

    public function get_all($filter = array(), $limit = "") {
        $fetch_row = FALSE;
        $order_by = '';
        $where = "active = '1'";
        if (!empty($filter['quotation_details_id'])) {
            $where .= " and quotation_details_id ='" . $filter['quotation_details_id'] . "'";
        }
        $order_by = " created_at desc";
        return $this->select("*", $where, $fetch_row, $order_by, $limit);
    }

    public function add($data) {
        return $this->insert($data);
    }

    public function update($data, $id) {
        $where = "id='$id'";
        return $this->insert($data, $where);
    }

    public function get($id, $active = TRUE) {
        $where = "id='$id'";
        if ($active == TRUE) {
            $where .= " AND active='1'";
        }
        return $this->select("*", $where, TRUE);
    }

}
