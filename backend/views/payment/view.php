<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Insurance;
use yii\helpers\Url;

$url_to_print = Yii::$app->getUrlManager()->createUrl('/payment/printreceipt');

/* @var $this yii\web\View */
/* @var $model backend\models\Payment */

$this->title = 'รายละเอียดการชำระเงิน : '.Insurance::getInsureno($model->insure_no);
$this->params['breadcrumbs'][] = ['label' => 'ชำระเงิน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-view">

<section class="invoice">
    <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-car"></i> กรมธรรม์เลขที่ <?=$model_insure->insure_no;?>
                <small class="pull-right">ชำระเงินล่าสุด <i class="fa fa-calendar"></i> <?=date('d-m-Y',$model->created_at)?> </small>
              </h2>
            </div>
            <!-- /.col -->
    </div>
    <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
         <!--  <div class="row">
            <div class="col-lg-4">
                <h4>ประเภท</h4>
            </div>
            <div class="col-lg-4">
                <h5><i>ประกันชั้น 1</i></h5>
            </div>
          </div> -->
          <div class="row">
            <div class="col-lg-4">
                <h4>ข้อมูลรถ</h4>
            </div>
            <div class="col-lg-4">
                <h5 style="text-decoration-style: dashed;"><i><?=$model_insure->plate_category." ".$model_insure->plate_license." ".\backend\models\Insurance::getPlateinfo($model_insure->plate_province,3)?></i></h5>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
                <h4>ชำระงวดที่</h4>
            </div>
            <div class="col-lg-4">
                <?php if(count($model_installment)<=0):?>
                    <h5><i><?=$model->period_no?></i></h5>
                <?php else:?>
                    <h5><i><?=$model->period_no."/".$model_installment->period?></i></h5>
                <?php endif;?>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
                <h4>เลขที่ใบรับเงิน</h4>
            </div>
            <div class="col-lg-4">
                <h5 style="text-decoration-style: dashed;"><i><?=$model->payment_code?></i></h5>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-sm-6 invoice-col">
          <div class="row">
            <div class="col-lg-4">
                <h4>วิธีการชำระเงิน</h4>
            </div>
            <div class="col-lg-4">
                <h5><i><?=\backend\models\Paymentchannel::getPaymentName($model_insure->payment_method);?></i></h5>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
                <h4>ธนาคาร</h4>
            </div>
            <div class="col-lg-4">
                <h5><?=Html::img('@web/uploads/logo/'.\backend\models\Bank::getLogo($model->bank_id),['style'=>'width: 20%;'])?><i><?=\backend\models\Bank::getBankName($model->bank_id);?></i></h5>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
                <h4>เลขที่บัญชี</h4>
            </div>
            <div class="col-lg-4">
                <h5><i><?=\backend\models\Bankaccount::getInfo($model->bank_account);?></i></h5>
            </div>
          </div>
        </div>
        </div>
         <hr />
        <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <!-- <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
 -->
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            หมายเหตุ : 
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">จำนวนเงิน:</th>
                <td><?=number_format($model->amount,2)?></td>
              </tr>
              <tr>
                <th>เบี้ยปรับ/หักค่าธรรมเนียม</th>
                <td><?=number_format($model->fee,2)?></td>
              </tr>
            <!--   <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr> -->
              <tr>
                <th>รวมทั้งสิ้น:</th>
                <td><?=number_format($model->amount + $model->fee,2)?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <div class="row no-print">
        <div class="col-xs-12">
       
          <button type="button" class="btn btn-primary pull-right btn-print" style="margin-right: 5px;">
            <i class="fa fa-print"></i> พิมพ์ใบเสร็จ
          </button>
        </div>
      </div>
       <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-newspaper-o text-warning"></i> ตารางผ่อนชำระ
              </h2>
            </div>
            <!-- /.col -->

    </div>
    <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
         <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center;">จำนวนงวด</th>
                    <th style="text-align: center;">ชำระงวดแรก</th>
                    <th style="text-align: center;">ผ่อนชำระ(งวด)</th>
                    <th style="text-align: center;">งวดละ(บาท)</th>
                </tr>
            </thead>
            <tbody>
                <?php if($model_installment->period != ''):?>
                    <tr>
                        <td style="text-align: center;"><?=$model_installment->period?></td>
                        <td style="text-align: center;"><?=number_format($model_installment->first_period)?></td>
                        <td style="text-align: center;"><?=$model_installment->remain?></td>
                        <td style="text-align: center;"><?=number_format($model_installment->period_per)?></td>
                    </tr>
                   <?php endif;?>
            </tbody>
         </table>
        </div>
        <!-- /.col -->
        
        </div>
      </div>
</section>
  <form id="show_receipt" class="show_receipt" action="index.php?r=payment/printreceipt" target="_blank" method="post">

    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken; ?>">
    <input type="hidden" name="list" class="list" value="<?=$model->id?>" />
</form>

  <?php //echo DetailView::widget([
        // 'model' => $model,
        // 'attributes' => [
        //     'id',
        //     'payment_date',
        //     'payment_time',
        //     'period_no',
        //     'amount',
        //     'remark',
        //     'insure_no',
        //     'status',
        //     'created_at',
        //     'updated_at',
        //     'created_by',
        //     'updated_by',
        // ],
    //]) ?> 
  
</div>
<?php $this->registerJs('
      $(function(){
        $(".btn-print").click(function(){
           $("form#show_receipt").submit();
        });
      });
');?>
