<?php
$config['WEBSITE_TITLE'] = 'Arclight';
$config['MAX_IMG_FILE_SIZE'] = 2048;
$config['MAX_IMG_FILE_SIZE_MSG'] = 'Maximum file size allowed 2MB';
$config['CURRENCY'] = 'AED';
$config['PANEL_EMAIL'] = 'arul@arabinfotec.com'; //partner.success@creativehrc.com
$config['LOGO_PATH'] = 'assets/web/img/logo.png';
$config['REST_PASSWORD_LINK'] = 'panel/user/reset_password';
$config['ACTIVATION_LINK'] = 'panel/user/activate';
#Google reCAPTCHA
$config['SITE_KEY'] = '6LdCHEIhAAAAAAo4cxDays7-Q1ucMTM3Wbg8dOF9';
$config['SECRET_KEY'] = '6LdCHEIhAAAAAPOJ7jem1GTqpTacY7rPzCvUFDlW';


// Mail configuration
$config['MAIL'] = array(
    'FROM_NAME' => 'Arclight',
    'FROM_EMAIL' => 'arul@arabinfotec.com',     //partner.success@creativehrc.com
    'ENABLE_SMTP' => FALSE,
    'SMTP_HOST'=>'',
    'SMTP_PORT' => 587,
    'SMTP_EMAIL' => '',
    'SMTP_PASSWORD' => '',
    'SMTP_SECURE' => 'tls'
);
