<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model {

    public function &__get($key) {
        $CI = & get_instance();
        return $CI->$key;
    }

    function select_all($tbl) { 
        $data = $this->db->get($tbl);
        return $data->result();
    }

    function select_where($table, $id) {
        $qry = $this->db->get_where($table, $id);
        $respond = $qry->result();
        return $respond;
    }

    function select_where_row($table, $id) {
        $qry = $this->db->get_where($table, $id);
        return $qry->row();
    }

    function select_update($table, $data, $id) {
        $query = $this->db->update($table, $data, $id);
        return $query;
    }

    function insert($table, $data) {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    function delete_where($tbl, $where) {
        $query = $this->db->delete($tbl, $where);
        return $query;
    }

    function inserted_id($table, $data) {
        $insert_id = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function get_donor_prices($donor_id) {
        $qry = $this->db->get_where('donors_prices', $donor_id);
        $respond = $qry->result_array();
        return $respond;
    }

    function deposit_history($limit = null, $start = null, $user_id, $from_date = null, $to_date = null) {
        if ($limit != null || $start != null) {
            $this->db->limit($limit, $start);
        }
        $this->db->where('deposits.record_status', 1);
        $this->db->where('deposits.user_id', $user_id);
        if ($from_date != null && $to_date != null) {
            $this->db->where('deposits.created_date >=', $from_date . ' 00:00:00');
            $this->db->where('deposits.created_date <=', $to_date . ' 23:59:59');
        }
        $this->db->order_by('deposits.created_date desc');
        $query = $this->db->get('deposits');
        if ($query->num_rows() > 0) {
            $final_data = array();
            foreach ($query->result() as $key => $row) {
                $data[] = $row;
                $final_data[$key] = $row;
            }
            $final_data['counts'] = $query->num_rows();
            return $final_data;
        }
        return false;
    }

    function earninghistory($limit = null, $start = null, $user_id, $from_date = null, $to_date = null) {
        if ($limit != null || $start != null) {
            $this->db->limit($limit, $start);
        }
        $this->db->where('earnings.user_id', $user_id);
        if ($from_date != null && $to_date != null) {
            $this->db->where('earnings.date >=', $from_date . ' 00:00:00');
            $this->db->where('earnings.date <=', $to_date . ' 23:59:59');
        }
        $this->db->order_by('earnings.created_date desc');
        $query = $this->db->get('earnings');
        if ($query->num_rows() > 0) {
            $final_data = array();
            foreach ($query->result() as $key => $row) {
                $data[] = $row;
                $final_data[$key] = $row;
            }
            $final_data['counts'] = $query->num_rows();
            return $final_data;
        }
        return false;
    }

    function withdrawals_history($limit = null, $start = null, $user_id, $from_date = null, $to_date = null) {
        if ($limit != null || $start != null) {
            $this->db->limit($limit, $start);
        }
        $this->db->where('withdrawals.record_status', 1);
        $this->db->where('withdrawals.user_id', $user_id);
        if ($from_date != null && $to_date != null) {
            $this->db->where('withdrawals.created_date >=', $from_date . ' 00:00:00');
            $this->db->where('withdrawals.created_date <=', $to_date . ' 23:59:59');
        }
        $this->db->order_by('withdrawals.created_date desc');
        $query = $this->db->get('withdrawals');
        if ($query->num_rows() > 0) {
            $final_data = array();
            foreach ($query->result() as $key => $row) {
                $data[] = $row;
                $final_data[$key] = $row;
            }
            $final_data['counts'] = $query->num_rows();
            return $final_data;
        }
        return false;
    }

    function get_summary($user_id) {
        $query = $this->db->query("SELECT (SELECT SUM(amount) FROM deposits WHERE user_id = " . $user_id . " and deposit_status = 100) as total_deposits, "
                . "(SELECT SUM(amount) FROM deposits WHERE user_id = " . $user_id . " and deposit_status = 0) as pending_deposits, "
                . "(SELECT deposits.created_date FROM deposits WHERE user_id = " . $user_id . " order by id desc limit 1) as deposit_last_visit_date,"
                . "(SELECT SUM(amount) FROM withdrawals WHERE user_id = " . $user_id . " and withdrawal_status = 2) as total_withdrawals,"
                . "(SELECT SUM(profit) FROM earnings where user_id = " . $user_id . ") as total_earnings,"
                . "(SELECT SUM(profit) FROM earnings where user_id = " . $user_id . " and type = 'Referral Comission') as total_reffral_commission,"
                . "(SELECT earnings.created_date FROM earnings WHERE user_id = " . $user_id . " order by id desc limit 1) as earnings_last_date,"
                . "(SELECT SUM(amount) FROM withdrawals WHERE user_id = " . $user_id . " and withdrawal_status = 0 or withdrawal_status = 1) as pending_withdrawals,"
                . "(SELECT withdrawals.created_date FROM withdrawals WHERE user_id = " . $user_id . " order by id desc limit 1) as withdrawals_last_visit_date");
        return $query->row();
    }

    function get_reffrel_commision($user_id) {
        $query = $this->db->query("SELECT (SELECT SUM(profit) FROM earnings where user_id = " . $user_id . " and type = 'Referral Comission') as 'total_reffral_commission', "
                . "(SELECT COUNT(*) FROM user_accounts WHERE reffered_by = " . $user_id . " and uacc_active = 1) as active_refferals");
        return $query->row();
    }

    function select_deposits() {
        $query = $this->db->query("select user_id,transaction_id from deposits");
        return $query->result_array();
    }

    function get_depositinfo($user_id, $plan_id) {
        $this->db->select('deposits.*,plans.id as plan_id,plans.name as plan_name,plans.description,plans.minimum_amount');
        $this->db->select('deposits.*');
        $this->db->from('deposits');
        $this->db->join('plans', 'plans.id = deposits.plan');
        $this->db->where('deposits.user_id', $user_id);
        $this->db->where('deposits.plan', $plan_id);
        $this->db->where('deposits.deposit_status', 100);
        $this->db->where('deposits.record_status', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_profitinfo($deposit_id) {
        $query = $this->db->query("select * from earnings where deposit_id = '" . $deposit_id . "' order by id desc limit 1");
        return $query->row();
    }

    function get_withdrawinfo($user_id) {
        $query = $this->db->query("SELECT (SELECT SUM(profit) FROM earnings where user_id = " . $user_id . ") as 'total_earnings'");
        return $query->row();
    }

    function get_deposit_for_princile($deposit_date) {
        $this->db->select('deposits.*');
        $this->db->from('deposits');
        $this->db->where('deposits.plan', 1);
        $this->db->where('deposits.created_date >=', $deposit_date . ' 00:00:00');
        $this->db->where('deposits.created_date <=', $deposit_date . ' 23:59:59');
        $query = $this->db->get();
        return $query->result();
    }
    
    function setting_data() {
        $query = $this->db->query("SELECT
  (SELECT SUM(`amount`) from deposits) as total_deposits, 
  (SELECT COUNT(*) FROM user_accounts where uacc_group_fk = 1) as total_user_accounts,
  (SELECT SUM(`amount`) FROM withdrawals) as total_withdrawals");
        return $query->row();
    }

}
