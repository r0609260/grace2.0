   <?php

class UploadController extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function resident_upload()
        {   
                $config['upload_path']          = './upload/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $filepath=$data['upload_data']['full_path'];
                        //$nameOfPhoto=$data['upload_data']['file_name'];
                        chmod($filepath,0644);
                        $this->load->model('Event_model');
                        $this->Event_model->changeResidentPhoto();
                        redirect('caregiverController/uploadResidentPhoto');

                       // $this->load->view('upload_success', $data);
                }
            
        }
        
        public function sendMessage()
        {
            $textarea=$this->input->post('messageContent');
            $ids = $this->input->post('delete_list');
            $config['upload_path']          = './upload/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('userfile1'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $filepath=$data['upload_data']['full_path'];
                        $nameOfPhoto=$data['upload_data']['file_name'];
                        chmod($filepath,0644);
                         $this->load->model('Event_model');
                          $this->Event_model->changePersonalPhoto($nameOfPhoto);
                         
                }

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $filepath=$data['upload_data']['full_path'];
                        $nameOfPhoto=$data['upload_data']['file_name'];
                        chmod($filepath,0644);
                         $this->load->model('Event_model');
                          $this->Event_model->insertMessage($nameOfPhoto,$ids,$textarea);
                          
                           
        
        redirect('CaregiverController/addMessage');
                          
                        
                }
        }

        public function do_upload()
        {
                $config['upload_path']          = './upload/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $filepath=$data['upload_data']['full_path'];
                        chmod($filepath,0644);
                         $this->load->model('Event_model');
                          $this->Event_model->changePersonalPhoto();
                          redirect('caregiverController/getPersonalInformation');

                       // $this->load->view('upload_success', $data);
                }
        }
}
?>