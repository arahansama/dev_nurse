<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../themes/material/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../themes/material/dist/css/material-dashboard.css?v=1.2.1" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../themes/material/dist/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="off-canvas-sidebar">
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=Url::to(['site/index']);?>">NURSE5DATACENTER</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?=Url::to(['site/index']);?>">
                            <i class="material-icons">dashboard</i> Dashboard
                        </a>
                    </li>
                   
                    <li class="">
                        <a href="<?=Url::to(['/user/security/login']);?>">
                            <i class="material-icons">fingerprint</i> Login
                        </a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page register-page" filter-color="black" data-image="../themes/material/dist/img/register.jpeg">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="card card-signup">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'id')->hiddenInput()->label(false); ?>
        <?= $form->field($model, 'CID')->hiddenInput()->label(false); ?>
        <?= $form->field($model, 'created_at')->hiddenInput()->label(false); ?>
        <?= $form->field($model, 'confirmed_at')->hiddenInput(['value'=>$confirmed_at])->label(false);//hiddenInput ?>                    

                            <h3 class="card-title text-center">ระบบยืนยันตัวบุคคลสำหรับการเข้าใช้งานครั้งแรก</h3>
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                   
                                    <div class="card-content">
                                           <div class="info info-horizontal">
                                            <div class="icon icon-info">
                                                <i class="material-icons">vpn_key</i>
                                            </div>
                                            <div class="description">
                                                <h4 class="info-title">ชื่อและรหัสผ่านเข้าใช้งานระบบ</h4>    
                                            </div>
                                             </div>
                                       
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">account_circle</i>
                                                </span>
                                                <?= $form->field($model, 'username')->textInput(); ?>                                           
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                                <?= $form->field($model, 'password_hash')->textInput(['value'=>$model->CID])->label('กรุณาเปลี่ยน password ใหม่'); ?>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">credit_card</i>
                                                </span>
                                               <!--  <input type="password" placeholder="ยืนยัน CID..." class="form-control" /> -->
                                               
                                     <?= Html::textInput('confCID','', ['class' => 'form-control','placeholder'=>"ยืนยัน CID..."]) ?>
                                            </div>
                                    <div class="social text-center">                                      
                                        <h5>โปรดทำการเปลี่ยน Username และ Password ของท่าน</h5>
                                    </div>
                                            <!-- If you want to add a checkbox to this form, uncomment this code -->
                                            
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    
        <?php
            if($modelTblpersonalinfo){        
           
        ?>
                                        <div class="card-content">
                                           <div class="info info-horizontal">
                                            <div class="icon icon-info">
                                                <i class="material-icons">group</i>
                                            </div>
                                            <div class="description">
                                                <h4 class="info-title">ข้อมูลบุคคล</h4>    
                                            </div>
                                             </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    ชื่อ :
                                                </span>
                                                <?=$form->field($modelTblpersonalinfo, 'FName')->textInput();?>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    นามสกุล :
                                                </span>
                                                <?=$form->field($modelTblpersonalinfo, 'LName')->textInput();?>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">local_phone</i>
                                                </span>
                                                <?=$form->field($modelTblpersonalinfo, 'TelNo1')->textInput();?>
                                            </div>
                                            <!-- If you want to add a checkbox to this form, uncomment this code -->
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>
                                                <?= $form->field($modelTblpersonalinfo, 'eMail1')->textInput();?>
                                            </div>
                                             
                                        </div>
                <?php
                 }//end if modelTblpersonalinfo
                ?>
                                        <div class="footer text-center">
                                            
                                            <?= Html::submitButton('บันทึก' , ['class' =>  'btn btn-primary btn-round']) ?>
                                        </div>
                                 
                                </div>
                            </div>
                        </div>
         <?php ActiveForm::end(); ?>                
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portofolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com"> Creative Tim </a>, made with love for a better web
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../themes/material/dist/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../themes/material/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../themes/material/dist/js/material.min.js" type="text/javascript"></script>
<script src="../themes/material/dist/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="../themes/material/dist/js/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../themes/material/dist/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../themes/material/dist/js/moment.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="../themes/material/dist/js/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../themes/material/dist/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="../themes/material/dist/js/bootstrap-notify.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="../themes/material/dist/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="../themes/material/dist/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../themes/material/dist/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../themes/material/dist/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="../themes/material/dist/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="../themes/material/dist/js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../themes/material/dist/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../themes/material/dist/js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../themes/material/dist/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../themes/material/dist/js/material-dashboard.js?v=1.2.1"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../themes/material/dist/js/demo.js"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>