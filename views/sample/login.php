<?php 
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>

<div class="app-brand justify-content-center">
  <span class="app-brand-text demo text-body fw-bolder">Login</span>
</div>
<h4 class="mb-2 text-center">Welcome Admin</h4>
<p class="mb-4 text-center">Please sign-in to your account</p>
<?php $form = ActiveForm::begin([
  'id' => 'login-form',
  'options' => [
    'class' => 'mb-3'
  ]
]); ?>
  <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder' => 'Username']) ?>
  <?= $form->field($model, 'password', [
    'template'       => "{label}\n<div class=\"input-group input-group-merge\">{input}\n<span class=\"input-group-text cursor-pointer\"><i class=\"bx bx-hide\"></i></span>\n{error}\n</div>",
    'options' => [
      'class' => 'form-password-toggle mb-3',
    ],
    'inputOptions' => [
      'placeholder' => false,
    ],
  ])->passwordInput() ?>
  <?= $form->field($model, 'rememberMe')->checkbox() ?>
  <div class="mb-3">
    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
  </div>
<?php ActiveForm::end(); ?>