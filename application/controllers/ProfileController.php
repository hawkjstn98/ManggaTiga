<?php


class ProfileController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $this->data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->data['staticnavbarLoggedin'] = $this->load->view('pages/subPages/staticnavbarLoggedin.php',NULL,TRUE);
        $this->data['staticnavbarUnloggedin'] = $this->load->view('pages/subPages/staticnavbarUnloggedin.php',NULL,TRUE);
        $this->data['dynamicnavbar'] = $this->load->view('pages/subPages/dynamicnavbar.php',NULL,TRUE);
        $this->data['footer'] = $this->load->view('pages/subPages/footer.php',NULL,TRUE);
    }

    public function toProfile(){
        $this->load->view("../views/pages/profile.php",$this->data);
    }

    public function renderUserData(){
        $this->load->model('UserData_model');
        $usn = $this->input->post('username');
        $udata = $this->UserData_model->renderUser($usn);
        if($udata){
            $success = true;
            $data = $udata;
        }
        else{
            $success = false;
            $data = "Data Couldn't be rendered";
        }
        echo json_encode(array(
            "success"=>$success,
            "data"=>$data
        ));
    }

    public function updateDataUser(){
        $this->load->model('UserData_model');
        $fname = $this->input->post('firstName');
        $lname = $this->input->post('lastName');
        $address = $this->input->post('address');
        $user = $this->input->post('username');
        $pfdata = $this->UserData_model->updateUser($fname, $lname, $address,$user);
        if($pfdata){
            $success = true;
            $data = $pfdata;
        }
        else{
            $success = false;
            $data = "Update Data Failed";
        }
        echo json_encode(array(
            "success"=>$success,
            "data"=>$data
        ));
    }

    public function renderTranscationData(){
        $this->load->model('UserData_model');
        $user = $this->input->post('username');
        $tsdata = $this->UserData_model->renderTransaction($user);
        $tempdata = array();
        $tempbarang = array();
        $temptrans = array();
        if($tsdata){
            $success = true;
            foreach($tsdata as $i){
                if($tempdata.count()==0){
                    $tempbarang = array(
                        "barangNama": $i->barangId;
                        "barangHarga": $i->barangHarga;
                        "barangJumlah": $i->jumlah;
                    )
                    $temptrans = array(
                        "id": $i->transactionId;
                        "waktu": $i->waktu;
                        "barang": $tempbarang;
                    )
                    $tempdata.array_push($temptrans);
                }
                $index = $tempdata.count() - 1;
                if($tempdata[$index]->transactionId == $i->transactionId){
                    $tempbarang = array(
                        "barangNama": $i->barangId;
                        "barangHarga": $i->barangHarga;
                        "barangJumlah": $i->jumlah;
                    )
                    $tempdata[$index]->barang.array_push($tempbarang);
                }
                else{
                    $tempbarang = array(
                        "barangNama": $i->barangId;
                        "barangHarga": $i->barangHarga;
                        "barangJumlah": $i->jumlah;
                    )
                    $temptrans = array(
                        "id": $i->transactionId;
                        "waktu": $i->waktu;
                        "barang": $tempbarang;
                    )
                    $tempdata.array_push($temptrans);
                }
            }
            $data = $tsdata;
        }
        else{
            $success = false;
            $data = "Data Couldn't be rendered";
        }
        echo json_encode(array(
            "success"=>$success,
            "data"=>$data
        ));
    }
}