<?php
use yii\helpers\Url;
use kartik\file\Fileinput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;

$this->title = 'รายละเอียดกระดานทุน :' .\backend\models\Insurancecompany::getFullName($company_id);
?>
<div class="row">
	<div class="col-lg-12">
		<?php
			echo GridView::widget([
			    'dataProvider'=>$dataProvider,
			    'filterModel'=>$searchModel,
			    'showPageSummary'=>false,
			    'pjax'=>true,
			    'striped'=>false,
			    'hover'=>true,
			    'panel'=>['type'=>'primary', 'heading'=>'กระดานทุน'],
			    'columns'=>[
			        ['class'=>'kartik\grid\SerialColumn'],
			        [
			            'attribute'=>'insure_company_id', 
			            'width'=>'310px',
			            'value'=>function ($model, $key, $index, $widget) { 
			                return \backend\models\Insurancecompany::getName($model->insure_company_id);
			            },
			            'filterType'=>GridView::FILTER_SELECT2,
			            'filter'=>ArrayHelper::map(\backend\models\Insurancecompany::find()->orderBy('id')->asArray()->all(), 'id', 'name'), 
			            'filterWidgetOptions'=>[
			                'pluginOptions'=>['allowClear'=>true],
			            ],
			            'filterInputOptions'=>['placeholder'=>'Any year'],
			             'group'=>true,  // enable grouping
			            // 'groupHeader'=>function ($model, $key, $index, $widget) { // Closure method
			            //     return [
			            //         'mergeColumns'=>[[1,3]], // columns to merge in summary
			            //         'content'=>[             // content to show in each summary cell
			            //             1=>'Summary (' . $model->cap_year . ')',
			            //             4=>GridView::F_AVG,
			            //             5=>GridView::F_SUM,
			            //             6=>GridView::F_SUM,
			            //         ],
			            //         'contentFormats'=>[      // content reformatting for each summary cell
			            //             4=>['format'=>'number', 'decimals'=>2],
			            //             5=>['format'=>'number', 'decimals'=>0],
			            //             6=>['format'=>'number', 'decimals'=>2],
			            //         ],
			            //         'contentOptions'=>[      // content html attributes for each summary cell
			            //             1=>['style'=>'font-variant:small-caps'],
			            //             4=>['style'=>'text-align:right'],
			            //             5=>['style'=>'text-align:right'],
			            //             6=>['style'=>'text-align:right'],
			            //         ],
			            //         // html attributes for group summary row
			            //         'options'=>['class'=>'danger','style'=>'font-weight:bold;']
			            //     ];
			            // }
			        ],
			        [
			            'attribute'=>'cap_year', 
			            'width'=>'310px',
			            'value'=>function ($model, $key, $index, $widget) { 
			                return $model->cap_year;
			            },
			            'filterType'=>GridView::FILTER_SELECT2,
			            'filter'=>ArrayHelper::map(\common\models\CapitalYear::find()->orderBy('cap_year')->asArray()->all(), 'id', 'cap_year'), 
			            'filterWidgetOptions'=>[
			                'pluginOptions'=>['allowClear'=>true],
			            ],
			            'filterInputOptions'=>['placeholder'=>'Any year'],
			             'group'=>true,  // enable grouping
			            // 'groupHeader'=>function ($model, $key, $index, $widget) { // Closure method
			            //     return [
			            //         'mergeColumns'=>[[1,3]], // columns to merge in summary
			            //         'content'=>[             // content to show in each summary cell
			            //             1=>'Summary (' . $model->cap_year . ')',
			            //             4=>GridView::F_AVG,
			            //             5=>GridView::F_SUM,
			            //             6=>GridView::F_SUM,
			            //         ],
			            //         'contentFormats'=>[      // content reformatting for each summary cell
			            //             4=>['format'=>'number', 'decimals'=>2],
			            //             5=>['format'=>'number', 'decimals'=>0],
			            //             6=>['format'=>'number', 'decimals'=>2],
			            //         ],
			            //         'contentOptions'=>[      // content html attributes for each summary cell
			            //             1=>['style'=>'font-variant:small-caps'],
			            //             4=>['style'=>'text-align:right'],
			            //             5=>['style'=>'text-align:right'],
			            //             6=>['style'=>'text-align:right'],
			            //         ],
			            //         // html attributes for group summary row
			            //         'options'=>['class'=>'danger','style'=>'font-weight:bold;']
			            //     ];
			            // }
			        ],
			        // [
			        //     'attribute'=>'category_id', 
			        //     'width'=>'250px',
			        //     'value'=>function ($model, $key, $index, $widget) { 
			        //         return $model->category->category_name;
			        //     },
			        //     'filterType'=>GridView::FILTER_SELECT2,
			        //     'filter'=>ArrayHelper::map(Categories::find()->orderBy('category_name')->asArray()->all(), 'id', 'category_name'), 
			        //     'filterWidgetOptions'=>[
			        //         'pluginOptions'=>['allowClear'=>true],
			        //     ],
			        //     'filterInputOptions'=>['placeholder'=>'Any category'],
			        //     'group'=>true,  // enable grouping
			        //     'subGroupOf'=>1, // supplier column index is the parent group,
			        //     'groupFooter'=>function ($model, $key, $index, $widget) { // Closure method
			        //         return [
			        //             'mergeColumns'=>[[2, 3]], // columns to merge in summary
			        //             'content'=>[              // content to show in each summary cell
			        //                 2=>'Summary (' . $model->category->category_name . ')',
			        //                 4=>GridView::F_AVG,
			        //                 5=>GridView::F_SUM,
			        //                 6=>GridView::F_SUM,
			        //             ],
			        //             'contentFormats'=>[      // content reformatting for each summary cell
			        //                 4=>['format'=>'number', 'decimals'=>2],
			        //                 5=>['format'=>'number', 'decimals'=>0],
			        //                 6=>['format'=>'number', 'decimals'=>2],
			        //             ],
			        //             'contentOptions'=>[      // content html attributes for each summary cell
			        //                 4=>['style'=>'text-align:right'],
			        //                 5=>['style'=>'text-align:right'],
			        //                 6=>['style'=>'text-align:right'],
			        //             ],
			        //             // html attributes for group summary row
			        //             'options'=>['class'=>'success','style'=>'font-weight:bold;']
			        //         ];
			        //     },
			        // ],
			        [
			            'attribute'=>'brand_name',
			            'pageSummary'=>'Page Summary',
			            'pageSummaryOptions'=>['class'=>'text-right text-warning'],
			        ],
			        [
			            'attribute'=>'model_name',
			            'width'=>'150px',
			            'hAlign'=>'left',
			           // 'format'=>['decimal', 2],
			           // 'pageSummary'=>true,
			           // 'pageSummaryFunc'=>GridView::F_AVG
			        ],
			        [
			            'attribute'=>'car_code',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            //'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			        [
			            'attribute'=>'car_group',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            //'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			         [
			            'attribute'=>'cpg',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            //'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			         [
			            'attribute'=>'minmax',
			            'label'=>'ทุน',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            //'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			        //  [
			        //     'attribute'=>'ทุน',
			        //     'width'=>'150px',
			        //     'hAlign'=>'left',
			        //     //'format'=>['decimal', 0],
			        //    // 'pageSummary'=>true
			        // ],
			          [
			            'attribute'=>'Y2',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			         [
			            'attribute'=>'Y3',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			         [
			            'attribute'=>'Y4',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			         [
			            'attribute'=>'Y5',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			         [
			            'attribute'=>'Y6',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			         [
			            'attribute'=>'Y7',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			         [
			            'attribute'=>'Y8',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			         [
			            'attribute'=>'Y9',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			         [
			            'attribute'=>'Y10',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			         [
			            'attribute'=>'Y11',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			         [
			            'attribute'=>'Y12',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			         [
			            'attribute'=>'Y13',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			         [
			            'attribute'=>'Y14',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			         [
			            'attribute'=>'Y15',
			            'width'=>'150px',
			            'hAlign'=>'left',
			            'format'=>['decimal', 0],
			           // 'pageSummary'=>true
			        ],
			        
			    ],
			]);


		?>
	</div>
</div>