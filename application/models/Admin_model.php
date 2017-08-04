<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model { 

    public function &__get($key) {
        $CI = & get_instance();
        return $CI->$key;
    }

    function get_user_account() { 
        $this->load->library('Datatables');
        $this->datatables->select('user_accounts.uacc_username as uacc_username,user_accounts.uacc_group_fk as uacc_group_fk,user_accounts.uacc_email as uacc_email,user_accounts.uacc_id as uacc_id,user_accounts.uacc_ip_address as uacc_ip_address ,user_accounts.uacc_date_last_login as uacc_date_last_login,user_accounts.uacc_suspend as uacc_suspend');
        $this->datatables->from('user_accounts');
        $this->datatables->where('uacc_group_fk = 1');
        return $this->datatables->generate();
    }

    function get_withdraw_request() {
        $this->load->library('Datatables');
        $this->datatables->select('withdrawals.id as id,withdrawals.user_id as user_id,'
                . 'withdrawals.record_status as record_status,'
                . 'withdrawals.withdrawal_id as withdrawal_id,'
                . 'user_accounts.uacc_username as uacc_username,'
                . 'withdrawals.withdrawal_status_text as withdrawal_status_text,'
                . 'withdrawals.created_date as created_date,'
                . 'withdrawals.amount as amount');
        $this->datatables->from('withdrawals');
        $this->datatables->join('user_accounts', 'withdrawals.user_id = user_accounts.uacc_id', 'left');
        return $this->datatables->generate();
    }

    function get_depositinfo() {
        $this->load->library('Datatables');
        $this->datatables->select('deposits.id as id,'
                . 'user_accounts.uacc_username as uacc_username,'
                . 'deposits.transaction_id  as transaction_id,'
                . 'deposits.address as address,'
                . 'deposits.confirms_needed as confirms_needed,'
                . 'deposits.confirms_received as confirms_received,'
                . 'deposits.deposit_status_text as deposit_status_text,'
                . 'deposits.status_url as status_url,'
                . 'deposits.qrcode_url as qrcode_url,'
                . 'deposits.record_status as record_status,'
                . 'deposits.created_date as created_date,'
                . 'deposits.amount as amount');
        $this->datatables->from('deposits');
        $this->datatables->join('user_accounts', 'deposits.user_id = user_accounts.uacc_id', 'left');
        return $this->datatables->generate();
    }

    function dashboard_data() {
        $query = $this->db->query('SELECT
  (SELECT COUNT(*) FROM deposits) as total_deposits, 
  (SELECT COUNT(*) FROM plans) as total_plans, 
  (SELECT COUNT(*) FROM user_accounts where uacc_group_fk = 1) as total_user_accounts, 
  (SELECT COUNT(*) FROM user_accounts where uacc_group_fk = 1 and uacc_active = 0) as total_pending_users, 
  (SELECT COUNT(*) FROM user_accounts where uacc_group_fk = 1 and uacc_active = 1) as total_active_users,  
  (SELECT COUNT(*) FROM withdrawals) as total_withdrawals');        
        return $query->row();
    }

}
