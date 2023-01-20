<?php

$this->load->view('web/common/master_page');
$this->load->view('web/common/header',$active_menu);
if (!empty(trim($site_content))) {
    $this->load->view('web/' . $site_content);
}
$this->load->view('web/common/footer');
$this->load->view('web/common/script');
?>