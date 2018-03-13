<?php

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
 start session and include form class
 ============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/Form.php';

/* =============================================
 validation if posted
 ============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('employment-application-form') === true) {
    
    // create validator & auto-validate required fields
    $validator = Form::validate('employment-application-form');
    
    // additional validation
    $validator->email()->validate('user-email');
    
    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['employment-application-form'] = $validator->getAllErrors();
    } else {
        $attachments = [];
        $path = rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/images/uploads/';
        if (isset($_POST['uploaded-images'])) {
            for ($i=0; $i < count($_POST['uploaded-images']); $i++) {
                $attachments[] = $path . $_POST['uploaded-images'][$i];
            }
        }
        $email_config = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Employment Application Form',
            'attachments'    => implode(',', $attachments),
            'filter_values'   => 'employment-application-form'
        );
        $sent_message = Form::sendMail($email_config);
        Form::clear('employment-application-form');
    }
}

/* ==================================================
 The Form
 ================================================== */

$form = new Form('employment-application-form', 'horizontal', 'novalidate');
$form->startFieldset('Employment Application Form');
$form->addHtml('<p class="lead">Please fill-in this form to get in touch with us</p>');
$form->addOption('position-applying-for', '', 'Choose one ...', '', 'disabled, selected');
$form->addOption('position-applying-for', 'Interface Designer', 'Interface Designer');
$form->addOption('position-applying-for', 'Software Engineer', 'Software Engineer');
$form->addOption('position-applying-for', 'System Administrator', 'System Administrator');
$form->addOption('position-applying-for', 'Office Manager', 'Office Manager');
$form->addSelect('position-applying-for', 'Which position are you applying for ?', 'class=selectpicker, data-width=100%, required');
$form->addRadio('relocate', 'Yes', 'Yes');
$form->addRadio('relocate', 'No', 'No');
$form->printRadioGroup('relocate', 'Are you willing to relocate ?', true, 'required');
$form->addPlugin('pickadate', '#start-date');
$form->addInput('text', 'start-date', '', 'When can you start ?', 'required');
$form->addIcon('salary-requirements', '<i class="fa fa-usd" aria-hidden="true"></i>', 'after');
$form->addInput('text', 'salary-requirements', '', 'Salary Requirements', 'data-fv-integer');
$form->endFieldset();
$form->addHtml('<p>&nbsp;</p>');

// Portfolio
$form->startFieldset('Your Portfolio');
$fileUpload_config = array(
    'xml'                 => 'images-with-captions',
    'uploader'            => 'imageFileUpload.php',
    'btn-text'            => 'Browse ...',
    'max-number-of-files' => 3
);
$form->addHelper('3 files max. Accepted File Types : .jp[e]g, .png, .gif', 'uploaded-images');
$form->addFileUpload('file', 'uploaded-images[]', '', 'Upload up to 3 images', '', $fileUpload_config);
$form->addInput('text', 'portfolio-web-site', '', 'Portfolio Web Site', 'placeholder=http://, required, data-fv-uri');
$form->endFieldset();
$form->addHtml('<p>&nbsp;</p>');

// Contact Information
$form->startFieldset('Your Contact Information');
$form->setCols(3, 4);
$form->groupInputs('user-first-name', 'user-last-name');
$form->addHelper('First Name', 'user-first-name');
$form->addInput('text', 'user-first-name', '', 'Your Name', 'required');
$form->setCols(0, 5);
$form->addHelper('Last Name', 'user-last-name');
$form->addInput('text', 'user-last-name', '', '', 'required');
$form->setCols(3, 9);
$form->addInput('email', 'user-email', '', 'Your E-mail', '');
$form->addBtn('submit', 'submit-btn', 1, 'Send', 'class=btn btn-primary');
$form->endFieldset();

// Custom radio & checkbox css
$form->addPlugin('nice-check', 'form', 'default', ['%skin%' => 'yellow']);

// jQuery validation
$form->addPlugin('formvalidation', '#employment-application-form');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Employment Application Form - Php Form Builder</title>
    <meta name="description" content="Bootstrap Form Generator - how to create an Employment Application Form with Php Form Builder Class">
        <!-- Change the link to bootstrap.min.css according to your directory structure -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" media="screen">
    <?php $form->printIncludes('css'); ?>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
    <h1 class="text-center">Php Form Builder - Employment Application Form<br><small>with File uploader &amp; date picker</small></h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
            <?php
            if (isset($sent_message)) {
                echo $sent_message;
            }
            $form->render();
            ?>
            </div>
        </div>
    </div>
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <?php
            $form->printIncludes('js');
            $form->printJsCode();
        ?>
</body>
</html>
 