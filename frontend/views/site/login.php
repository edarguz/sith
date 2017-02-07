<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;

use kartik\form\ActiveForm;



?>
<div class="site-login">
    

<div class="row text-center">
    <div class="col-lg-3 col-lg-offset-4 col-sm-6 col-sm-offset-3">
      <h4>Inicia sesión</h4>
    </div>
</div>

<div class="row text-center">
   <div class="col-lg-3 col-lg-offset-4 col-sm-6 col-sm-offset-3">
      <div class="panel panel-primary login-pannel" id="pannel-1">

<div class="panel-body">
       <div class="row">
            <div class="col-lg-12">
                <img alt="logo" id="profile-img" class="profile-img-card img-responsive center-block" src="/sith/images/user.png" />
                             
            </div>
        </div>
 

       
    
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
 
        
            
            
            <div class="form-group">
                   <?= Html::submitButton('iniciar sesión', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

        


    <?php ActiveForm::end(); ?>
   
       
    
    </div>
           
    </div>
    
        
    </div>
</div>
