<?php
use yii\bootstrap5\Modal;
use yii\web\View;

$loadinngHtml = '
<center>
  <div class="fa-3x">
    <i class="fas fa-circle-notch fa-spin"></i>
  </div>
</center>
';
?>

<div class="modal fade" id="modal-main-root" tabindex="-1" role="dialog" aria-labelledby="modal-main" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title font-weight-normal" id="modal-main-title">...</h6>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close" id="modal-main-btn-close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" id="modal-main-body"><?= $loadinngHtml ?></div>
    </div>
  </div>
</div>

<?php
$this->registerJs('
var modalElement = document.getElementById("modal-main-root");
var modalObject  = new bootstrap.Modal(modalElement);
modalElement.addEventListener("hidden.bs.modal", function (event) {
  $("#modal-main-body").html(`'.$loadinngHtml.'`);
});
',View::POS_READY);
?>