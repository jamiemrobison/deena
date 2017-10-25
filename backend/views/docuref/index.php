<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DocurefSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เอกสารแนบ';
$this->params['breadcrumbs'][] = $this->title;

$ownertype = [['id'=>2,'name'=>'บริษัทประกัน'],['id'=>3,'name'=>'สมาชิก']];
?>
<div class="docuref-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <form id="my-form" action="<?=Url::to(['docuref/index']);?>" method="get">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <div class="row">
                <div class="col-lg-3">
                    <?php
                    echo Select2::widget([
                        'name'=>'fileowner',
                        'data'=>ArrayHelper::map($ownertype,'id','name'),
                        'options'=>['placeholder'=>'เลือกประเภทเเจ้าของไฟล์'],
                        'pluginOptions'=>[
                            'allowClear' => true,
                        ]
                        ]);
                ?>
                </div>
                <div class="col-lg-3">
                    <?php
                    echo Select2::widget([
                        'name'=>'filecat',
                        'data'=>ArrayHelper::map(\backend\helpers\FileCategory::asArrayObject(),'id','name'),
                        'options'=>['placeholder'=>'เลือกประเภทเอกสาร'],
                        'pluginOptions'=>[
                            'allowClear' => true,
                        ]
                        ]);
                ?>
                </div>
                <div class="col-lg-3">
                    <input type="text" name="search" value="" class="form-control" placeholder="ค้นหา" />
                </div>
                <div class="col-lg-3">
                    <input type="submit" class="btn btn-primary" value="ค้นหา" />
                </div>
                
            </form>
            </div>
        <!-- <div class="col-lg-6">
                    <div class="btn-group pull-rightx" style="bottom: 10px">
                  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
               </div> -->
                <!-- </div> -->
           <div>
            <?php //echo Html::a('<i class="fa fa-plus-circle"></i> สร้างพนักงาน', ['create'], ['class' => 'btn btn-success']) ?>
            
      </div>
      </div>
      <div class="panel-body">
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

    //ฝฝ 'id',
            //'doc_type',
           // 'doc_group_id',
            [
                'attribute'=>'doc_group_id',
                'value'=> function($data){
                    return $data->doc_group_id!=''?\backend\helpers\FileCategory::getTypeById($data->doc_group_id):'';
                }
            ],
            'name',
            [
                'attribute'=>'party_type_id',
                'value'=> function($data){
                    return $data->party_type_id!=''?\backend\helpers\Party::getTypeById($data->party_type_id):'';
                }
            ],
           [
                'attribute'=>'party_id',
                'value'=> function($data){
                    return $data->party_id!=''?\backend\models\Docuref::getFileOwner($data->party_type_id,$data->party_id):'';
                }
            ],
            // 'description',
            // // 'filename',
            // [
            //    'attribute'=>'status',
            //    'format' => 'html',
            //    'value'=>function($data){
            //      return $data->status === 1 ? '<div class="label label-success">Active</div>':'<div class="label label-default">Inactive</div>';
            //    }
            //  ],
            //'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            // [
            //             'label' => 'Action',
            //             'format' => 'raw',
            //             'value' => function($model){
            //                     return '
            //                         <div class="btn-group" >
            //                             <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
            //                             <ul class="dropdown-menu" style="right: 0; left: auto;">
            //                             <li><a href="'.Url::toRoute(['/docuref/view', 'id'=>$model->id]).'">'.'View'.'</a></li>
            //                             <li><a href="'.Url::toRoute(['/docuref/update', 'id'=>$model->id]).'">'.'Update'.'</a></li>
            //                             <li><a onclick="return confirm(\'Confirm ?\')" href="'.Url::to(['/docuref/delete', 'id'=>$model->id],true).'">Delete</a></li>
            //                             </ul>
            //                         </div>
            //                     ';
            //                 // }
            //             },
            //             'headerOptions'=>['class'=>'text-center'],
            //             'contentOptions' => ['class'=>'text-center','style'=>'vertical-align: middle','text-align: center'],

            //         ],
        ],
    ]); ?>
    </div>
  </div>
  </div>
  </div>
    <?php Pjax::end(); ?>
</div>
