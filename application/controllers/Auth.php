<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller { 

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('bitcoin');
        $this->auth = new stdClass;

        $this->load->library('flexi_auth');
        if ($this->flexi_auth->is_logged_in_via_password() && uri_string() != 'auth/logout') {
            if ($this->session->flashdata('message')) {
                $this->session->keep_flashdata('message');
            }
        }
        $this->data = null;
        if ($this->flexi_auth->is_logged_in()) {
            $this->data['userinfo'] = $this->userinfo = $this->flexi_auth->get_user_by_identity_row_array();
            $this->user_id = $this->data['userinfo']['uacc_id'];
        }
    }

    function index() {
        $this->home();
    }

    public function include_files() { 
        $this->data['header'] = $this->load->view('includes/header', $this->data, TRUE);
        $this->data['common'] = $this->load->view('includes/common', $this->data, TRUE);
        $this->data['footer'] = $this->load->view('includes/footer', $this->data, TRUE);
        return $this->data;
    }

    function calculate_return() {
        $data = $this->Common_model->select_where_row('plans', array('id' => $this->input->post('plan_id')));
        if($data->plan_duration != null) {
            $total_percentage = $data->profit_margin * $data->plan_duration;
        }else {
            $total_percentage = 1825;
        }
        $total_return = $this->input->post('amount') * $total_percentage / 100;
        die(json_encode($total_return));
    }

    public function home() {
        $this->data['plans'] = $this->Common_model->select_where('plans', array('status' => 1));
        $settings_data = $this->Common_model->select_where_row('webisite_settings', array('id' => 1));
        $data = $this->Common_model->setting_data();
        $this->data['web_settings'] = array(
            'running_days' => $settings_data->running_days,
            'total_accounts' => $settings_data->total_accounts + $data->total_user_accounts,
            'total_deposited' => $settings_data->total_deposited + $data->total_deposits,
            'total_withdraw' => $settings_data->total_withdraw + $data->total_withdrawals
        );
        $this->data = $this->include_files();
        $this->load->view('home', $this->data);
    }

    function admin() {
        if ($this->input->post()) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->login();
        }
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->load->view('admin/login', $this->data);
    }

    function register() {
        if ($this->input->post()) {
            $this->load->model('demo_auth_model');
            $result = $this->demo_auth_model->register_account();
        }
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->data = $this->include_files();
        $this->load->view('register', $this->data);
    }

    function activate_account($user_id, $token = FALSE) {
        $this->flexi_auth->activate_user($user_id, $token, TRUE);
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
        redirect('auth');
    }

    function signin() {
        if ($this->input->post()) {
            $this->load->model('demo_auth_model');
            $result = $this->demo_auth_model->login();
        }
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->data = $this->include_files();
        $this->load->view('login', $this->data);
    }

    public function aboutus() {
        $this->data = $this->include_files();
        $this->load->view('aboutus', $this->data);
    }

    public function investment() {
        $this->data = $this->include_files();
        $this->load->view('investment', $this->data);
    }

    public function affiliate() {
        $this->data = $this->include_files();
        $this->load->view('affiliate', $this->data);
    }

    public function security() {
        $this->data = $this->include_files();
        $this->load->view('security', $this->data);
    }

    public function help() {
        $this->data = $this->include_files();
        $this->load->view('help', $this->data);
    }

    function forgotten_password() {
        if ($this->input->post()) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->forgotten_password();
        }
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->data = $this->include_files();
        $this->load->view('forgotten_password', $this->data);
    }

    function manual_reset_forgotten_password($user_id = FALSE, $token = FALSE) {
        // If the 'Change Forgotten Password' form has been submitted, then update the users password.
        if ($this->input->post()) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->manual_reset_forgotten_password($user_id, $token);
        }
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->data = $this->include_files();
        $this->load->view('reset_password', $this->data);
    }

    public function contactus() {
        if ($this->input->post()) {
            $this->load->library('form_validation');
            $validation_rules = array(
                array('field' => 'email', 'label' => 'Email Address', 'rules' => 'required|valid_email'),
                array('field' => 'subject', 'label' => 'Subject', 'rules' => 'required'),
                array('field' => 'message', 'label' => 'Message', 'rules' => 'required'),
            );
            $this->form_validation->set_rules($validation_rules);
            if ($this->form_validation->run()) {

                $subject = 'bitbarrister - ' . $this->input->post('subject');
                $message = "Contact Info   \n";
                $message .= "Name  : " . $this->input->post('name') . "\n";
                $message .= "Username : " . $this->input->post('username') . "\n";
                $message .= "Email : " . $this->input->post('email') . "\n";
                $message .= "\r";
                $message .= "Message : " . $this->input->post('message');

                $headers = 'From: ' . From_Email . '' . "\r\n" .
                        'Reply-To: ' . Reply_Email . '' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                if (mail(Owner_Email, $subject, $message, $headers)) {
                    $this->session->set_flashdata('message', "Email has been sent successfully");
                } else {
                    $this->session->set_flashdata('message', "Something went wrong,please try again later");
                }
            } else {
                $this->data['message'] = validation_errors('<p class="error_msg">', '</p>');
            }
        }
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->data = $this->include_files();
        $this->load->view('contactus', $this->data);
    }

    function login() {
        // If 'Login' form has been submited, attempt to log the user in.
        if ($this->input->post('login_user')) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->login();
        }
        if ($this->flexi_auth->ip_login_attempts_exceeded()) {
            /**
             * reCAPTCHA
             * http://www.google.com/recaptcha
             * To activate reCAPTCHA, ensure the 'recaptcha()' function below is uncommented and then comment out the 'math_captcha()' function further below.
             *
             * A boolean variable can be passed to 'recaptcha()' to set whether to use SSL or not.
             * When displaying the captcha in a view, if the reCAPTCHA theme has been set to one of the template skins (See https://developers.google.com/recaptcha/docs/customization),
             *  then the 'recaptcha()' function generates all the html required.
             * If using a 'custom' reCAPTCHA theme, then the custom html must be PREPENDED to the code returned by the 'recaptcha()' function.
             * Again see https://developers.google.com/recaptcha/docs/customization for a template 'custom' html theme. 
             * 
             * Note: To use this example, you will also need to enable the recaptcha examples in 'models/demo_auth_model.php', and 'views/demo/login_view.php'.
             */
            $this->data['captcha'] = $this->flexi_auth->recaptcha(FALSE);
        }

        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->load->view('demo/login_view', $this->data);
    }

    function login_via_ajax() {
        if ($this->input->is_ajax_request()) {
            $this->load->model('demo_auth_model');

            $this->demo_auth_model->login_via_ajax();

            die($this->flexi_auth->is_logged_in());
        } else {
            $this->load->view('demo/login_via_ajax_view', $this->data);
        }
    }

    function register_account() {
        if ($this->flexi_auth->is_logged_in()) {
            redirect('auth');
        } else if ($this->input->post('register_user')) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->register_account();
        }
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        die(json_encode($this->data));
    }

    function resend_activation_token() {
        // If the 'Resend Activation Token' form has been submitted, resend the user an account activation email.
        if ($this->input->post('send_activation_token')) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->resend_activation_token();
        }

        // Get any status message that may have been set.
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];

        $this->load->view('demo/public_examples/resend_activation_token_view', $this->data);
    }

    function auto_reset_forgotten_password($user_id = FALSE, $token = FALSE) {
        $this->flexi_auth->forgotten_password_complete($user_id, $token, FALSE, TRUE);
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
        redirect('auth');
    }

    function logout() {
        $this->flexi_auth->logout(TRUE);
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
        redirect('signin');
    }

    function logout_session() {
        $this->flexi_auth->logout(FALSE);
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
        redirect('auth');
    }

    function member() {
        if ($this->flexi_auth->is_logged_in() && !$this->flexi_auth->is_admin()) {
            $this->data['dashboard_summary'] = $this->Common_model->get_summary($this->user_id);
            if ($this->input->post()) {
                $this->load->model('demo_auth_model');
                $this->demo_auth_model->change_password();
            }
            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message1') : $this->data['message'];
            $this->data = $this->include_files();
            $this->data['member_sidebar'] = $this->load->view('includes/member_sidebar', NULL, TRUE);
            $this->load->view('member_dashboard', $this->data);
        } else {
            redirect('auth');
        }
    }

    function make_deposit() {
        if ($this->flexi_auth->is_logged_in() && !$this->flexi_auth->is_admin()) {
            if ($this->input->post()) {
                $req = array(
                    'amount' => $this->input->post('amount'),
                    'currency1' => 'BTC',
                    'currency2' => 'BTC',
                    'address' => '',
                    'item_name' => 'bitbarrister',
                    'ipn_url' => '',
                );
                $result = $this->bitcoin->CreateTransaction($req);
                if ($result['error'] == 'ok') {
                    $response = $result['result'];
                    $deposits = array(
                        'user_id' => $this->user_id,
                        'plan' => $this->input->post('plan_type'),
                        'transaction_id' => $response['txn_id'],
                        'amount' => $response['amount'],
                        'address' => $response['address'],
                        'confirms_needed' => $response['confirms_needed'],
                        'status_url' => $response['status_url'],
                        'qrcode_url' => $response['qrcode_url']);
                    $added_deposit = $this->Common_model->inserted_id('deposits', $deposits);
                    $transaction_status = $this->bitcoin->GetTransactionInfo($response['txn_id']);
                    if ($added_deposit && $transaction_status['error'] == 'ok') {
                        $update_deposit = $this->Common_model->select_update('deposits', array('deposit_status' => $transaction_status['result']['status'], 'deposit_status_text' => $transaction_status['result']['status_text'], 'confirms_received' => $transaction_status['result']['recv_confirms']), array('id' => $added_deposit, 'transaction_id' => $response['txn_id'], 'user_id' => $this->user_id));
                        redirect('auth/deposit_confirmation?deposit_id=' . $added_deposit);
                    } else {
                        $this->session->set_flashdata('message', "Something went wrong, please try again later....");
                    }
                } else {
                    $this->session->set_flashdata('message', $result['error']);
                }
            }
            $this->data['plans'] = $this->Common_model->select_where('plans', array('status' => 1));
            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $this->data = $this->include_files();
            $this->data['member_sidebar'] = $this->load->view('includes/member_sidebar', NULL, TRUE);
            $this->load->view('make_deposit', $this->data);
        } else {
            redirect('auth');
        }
    }

    function deposit_confirmation() {
        if ($this->flexi_auth->is_logged_in()) {
            $deposit_id = $_GET['deposit_id'];
            $this->data['deposit_info'] = $deposit_info = $this->Common_model->select_where_row('deposits', array('id' => $deposit_id, 'user_id' => $this->user_id));
            $this->data['plan_info'] = $this->Common_model->select_where_row('plans', array('id' => $deposit_info->plan));
            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $this->data = $this->include_files();
            $this->data['member_sidebar'] = $this->load->view('includes/member_sidebar', NULL, TRUE);
            $this->load->view('deposit_confirmation', $this->data);
        } else {
            redirect('auth');
        }
    }

    function deposits() {
        if ($this->flexi_auth->is_logged_in()) {
            $plans = $this->Common_model->select_where('plans', array('status' => 1));
            $depositinfo = array();
            $total_deposit = "";
            foreach ($plans as $plan) {
                $depositinfo[$plan->id] = $this->Common_model->get_depositinfo($this->user_id, $plan->id);
                $total_deposit += array_sum(array_column($depositinfo[$plan->id], 'amount'));
            }
            $this->data['deposits'] = $depositinfo;
            $this->data['total_depisit'] = $total_deposit;
            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $this->data = $this->include_files();
            $this->data['member_sidebar'] = $this->load->view('includes/member_sidebar', NULL, TRUE);
            $this->load->view('deposits', $this->data);
        } else {
            redirect('auth');
        }
    }

    function deposit_history() {
        if ($this->flexi_auth->is_logged_in()) {
            $this->load->library('pagination');
            $config = array();
            $config["base_url"] = base_url() . "auth/deposit_history";
            $config["per_page"] = 10;
            $config['use_page_numbers'] = FALSE;

            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '&nbsp;<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = 'Previous';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $from_date = "";
            $to_date = "";
            if ($this->input->post()) {
                $this->data['from_date'] = $from_date = date('Y-m-d', strtotime($this->input->post('from_date')));
                $this->data['to_date'] = $to_date = date('Y-m-d', strtotime($this->input->post('to_date')));
            }
            $total_row = $this->Common_model->deposit_history('', '', $this->user_id, $from_date, $to_date);
            $config["total_rows"] = $total_row['counts'];
            $config['num_links'] = $total_row['counts'];
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $this->data["results"] = $this->Common_model->deposit_history($config["per_page"], $page, $this->user_id, $from_date, $to_date);
            $this->pagination->initialize($config);
            $str_links = $this->pagination->create_links();
            $this->data["links"] = explode('&nbsp;', $str_links);

            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $this->data = $this->include_files();
            $this->data['member_sidebar'] = $this->load->view('includes/member_sidebar', NULL, TRUE);
            $this->load->view('deposit_history', $this->data);
        } else {
            redirect('auth');
        }
    }

    function earninghistory() {
        if ($this->flexi_auth->is_logged_in()) {

            $this->load->library('pagination');
            $config = array();
            $config["base_url"] = base_url() . "auth/earninghistory";
            $config["per_page"] = 10;
            $config['use_page_numbers'] = FALSE;

            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '&nbsp;<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = 'Previous';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $from_date = "";
            $to_date = "";
            if ($this->input->post()) {
                $this->data['from_date'] = $from_date = date('Y-m-d', strtotime($this->input->post('from_date')));
                $this->data['to_date'] = $to_date = date('Y-m-d', strtotime($this->input->post('to_date')));
            }
            $total_row = $this->Common_model->earninghistory('', '', $this->user_id, $from_date, $to_date);
            $config["total_rows"] = $total_row['counts'];
            $config['num_links'] = $total_row['counts'];
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $this->data["results"] = $this->Common_model->earninghistory($config["per_page"], $page, $this->user_id, $from_date, $to_date);
            $this->pagination->initialize($config);
            $str_links = $this->pagination->create_links();
            $this->data["links"] = explode('&nbsp;', $str_links);


            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $this->data = $this->include_files();
            $this->data['member_sidebar'] = $this->load->view('includes/member_sidebar', NULL, TRUE);
            $this->load->view('earninghistory', $this->data);
        } else {
            redirect('auth');
        }
    }

    function withdrawfunds() {
        if ($this->flexi_auth->is_logged_in()) {
            $withdrawal_info = $this->Common_model->get_withdrawinfo($this->user_id);
            if ($this->input->post('add_investment') == 'add_investment') {
                if ($this->input->post('deposit_id') == "" || $this->input->post('investment_amount') == "") {
                    $this->data['investment_message'] = "Please select deposit and earnings amount to transfer";
                } else if ($this->input->post('investment_amount') > $this->userinfo['earnings']) {
                    $this->data['investment_message'] = "Your investment is higher than your earnings";
                } else {
                    $get_deposit = $this->Common_model->select_where_row('deposits', array('id' => $this->input->post('deposit_id')));
                    $deposit_amount = $get_deposit->amount + $this->input->post('investment_amount');
                    $this->Common_model->select_update('deposits', array('amount' => $deposit_amount), array('id' => $this->input->post('deposit_id')));
                    // Deduct from earnings
                    $user_earnings = $this->userinfo['earnings'] - $this->input->post('investment_amount');
                    $this->Common_model->select_update('user_accounts', array('earnings' => $user_earnings), array('uacc_id' => $this->user_id));
                }
            } else if ($this->input->post()) {
                $old_withdrawals = (array) $this->Common_model->select_where('withdrawals', array('withdrawal_id' => "", 'user_id' => $this->user_id));
                $total_pending_withdrawals = array_sum(array_column($old_withdrawals, 'amount'));
                $final_withdraw_limit = $withdrawal_info->total_earnings - $total_pending_withdrawals;
                if ($this->userinfo['earnings'] == 0.000000) {
                    $this->data['message'] = "You dont have any earnings.";
                } else if ($this->userinfo['earnings'] > $this->input->post('amount')) {
                    $this->data['message'] = "Withdrawal amount is higher than earnings.";
                } else {
                    $withdrawals_data = array(
                        'user_id' => $this->user_id,
                        'amount' => $this->input->post('amount'),
                        'record_status' => 0);
                    $added_withdrawal = $this->Common_model->inserted_id('withdrawals', $withdrawals_data);
                    $this->data['message'] = "Withdrawal request submitted successfully.";
                }
            }
            $this->data['deposits'] = $this->Common_model->select_where('deposits', array('user_id' => $this->user_id, 'deposit_status' => 100));
            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $this->data = $this->include_files();
            $this->data['member_sidebar'] = $this->load->view('includes/member_sidebar', NULL, TRUE);
            $this->load->view('withdrawfunds', $this->data);
        } else {
            redirect('auth');
        }
    }

    function withdrawals_history() {
        if ($this->flexi_auth->is_logged_in()) {

            $this->load->library('pagination');
            $config = array();
            $config["base_url"] = base_url() . "auth/withdrawals_history";
            $config["per_page"] = 10;
            $config['use_page_numbers'] = FALSE;

            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '&nbsp;<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = 'Previous';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $from_date = "";
            $to_date = "";
            if ($this->input->post()) {
                $this->data['from_date'] = $from_date = date('Y-m-d', strtotime($this->input->post('from_date')));
                $this->data['to_date'] = $to_date = date('Y-m-d', strtotime($this->input->post('to_date')));
            }
            $total_row = $this->Common_model->withdrawals_history('', '', $this->user_id, $from_date, $to_date);
            $config["total_rows"] = $total_row['counts'];
            $config['num_links'] = $total_row['counts'];
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $this->data["results"] = $this->Common_model->withdrawals_history($config["per_page"], $page, $this->user_id, $from_date, $to_date);
            $this->pagination->initialize($config);
            $str_links = $this->pagination->create_links();
            $this->data["links"] = explode('&nbsp;', $str_links);

            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $this->data = $this->include_files();
            $this->data['member_sidebar'] = $this->load->view('includes/member_sidebar', NULL, TRUE);
            $this->load->view('withdrawals_history', $this->data);
        } else {
            redirect('auth');
        }
    }

    function referrals() {
        if ($this->flexi_auth->is_logged_in()) {
            $this->data['reffrel_commission'] = $this->Common_model->get_reffrel_commision($this->user_id);
            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $this->data = $this->include_files();
            $this->data['member_sidebar'] = $this->load->view('includes/member_sidebar', NULL, TRUE);
            $this->load->view('referrals', $this->data);
        } else {
            redirect('auth');
        }
    }

    function promotion() {
        if ($this->flexi_auth->is_logged_in()) {
            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $this->data = $this->include_files();
            $this->data['member_sidebar'] = $this->load->view('includes/member_sidebar', NULL, TRUE);
            $this->load->view('promotion', $this->data);
        } else {
            redirect('auth');
        }
    }

    // Cronjobs
    function profit_calculation() {
        // get deposit for calculation // completed deposits
        $deposits = $this->Common_model->select_where('deposits', array('deposit_status' => 100));
        foreach ($deposits as $deposit) {
            $profit_return_data = array();
            $profit_return_data['type'] = 'Daily Profit';
            // get plan info for margin,duration count
            $planinfo = $this->Common_model->select_where_row('plans', array('id' => $deposit->plan));
            $profit_margin = $planinfo->profit_margin;
            $profit_count = ($planinfo->plan_duration != null) ? $planinfo->plan_duration + 1 : "";
            // get user balance
            $get_balances = $this->Common_model->select_where_row('user_accounts', array('uacc_id' => $deposit->user_id));
            $profit_return_data['old_balance'] = $get_balances->balance;
            $calculate_profit = ($deposit->amount * $profit_margin) / 100;
            // user balance plus daily profit
            $final_balance = $get_balances->balance + $calculate_profit;
            $profit_return_data['balance_after_profit'] = $final_balance;
            $profit_return_data['plan_id'] = $deposit->plan;
            $profit_return_data['profit'] = $calculate_profit;
            $profit_return_data['user_id'] = $deposit->user_id;
            $profit_return_data['date'] = date('Y-m-d');
            $profit_return_data['deposit_id'] = $deposit->id;
            // check for last profit count
            $check_return = $this->Common_model->get_profitinfo($deposit->id);

            //keep earning as seperate
            //user earnings plus daily profit
            $user_earnings = $get_balances->earnings + $calculate_profit;

            // if old returns found
            if (!empty($check_return)) {
                $profit_return_data['return_count'] = $check_return->return_count + 1;
            } else {
                $profit_return_data['return_count'] = 1;
            }
            if (($profit_return_data['return_count'] < $profit_count) || $profit_count == "") {
                $this->Common_model->insert('earnings', $profit_return_data);
                $this->Common_model->select_update('user_accounts', array('balance' => $final_balance, 'earnings' => $user_earnings), array('uacc_id' => $deposit->user_id));
            }
        }
    }

    function change_status() {
        $pending_deposits = $this->Common_model->select_deposits();
        $transaction_ids_array = array_column($pending_deposits, 'transaction_id');
        $transaction_ids_chunks = array_chunk($transaction_ids_array, 25, true);
        foreach ($transaction_ids_chunks as $key => $transaction_ids_chunk) {
            $transaction_ids = implode(' || ', $transaction_ids_chunk);
            $result = $this->bitcoin->GetTransactionInfoMulti($transaction_ids);
            if ($result['error'] == 'ok') {
                foreach ($result['result'] as $key => $deposit_status) {
                    $this->Common_model->select_update('deposits', array('deposit_status' => $deposit_status['status'], 'deposit_status_text' => $deposit_status['status_text'], 'confirms_received' => $deposit_status['recv_confirms']), array('transaction_id' => $key, 'address' => $deposit_status['payment_address']));
                    if ($deposit_status['status'] == 100) {
                        $find_user = $this->Common_model->select_where_row('deposits', array('transaction_id' => $key));

                        //update user balance
                        $userbalance = $this->Common_model->select_where_row('user_accounts', array('uacc_id' => $find_user->user_id));
                        $final_user_balance = $userbalance->balance + $deposit_status['amountf'];

                        //keep earning as seperate
                        $user_earnings = $userbalance->earnings + $deposit_status['amountf'];
                        $this->Common_model->select_update('user_accounts', array('balance' => $final_user_balance, 'earnings' => $user_earnings), array('uacc_id' => $find_user->user_id));
                        //Ends...
                        // check for first deposit to add reffeel commission
                        $is_first_time = $this->Common_model->select_where_row('deposits', array('deposit_status' => 100, 'user_id' => $find_user->user_id));
                        if (empty($is_first_time)) {
                            $reffrenced_user = $this->Common_model->select_where_row('user_accounts', array('uacc_id' => $find_user->user_id));
                            if ($reffrenced_user->reffered_by != null) {
                                $get_balances = $this->Common_model->select_where_row('user_accounts', array('uacc_id' => $reffrenced_user->reffered_by));
                                $profit_return_data = array();
                                $profit_return_data['type'] = 'Referral Comission';
                                $profit_return_data['old_balance'] = $get_balances->balance;
                                $calculate_profit = ($deposit_status['amountf'] * Refferal_Commission) / 100;
                                $final_balance = $get_balances->balance + $calculate_profit;

                                //keep earning as seperate
                                $user_earnings = $get_balances->earnings + $calculate_profit;

                                $profit_return_data['balance_after_profit'] = $final_balance;
                                $profit_return_data['profit'] = $calculate_profit;
                                $profit_return_data['user_id'] = $this->userinfo['reffered_by'];
                                $profit_return_data['date'] = date('Y-m-d');
                                $this->Common_model->insert('earnings', $profit_return_data);
                                $this->Common_model->select_update('user_accounts', array('balance' => $final_balance, 'earnings' => $user_earnings), array('uacc_id' => $reffrenced_user->reffered_by));
                            }
                        }
                    }
                }
            } else {
                $this->Common_model->insert('error_logs', array('table_name' => 'deposits', 'error_message' => $result['error']));
            }
        }
        $withdrawals = $this->Common_model->select_where('withdrawals', array('withdrawal_status !=' => 2));
        if (!empty($withdrawals)) {
            foreach ($withdrawals as $withdrawal) {
                $result = $this->bitcoin->get_withdrawal_info($withdrawal->withdrawal_id);
                if ($result['error'] == 'ok') {
                    //foreach ($result['result'] as $key => $withdrawal_status) {
                    //$this->Common_model->select_update('withdrawals', array('withdrawal_status' => 500, 'withdrawal_status_text' => $withdrawal_status['status_text']), array('withdrawal_id' => $withdrawal->withdrawal_id));
                    $this->db->query("UPDATE `withdrawals` SET `withdrawal_status` = '" . $result['result']['status'] . "', `withdrawal_status_text` = '" . $result['result']['status_text'] . "' WHERE `withdrawals`.`withdrawal_id` = '" . $withdrawal->withdrawal_id . "'");
                    // }
                    if ($result['result']['status'] == 2) {
                        // update the record status for admin side...
                        $this->db->query("UPDATE `withdrawals` SET `record_status` = '" . 1 . "' WHERE `withdrawals`.`withdrawal_id` = '" . $withdrawal->withdrawal_id . "'");

                        //get user
                        $get_withdrawal = $this->Common_model->select_where_row('withdrawals', array('withdrawal_id' => $withdrawal->withdrawal_id));

                        //get user balance
                        $get_user = $this->Common_model->select_where_row('user_accounts', array('uacc_id' => $get_withdrawal->user_id));
                        $old_balance = $get_user->balance;

                        $final_balance = $old_balance - $result['result']['amountf'];
                        //keep earning as seperate
                        $user_earnings = $get_user->earnings - $result['result']['amountf'];

                        //update user balance
                        $this->Common_model->select_update('user_accounts', array('balance' => $final_balance, 'earnings' => $user_earnings), array('user_id' => $get_user->uacc_id));
                    }
                } else {
                    $this->Common_model->insert('error_logs', array('table_name' => 'withdrawals', 'error_message' => $result['error']));
                }
            }
        }
    }

    function principle_back() {
        $settings = $this->Common_model->select_where_row('webisite_settings', array('id' => 1));
        $this->Common_model->select_update('webisite_settings', array('running_days' => $settings->running_days + 1), array('id' => 1));
        $this->Common_model->insert('error_logs', array('table_name' => 'add running days', 'error_message' => 'running days updated' . $deposit->user_id));
        $deposit_date = date('Y-m-d', strtotime("-45 days"));
        $deposits = $this->Common_model->get_deposit_for_princile($deposit_date);
        if (!empty($deposits)) {
            foreach ($deposits as $deposit) {
                $get_user = $this->Common_model->select_where_row('user_accounts', array('uacc_id' => $deposit->user_id));
                $user_balance = $get_user->balance + $deposit->amount;
                $user_earnings = $get_user->earnings + $deposit->amount;
                $result = $this->Common_model->select_update('user_accounts', array('balance' => $user_balance, 'earnings' => $user_earnings), array('uacc_id' => $deposit->user_id));
                if ($result) {
                    $this->Common_model->insert('error_logs', array('table_name' => 'principle_back', 'error_message' => 'principle amount is successfully added in earnings for the user ' . $deposit->user_id));
                } else {
                    $this->Common_model->insert('error_logs', array('table_name' => 'principle_back', 'error_message' => 'error in adding earnings for the user ' . $deposit->user_id));
                }
            }
        } else {
            $this->Common_model->insert('error_logs', array('table_name' => 'principle_back', 'error_message' => 'no deposits for principle back for the date of ' . date('Y-m-d')));
        }
    }

    function test() {
        $api_key = 'A1VhaN9kHEK5CFHa3UoWfQ';
        $senderid = 'EDCPAP';
        $mobile = '919998817837';
        $message = urlencode('test message');
        $url = "http://sms.tncsoftware.com/api/mt/SendSMS?APIKey=" . $api_key . "&senderid=" . $senderid . "&channel=2&DCS=0&flashsms=0&number=" . $mobile . "&text=" . $message . "&route=clickhere";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);
        var_dump($result);
    }

}
