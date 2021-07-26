<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require_once('/path/to/mailchimp-transactional-php/vendor/autoload.php');    `
class SuperAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($_SESSION['superadmin']['id'])) {
            redirect('super-admin');
        }
        // $this->load->library('MailChimp');
    }

    public function dashboard()
    {
        $this->data['organisation'] = $this->db->count_all("organisation");
        $this->data['plan'] = $this->db->count_all("plan");
        $this->data['plan'] = $this->db->count_all("plan");
        $total_project = count($this->common->accessrecord('project', ['*'], array(), 'result'));
        $this->data['active_project'] = count($this->common->accessrecord('plan', ['*'], array('status' => 1), 'result'));
        $this->data['inactive_project'] = count($this->common->accessrecord('plan', ['*'], array('status' => 0), 'result'));
        $percent = $total_project / 100;
        if ($percent == 0) {
            $this->data['activeprojectpercent'] = 0;
            $this->data['inactiveprojectpercent'] = 0;
        } else {
            $this->data['activeprojectpercent'] = $this->data['active_project'] / $percent;
            $this->data['inactiveprojectpercent'] = $this->data['inactive_project'] / $percent;
        }
        $this->data['invoicettl'] = count($this->common->accessrecord('payment_gateway', ['*'], array(), 'result'));
        $this->data['page'] = 'dashboard';
        $this->data['content'] = 'pages/dashboard/dashboard';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function usersList()
    {
        $this->data['organisation'] = $this->common->accessrecord('organisation', ['*'], array(), 'result');
        $this->data['page'] = 'list_users';
        $this->data['content'] = 'pages/users/list_users';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function active_user()
    {
        $id = $_POST['id'];

        // $projectManager = $this->db->get_where('project_manager', array('organization' =>$id))->get()->result();
        // $trainer = $this->db->get_where('trainer', array('organization' =>$id))->get()->result();
        // $assessor = $this->db->get_where('assessor', array('organization' =>$id))->get()->result();
        // $external_moderator = $this->db->get_where('external_moderator', array('organization' =>$id))->get()->result();
        //  $facilitator = $this->db->get_where('facilitator', array('organization' =>$id))->get()->result();
        //  $learner = $this->db->get_where('learner', array('organization' =>$id))->get()->result();
        // $moderator = $this->db->get_where('moderator', array('organization' =>$id))->get()->result();
        // if(empty($projectManager) && empty($trainer)&& empty($assessor) && empty($external_moderator)&& empty($facilitator) && empty($learner) && empty($moderator)){
        $data = array('status' => 1);

        $update = $this->db->update('organisation', $data, array('id' => $id));
        if ($update) {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 200, 'success' => true));
        } else {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 404, 'success' => false));
        }
    // }else{
       
    //     header('Content-Type: application/json');
    //     echo json_encode(array('status' => 404, 'success' => false));
    // }
    }

    public function inactive_user()
    {
        $id = $_POST['id'];
        $data = array('status' => 0);
        $update = $this->db->update('organisation', $data, array('id' => $id));
        $str = $this->db->last_query();

        echo "<pre>";
        print_r($str);
        die;
        // if ($update) {
        //     header('Content-Type: application/json');
        //     echo json_encode(array('status' => 200, 'success' => true));
        // } else {
        //     header('Content-Type: application/json');
        //     echo json_encode(array('status' => 404, 'success' => false));
        // }
    }


    public function active_bank()
    {
        $id = $_POST['id'];
        $data = array('status' => 1);
        $update = $this->db->update('bank', $data, array('id' => $id));
        if ($update) {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 200, 'success' => true));
        } else {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 404, 'success' => flase));
        }
    }

    public function inactive_bank()
    {
        $id = $_POST['id'];
        $data = array('status' => 0);
        $update = $this->db->update('bank', $data, array('id' => $id));
        if ($update) {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 200, 'success' => true));
        } else {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 404, 'success' => flase));
        }
    }

    public function delete_user()
    {


        $id = $_POST['id'];
        // print_r($id);die;
        $projectManager = $this->common->accessrecord('project_manager', ['*'], array('organization' =>$id), 'result');
        // $projectManager = $this->db->get_where('project_manager', array('organization' =>$id))->get()->result();
        $trainer = $this->common->accessrecord('trainer', ['*'], array('organization' =>$id), 'result');
        $assessor = $this->common->accessrecord('assessor', ['*'], array('organization' =>$id), 'result');
        $external_moderator = $this->common->accessrecord('external_moderator', ['*'], array('organization' =>$id), 'result');
         $facilitator = $this->common->accessrecord('facilitator', ['*'], array('organization' =>$id), 'result');
         $learner = $this->common->accessrecord('learner', ['*'], array('organization' =>$id), 'result');
        $moderator = $this->common->accessrecord('moderator', ['*'], array('organization' =>$id), 'result');
        if(empty($projectManager) && empty($trainer)&& empty($assessor) && empty($external_moderator)&& empty($facilitator) && empty($learner) && empty($moderator)){
            $delete = $this->db->delete('organisation', array('id' => $id));
            if ($delete) {
                header('Content-Type: application/json');
                echo json_encode(array('status' => 200, 'success' => true));
            } else {
                header('Content-Type: application/json');
                echo json_encode(array('status' => 404, 'success' => false));
            }
        }else{
            // echo "not deleted...";die;
            header('Content-Type: application/json');
            echo json_encode(array('status' => 404, 'success' => false));
        }


      
    }

    public function userDetail()
    {
        $this->data['page'] = 'user_detail';
        $this->data['content'] = 'pages/users/user_detail';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function updateProfile()
    {
        if (empty($_POST)) {
            $this->data['page'] = 'update_profile';
            $this->data['content'] = 'pages/users/update_profile';
            $this->load->view('super-admin/tamplate', $this->data);
        } else {
        }
    }

    public function editUser()
    {
        $this->data['page'] = 'edit_user';
        $this->data['content'] = 'pages/users/edit_user';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function plan()
    {
        $this->data['plan'] = $this->db->get('plan')->result();
        $this->data['page'] = 'plan';
        $this->data['content'] = 'pages/plans/plan';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function planList()
    {
        $this->data['coupon'] = $this->common->accessrecord('plan', ['*'], array(), 'result');
        $this->data['page'] = 'list_plans';
        $this->data['content'] = 'pages/plans/list_plans';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    private function singlefileupload($image, $path, $allowed_types)
    {
        $config['upload_path']          = $path;
        $config['allowed_types']        = $allowed_types;
        $config['encrypt_name']         = TRUE;
        $config['remove_spaces']        = TRUE;
        $config['detect_mime']          = TRUE;
        $config['overwrite']            = TRUE;
        $config['file_ext_tolower']     = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($image)) {
            echo  $this->upload->display_errors();
            die;
        } else {
            $data = $this->upload->data();
            $name = $data['file_name'];
            return $name;
        }
    }

    public function ourCustomersLogo()
    {
        $this->load->helper('file');
        $this->load->library('form_validation');
        if ($this->input->post()) {
            if (empty($_FILES['Customerslogo']['name'])) {
                $this->form_validation->set_rules('Customerslogo', 'File', 'required');
                if ($this->form_validation->run() == FALSE) {

                    $this->form_validation->set_message('Customerslogo', 'Please choose a file to upload.');
                    $this->data['page'] = 'slider';
                    $this->data['content'] = 'pages/setting/ourCustomersLogo/ourCustomersLogo';
                    $this->load->view('super-admin/tamplate', $this->data);
                }
            } else {

                $logo = $this->singlefileupload('Customerslogo', './uploads/OurCustomersLogo/', 'gif|jpg|png');
                $post_data['logo'] =  $logo;
                $datau = $this->common->insertData('ourCustomerLogo', $post_data);
                $this->session->set_flashdata('success', 'File has been uploaded successfully.');
                redirect('superAdmin-our-customer-logo-list');
            }
        } else {
            $this->data['page'] = 'ourCustomersLogoList';
            $this->data['content'] = 'pages/setting/ourCustomersLogo/ourCustomersLogo';
            $this->load->view('super-admin/tamplate', $this->data);
        }
    }

    public function ourCustomersLogoList()
    {
        $this->data['logo'] = $this->common->accessrecord('ourCustomerLogo', ['*'], array(), 'result');
        $this->data['page'] = 'ourCustomersLogoList';
        $this->data['content'] = 'pages/setting/ourCustomersLogo/ourCustomersLogoList';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function delete_logo()
    {
        $id = $_POST['id'];
        $delete = $this->db->delete('ourCustomerLogo', array('id' => $id));
        if ($delete) {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 200, 'success' => true));
        } else {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 404, 'success' => flase));
        }
    }


    public function addPlan()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required', array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('price', 'Price', 'required', array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('duration', 'Duration', 'required', array('required' => 'You must provide a %s.'));
            if ($this->form_validation->run() == FALSE) {
                $this->data['page'] = 'add_plan';
                $this->data['content'] = 'pages/plans/add_plan';
                $this->load->view('super-admin/tamplate', $this->data);
            } else {
                if (!empty($_FILES['planlogo']['name'])) {

                    $planlogo = $this->singlefileupload('planlogo', './uploads/planLogo/', 'gif|jpg|png');
                }

                $feature = $this->input->post('feature');
                $feature = implode('%@#$', $feature);
                $post_data['name'] = $this->input->post('name');
                $post_data['price'] = $this->input->post('price');
                $post_data['duration'] = $this->input->post('duration');
                $post_data['logo'] =  $planlogo;
                $post_data['feature'] =  $feature;
                $post_data['manage_project_value'] = $this->input->post('manage_project_value');
                $datau = $this->common->insertData('plan', $post_data);
                $this->session->set_flashdata('success', 'Your Data Successfully Add');
                redirect('superAdmin-planList');
            }
        } else {
            $this->data['page'] = 'add_plan';
            $this->data['content'] = 'pages/plans/add_plan';
            $this->load->view('super-admin/tamplate', $this->data);
        }
    }



    public function editPlan($id)
    {
        $query = $this->db->where('id', $id)->get('plan');
        $this->data['plan'] = $query->result();
        $this->data['page'] = 'edit_plan';
        $this->data['content'] = 'pages/plans/edit_plan';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function updatePlan()
    {
        // print_r("ok");die;
        $this->form_validation->set_rules('name', 'Name', 'required', array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('price', 'Price', 'required', array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('duration', 'Duration', 'required', array('required' => 'You must provide a %s.'));

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('planid');
            $query = $this->db->where('id', $id)->get('plan');
            $this->data['plan'] = $query->result();
            $this->data['page'] = 'edit_plan';
            $this->data['content'] = 'pages/plans/edit_plan';
            $this->load->view('super-admin/tamplate', $this->data);
        } else {

            if (!empty($_FILES['planlogo']['name'])) {
                $planlogo = $this->singlefileupload('planlogo', './uploads/planLogo/', 'gif|jpg|png');
            } else {

                $planlogo = $this->input->post('img');
            }

            $planid = $this->input->post('planid');
            $feature = $this->input->post('feature');
            $feature = implode('%@#$', $feature);

            $data = array(
                'name' => $this->input->post('name'),
                'duration' => $this->input->post('duration'),
                'logo' => $planlogo,
                'price' => $this->input->post('price'),
                'feature' => $feature,
                'manage_project_value' => $this->input->post('manage_project_value'),
                'pricediscount' => $this->input->post('pricediscount'),
            );

            $this->db->where('id', $planid);
            $this->db->update('plan', $data);

            $this->session->set_flashdata('success', 'Your Plan Update Successfully');
            redirect('superAdmin-plan');
        }
    }



    public function orderList()
    {
        $this->data['organisation'] = $this->common->accessrecord('organisation', ['*'], array(), 'result');
        $this->data['page'] = 'list_order';
        $this->data['content'] = 'pages/orders/list_order';
        $this->load->view('super-admin/tamplate', $this->data);
    }



    public function addCoupon()
    {
        if ($this->input->post()) {
            //print_r($this->input->post());             
            $this->form_validation->set_rules(
                'name',
                'Name',
                'required',
                array('required' => 'You must provide a %s.')
            );
            $this->form_validation->set_rules(
                'code',
                'Code',
                'required',
                array('required' => 'You must provide a %s.')
            );
            $this->form_validation->set_rules(
                'limits',
                '',
                'required',
                array('required' => 'You must provide a %s.')
            );
            $this->form_validation->set_rules(
                'discount',
                'Discount',
                'required',
                array('required' => 'You must provide a %s.')
            );
            if ($this->form_validation->run() == FALSE) {
                //echo "dd";die;
                $this->data['page'] = 'add_coupon';
                $this->data['content'] = 'pages/coupon/add_coupon';
                $this->load->view('super-admin/tamplate', $this->data);
            } else {
                $post_data['name'] = $this->input->post('name');
                $post_data['limits'] = $this->input->post('limits');
                $post_data['discount'] = $this->input->post('discount');
                $post_data['code'] = $this->input->post('code');
                $datau = $this->common->insertData('coupon', $post_data);
                $this->session->set_flashdata('success', 'Your Password Successfully Update');
                redirect('superAdmin-couponList');
            }
        } else {
            $this->data['page'] = 'add_coupon';
            $this->data['content'] = 'pages/coupon/add_coupon';
            $this->load->view('super-admin/tamplate', $this->data);
        }
    }

    public function editCoupon()
    {
        $this->data['page'] = 'edit_coupon';
        $this->data['content'] = 'pages/coupon/edit_coupon';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function couponList()
    {
        $this->data['coupon'] = $this->common->accessrecord('coupon', ['*'], array(), 'result');
        $this->data['page'] = 'list_coupon';
        $this->data['content'] = 'pages/coupon/list_coupon';
        $this->load->view('super-admin/tamplate', $this->data);
    }


    public function sendMassage()
    {
        if (empty($_POST)) {
            $this->data['received'] = $this->common->accessrecord('message', ['*'], ['receiver_type' => 'superadmin'], 'result');
            $this->data['organisation'] = $this->common->accessrecord('organisation', ['*'], array(), 'result');
            $this->data['page'] = 'send_massage';
            $this->data['content'] = 'pages/massage/send_massage';
            $this->load->view('super-admin/tamplate', $this->data);
        } else {

            $receiverarr = $_POST['receiver'];
            $receiver = implode(",", $receiverarr);

            if (!empty($_FILES['attachment']['name'])) {

                $attachment = $this->singlefileupload('attachment', './uploads/messageattachment/', 'gif|jpg|png|pdf|doc|docx');
            } else {
                $attachment = "";
            }
            $data = array(
                'sender_id' => 'superadmin',
                'sender_type' => 'superadmin',
                'receiver_id' => $receiver,
                'receiver_type' => 'organization',
                'subject' => $_POST['subject'],
                'message' => $_POST['message'],
                'attachment' => $attachment
            );
            $datau = $this->common->insertData('message', $data);
            $this->session->set_flashdata('success', 'Message Sent Successfully');
            redirect('superAdmin-sentbox');
        }
    }

    public function sendbulkEmails()
    {
        if (empty($_POST)) {
            $this->data['organisation'] = $this->common->accessrecord('organisation', ['*'], array(), 'result');

            $this->data['page'] = 'bulk_email';
            $this->data['content'] = 'pages/bulk/bulk_email';
            $this->load->view('super-admin/tamplate', $this->data);
        } else {
            $email = $this->input->post('receiver');
            $dataorganisation = $this->common->accessrecord('organisation', ['*'], array('email_address' => $email), 'row');
            $fname = $dataorganisation->fullname;
            $lname = $dataorganisation->surname;

            $this->load->library('MailChimp');
            $list_id = '1b95025a50';
            $result = $this->mailchimp->post("lists/$list_id/members", [
                'email_address' => $email,
                'merge_fields' => ['FNAME' => $fname, 'LNAME' => $lname],
                'status'        => 'subscribed',
            ]);
            if ($result['status'] == 400) {
                $this->session->set_flashdata('error', $result['title']);
                redirect('superAdmin-sendBulkEmails');
            } else {
                $this->session->set_flashdata('success', 'Mail Send Successfully');
                redirect('superAdmin-sendBulkEmails');
            }
        }
    }
    public function bulk()
    {
        $this->load->library('MailChimp');
        $list_id = '1b95025a50';
        $result = $this->mailchimp->post("lists/$list_id/members", [
            'email_address' => 'slash.bhagyashree20@gmail.com',
            'merge_fields' => ['FNAME' => 'bhagyashree', 'LNAME' => 'slash'],
            'status'        => 'subscribed',
        ]);
        echo "<pre>";
        print_r($result);
        die;
    }

    public function sendBulkMessage()
    {
        $this->data['organisation'] = $this->common->accessrecord('organisation', ['*'], array(), 'result');

        if (empty($_POST)) {
            $this->data['page'] = 'bulk_message';
            $this->data['content'] = 'pages/bulk/bulk_message';
            $this->load->view('super-admin/tamplate', $this->data);
        } else {



            // []
            $username = 'TutuMolomo123';
            $password = 'NosiphoMolomo1974';

            $messages = array(
                'to' => $_POST['receiver'],
                'body' => $_POST['message']
            );
            // print_r(json_encode($messages)); die();

            $result = $this->send_message(json_encode($messages), 'https://api.bulksms.com/v1/messages?auto-unicode=true&longMessageMaxParts=30', $username, $password);

            if ($result['http_status'] != 201) {
                $sendmsg =  "Error sending: " . ($result['error'] ? $result['error'] : "HTTP status " . $result['http_status'] . "; Response was " . $result['server_response']);
                $this->session->set_flashdata('error', "$sendmsg");
                redirect('superAdmin-sendBulkMassage');
            } else {
                $this->session->set_flashdata('success', "Messages sent Successfully");
                redirect('superAdmin-sendBulkMassage');
            }
        }
    }

    function send_message($post_body, $url, $username, $password)
    {
        $ch = curl_init();
        $headers = array(
            'Content-Type:application/json',
            'Authorization:Basic ' . base64_encode("$username:$password")
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
        // Allow cUrl functions 20 seconds to execute
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        // Wait 10 seconds while trying to connect
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $output = array();
        $output['server_response'] = curl_exec($ch);
        $curl_info = curl_getinfo($ch);
        $output['http_status'] = $curl_info['http_code'];
        $output['error'] = curl_error($ch);
        curl_close($ch);
        return $output;
    }

    public function inbox()
    {
        $this->data['received'] = $this->common->accessrecord('message', ['*'], ['receiver_type' => 'superadmin'], 'result');
        $this->data['page'] = 'received_massage';
        $this->data['content'] = 'pages/massage/received_messages';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function sentbox()
    {
        $this->data['sent'] = $this->common->accessrecord('message', ['*'], ['sender_type' => 'superadmin'], 'result');
        $this->data['page'] = 'sent_massage';
        $this->data['content'] = 'pages/massage/sent_massage';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function sentboxview($id)
    {
        $this->data['viewsent'] = $this->common->accessrecord('message', ['*'], ['id' => $id], 'row');
        $this->data['page'] = 'sentboxview';
        $this->data['content'] = 'pages/massage/sentboxview';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function inboxview($id)
    {
        $this->data['viewreceived'] = $this->common->accessrecord('message', ['*'], ['id' => $id], 'row');
        $this->data['page'] = 'inboxview';
        $this->data['content'] = 'pages/massage/inboxview';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    // public function trash()
    // {
    //     $this->data['sent'] = $this->common->accessrecord('message', ['*'], ['sender_type' => 'superadmin'], 'result');
    //     $this->data['page'] = 'sent_massage';
    //     $this->data['content'] = 'pages/massage/sent_massage';
    //     $this->load->view('super-admin/tamplate', $this->data);
    // }

    // public function important()
    // {
    //     $this->data['important'] = $this->common->accessrecord('message', ['*'], ['sender_type' => 'superadmin'], 'result');
    //     $this->data['page'] = 'important_massage';
    //     $this->data['content'] = 'pages/massage/important';
    //     $this->load->view('super-admin/tamplate', $this->data);
    // }

    public function couponDetail()
    {
        $this->data['page'] = 'coupon_detail';
        $this->data['content'] = 'pages/coupon/coupon_detail';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function addPayment()
    {
        $this->data['page'] = 'add_payment';
        $this->data['content'] = 'pages/payment/add_payment';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function paymentList()
    {
        $this->data['page'] = 'list_payment';
        $this->data['content'] = 'pages/payment/list_payment';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function paypal()
    {
        $this->data['page'] = 'paypal';
        $this->data['content'] = 'pages/payment/paypal';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function skrills()
    {
        $this->data['page'] = 'skrills';
        $this->data['content'] = 'pages/payment/skrills';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function payment_gateway()
    {
        $this->data['page'] = 'payment_gateway';
        $this->data['content'] = 'pages/payment/payment_gateway';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function slider()
    {
        $this->data['page'] = 'slider';
        $this->data['content'] = 'pages/setting/slider/slider';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function logo()
    {
        $this->data['page'] = 'slider';
        $this->data['content'] = 'pages/setting/logo/logo';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function blog()
    {
        $this->data['page'] = 'slider';
        $this->data['content'] = 'pages/setting/blog/blog';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function addEmail()
    {
        $this->data['page'] = 'add_email';
        $this->data['content'] = 'pages/email/add_email';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function emailList()
    {
        $this->data['page'] = 'list_email';
        $this->data['content'] = 'pages/email/list_email';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function ticketList()
    {
        $this->data['contactus'] = $this->common->accessrecord('contactus', ['*'], array(), 'result');
        $this->data['page'] = 'list_ticket';
        $this->data['content'] = 'pages/tickets/list_ticket';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function leadList()
    {
        $this->data['page'] = 'list_lead';
        $this->data['content'] = 'pages/leads/list_lead';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function invoiceList()
    {
        $this->data['invoice_list'] = $this->common->accessrecord('payment_gateway', ['*'], array(), 'result');
        $this->data['page'] = 'list_invoice';
        $this->data['content'] = 'pages/invoice/list_invoice';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function invoiceDetails()
    {
        $this->data['page'] = 'detail_invoice';
        $this->data['content'] = 'pages/invoice/invoice_detail';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function payment_history()
    {
        $this->data['page'] = 'payment_history';
        $this->data['content'] = 'pages/report/payment_history';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function order_history()
    {
        $this->data['page'] = 'order_history';
        $this->data['content'] = 'pages/report/order_history';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function paid_and_free_user()
    {
        $this->data['organisation'] = $this->common->accessrecord('organisation', ['*'], array(), 'result');
        $this->data['page'] = 'paid_and_free_user';
        $this->data['content'] = 'pages/report/paid_and_free_user';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function add_bank()
    {
        if (!empty($_POST)) {
            // print_r($_POST); die;
            $this->form_validation->set_rules('bankname', 'BANK NAME', 'required', array('required' => 'You must provide a %s.'));

            if ($this->form_validation->run() == FALSE) {

                $this->data['page'] = 'add_bank';
                $this->data['content'] = 'pages/bank/add_bank';
                $this->load->view('super-admin/tamplate', $this->data);
            } else {
                $data = array(
                    'bank_name' => $this->input->post('bankname'),
                    'status' => 1
                );


                $datau = $this->common->insertData('bank', $data);
                $this->session->set_flashdata('success', 'Your Bank Added Successfully');
                redirect('superAdmin-banklist');
            }
        } else {
            $this->data['page'] = 'add_bank';
            $this->data['content'] = 'pages/bank/add_bank';
            $this->load->view('super-admin/tamplate', $this->data);
        }
    }

    public function banklist()
    {
        $this->data['banklist'] = $this->common->accessrecord('bank', [], [], 'result');
        $this->data['page'] = 'list_bank';
        $this->data['content'] = 'pages/bank/list_bank';
        $this->load->view('super-admin/tamplate', $this->data);
    }


    public function create_province()
    {
        $id = 0;
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $this->data['record'] = $this->common->accessrecord('province', [], ['id' => $id], 'row');
        }
        if ($_POST) {
            $this->form_validation->set_rules('name', 'Province Name', 'required', array('required' => 'You must provide a %s.'));

            if ($this->form_validation->run() == FALSE) {
            } else {
                if ($id != 0) {
                    $this->common->updateData('province', $_POST, ['id' => $id]);
                    $this->session->set_flashdata('success', 'Province Name Updated Succesfully');
                    redirect('create_province');
                } else {
                    $data = array(
                        'name' =>  $this->input->post('name'),
                    );
                    $this->common->insertData('province', $data);
                    $this->session->set_flashdata('success', 'Province Name added Successfully');
                }
            }
        }

        $this->data['province'] = $this->common->accessrecord('province', [], [], 'result');
        $this->data['page'] = 'create_province';
        $this->data['content'] = 'pages/location/create_province';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function create_district()
    {
        $id = 0;
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $this->data['record'] = $this->common->one_District($id);
        }
        if ($_POST) {
            $this->form_validation->set_rules('province_id', 'Province Name', 'required', array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('name', 'District Name', 'required', array('required' => 'You must provide a %s.'));
            if ($this->form_validation->run() == FALSE) {
                $this->data['District'] = $this->common->get_District();
                $this->data['province'] = $this->common->get_province();
                $this->data['page'] = 'create_district';
                $this->data['content'] = 'pages/location/create_district';
                $this->load->view('super-admin/tamplate', $this->data);
            } else {
                $data = array(
                    'province_id' => $this->input->post('province_id'),
                    'name' => $this->input->post('name'),
                );
                if ($id != 0) {
                    $this->common->update_district($id, $data);
                    $this->session->set_flashdata('success', 'District Updated Succesfully');
                    redirect('create_district');
                } else {
                    $this->common->insertDistrict($data);
                    $this->session->set_flashdata('success', 'District Added Successfully');
                    redirect('create_district');
                }
            }
        } else {
            //  get all data from province table :- 25-11-19
            $this->data['District'] = $this->common->get_District();
            $this->data['province'] = $this->common->get_province();
            $this->data['page'] = 'create_district';
            $this->data['content'] = 'pages/location/create_district';
            $this->load->view('super-admin/tamplate', $this->data);
        }
    }

    // public function create_region()
    // {
    //     $id = 0;
    //     if (!empty($_GET['id'])) {
    //         $id = $_GET['id'];
    //         $this->data['record'] = $this->common->one_region($id);
    //     }
    //     if ($_POST) {
    //         $this->form_validation->set_rules('province', 'Province Name', 'required', array('required' => 'You must provide a %s.'));
    //         $this->form_validation->set_rules('District', 'District Name', 'required', array('required' => 'You must provide a %s.'));
    //         $this->form_validation->set_rules('region', 'Region Name', 'required', array('required' => 'You must provide a %s.'));
    //         if ($this->form_validation->run() == FALSE) {
    //             $this->data['District'] = $this->common->get_District();
    //             $this->data['province'] = $this->common->get_province();
    //             $this->data['region'] = $this->common->get_region();

    //             $this->data['page'] = 'create_region';
    //             $this->data['content'] = 'pages/location/create_region';
    //             $this->load->view('super-admin/tamplate', $this->data);
    //         } else {
    //             if ($id != 0) {
    //                 $data = $_POST;
    //                 $this->common->update_region($id, $data);
    //                 $this->session->set_flashdata('success', 'Region Updated Succesfully');
    //                 redirect('create_region');
    //             } else {

    //                 $District = $this->common->one_District($this->input->post('District'));
    //                 $district_id = $District->name;
    //                 $data = array(
    //                     'district_id' => $district_id,
    //                     'province_id' => $this->input->post('province'),
    //                     'region' => $this->input->post('region'),

    //                 );
    //                 $this->common->insertregion($data);
    //                 $this->session->set_flashdata('success', 'Region Added Successfully');
    //                 redirect('create_region');
    //             }
    //         }
    //     } else {

    //         $this->data['District'] = $this->common->get_District();
    //         $this->data['province'] = $this->common->get_province();
    //         $this->data['region'] = $this->common->get_region();

    //         $this->data['page'] = 'create_region';
    //         $this->data['content'] = 'pages/location/create_region';
    //         $this->load->view('super-admin/tamplate', $this->data);
    //     }
    // }

    public function create_city()
    {
        $id = 0;
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $this->data['record'] = $this->common->one_city($id);
        }
        if ($_POST) {
            if ($id != 0) {
                $data = $_POST;
                $this->common->update_city($id, $data);
                $this->session->set_flashdata('success', 'City Name Updated Succesfully');
                redirect('create_city');
            } else {
                $District = $this->common->one_District($this->input->post('District'));
                $district_id = $District->name;
                // $region = $this->common->one_region($this->input->post('region'));
                // $region_id = $region->region;
                $data = array(
                    'district_id' => $district_id,
                    'province_id' => $this->input->post('province'),
                    // 'region_id' => $region_id,
                    'city' => $this->input->post('city')
                );
                $this->common->insertcity($data);
                $this->session->set_flashdata('success', 'City Name Added successfully');
                redirect('create_city');
            }
        } else {
            $this->data['District'] = $this->common->get_District();
            $this->data['province'] = $this->common->get_province();
            // $this->data['region'] = $this->common->get_region();
            $this->data['city'] = $this->common->get_city();
            $this->data['page'] = 'create_city';
            $this->data['content'] = 'pages/location/create_city';
            $this->load->view('super-admin/tamplate', $this->data);
        }
    }

    public function create_municipality()
    {
        if ($_POST) {
            extract($_POST);
            $District = $this->common->one_District($this->input->post('District'));
            $district_id = $District->name;
            // $region = $this->common->one_region($this->input->post('region'));
            // $region_id = $region->region;
            $city = $this->common->one_city($this->input->post('city_id'));
            $cityid = $city->city;
            $data = array(
                'province_id' => $province,
                'district_id' => $district_id,
                // 'region_id' => $region_id,
                'city_id' => $cityid,
                'municipality' => $municipality
            );
            $datau = $this->common->insertData('municipality', $data);
            $this->session->set_flashdata('success', 'Municipality Created Successfully');
            redirect('create_municipality');
        } else {
            $this->data['municipality'] = $this->common->accessrecord('municipality', [], [], 'result');
            $this->data['province'] = $this->common->get_province();
            $this->data['page'] = 'create_municipality';
            $this->data['content'] = 'pages/location/create_municipality';
            $this->load->view('super-admin/tamplate', $this->data);
        }
    }


    public function get_destrict()
    {
        $data = $_POST;
        $DistrictData = $this->common->get_District_province($data);
        if (!empty($DistrictData)) {
            $District = $DistrictData;
        } else {
            $District = array('error' => 'Destrict list not available in this province');
        }
        echo json_encode($District);
    }

    // public function get_region()
    // {
    //     $District = $this->common->one_District($this->input->post('value'));
    //     $district_id = $District->name;
    //     $regiondata = $this->common->get_region_District($district_id);
    //     if (!empty($regiondata)) {
    //         $region = $regiondata;
    //     } else {
    //         $region = array('error' => 'Region list not available in this destrict');
    //     }
    //     echo json_encode($region);
    // }

    public function get_city()
    {
        $District = $this->common->one_District($this->input->post('value'));
        $district_id = $District->name;
        $citydata = $this->common->get_district_city($district_id);
        if (!empty($citydata)) {
            $city_data = $citydata;
        } else {
            $city_data = array('error' => 'City list not available in this region');
        }
        echo json_encode($city_data);
    }

    // function deletedataRegion()
    // {

    //     if (!empty($_GET['data'])) {

    //         if ($this->common->accessrecord('district', [], ['name' => $_GET['data']], 'row')) {

    //             echo json_encode(array('error' => "error"));
    //         } else {

    //             $this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

    //             echo json_encode(array('status' => 'true'));
    //         }
    //     }
    // }

    function deleterecordProvince()
    {

        if (!empty($_GET['data'])) {


            if ($this->common->accessrecord('organisation', [], ['province' => $_GET['data']], 'row')) {

                echo json_encode(array('error' => "error"));
            } else {

                $this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

                echo json_encode(array('status' => 'true'));
            }
        }
    }

    function deletedataDistrict()
    {

        if (!empty($_GET['data'])) {

            if ($this->common->accessrecord('region', [], ['district_id' => $_GET['data']], 'row')) {

                echo json_encode(array('error' => "error"));
            } else {

                $this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

                echo json_encode(array('status' => 'true'));
            }
        }
    }

    function deletedataCity()
    {

        if (!empty($_GET['data'])) {

            // if ($this->common->accessrecord('region', [], ['region' => $_GET['data']], 'row')) {

            // 	echo json_encode(array('error' => "error"));
            // } else {

            $this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

            echo json_encode(array('status' => 'true'));
            // }
        }
    }

    public function profile()
    {
        $this->data['page'] = 'proflie';
        $this->data['content'] = 'pages/profile/profile';
        $this->load->view('super-admin/tamplate', $this->data);
    }

    public function editProfile()
    {
        if (empty($_POST)) {
            $this->data['page'] = 'editProfile';
            $this->data['content'] = 'pages/profile/edit_profile';
            $this->load->view('super-admin/tamplate', $this->data);
        } else {
            if (!empty($this->input->post('name'))) {
                $data['name'] = $this->input->post('name');
            }
            if (!empty($this->input->post('email'))) {
                $data['email_address'] = $this->input->post('email');
            }
            if (!empty($this->input->post('mobile'))) {
                $data['mobile_number'] = $this->input->post('mobile');
            }
            if (!empty($_FILES['profile']['name'])) {
                $data['profile_image'] = $this->singlefileupload('profile', './uploads/sadminprofile', 'jpg|png|jpeg');
            }
            // print_r($_FILES); die();
            if ($this->common->updateData('master_admin', $data, array('id' => 1))) {
                $this->session->set_flashdata('success', 'Your Profile Updated Successfully');
                redirect('superAdmin-dashboard');
            } else {
                $this->session->set_flashdata('error', 'Please Try Again');
                redirect('superadmin-editprofile');
            }
        }
    }

    public function changepassword()
    {
        if (empty($_POST)) {
            $this->data['page'] = 'changepassword';
            $this->data['content'] = 'pages/profile/changepassword';
            $this->load->view('super-admin/tamplate', $this->data);
        } else {
            $id = $_SESSION['superadmin']['id'];

            $oldpassword = sha1($this->input->post('oldpassword'));

            $password = $this->input->post('password');

            $datau = $this->common->accessrecord('master_admin', ['id, password'], array('id' => $id), 'row');

            if ($datau->password == $oldpassword) {

                $this->common->updateData('master_admin', array('password' => sha1($password)), array('id' => $id));

                $this->session->set_flashdata('success', 'Your Password Successfully Update');

                redirect('superadmin-changepassword');
            } else {

                $this->session->set_flashdata('error', 'Your Old Password Not Matched');
                redirect('superadmin-changepassword');
            }
        }
    }

    public function logout()
    {

        $this->session->unset_userdata("superadmin");

        $this->session->sess_destroy();

        redirect('super-admin');
    }
}
