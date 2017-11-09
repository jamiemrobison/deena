<?php

use yii\db\Migration;

/**
 * Handles the creation of table `capital_car_temp`.
 */
class m171102_120744_create_capital_car_temp_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('capital_car_temp', [
            'id' => $this->primaryKey(),
            'brand_name' => $this->string(),
            'model_name' => $this->string(),
            'car_group' =>$this->string(),
            'car_code' => $this->string(),
            'cpg' => $this->string(),
            'description' => $this->string(),
            'minmax'=>$this->string(),
            'A1'=>$this->float(),
            'A2'=>$this->float(),
            'A3'=>$this->float(),
            'A4'=>$this->float(),
            'A5'=>$this->float(),
            'A6'=>$this->float(),
            'A7'=>$this->float(),
            'A8'=>$this->float(),
            'A9'=>$this->float(),
            'A10'=>$this->float(),
            'A11'=>$this->float(),
            'A12'=>$this->float(),
            'A13'=>$this->float(),
            'A14'=>$this->float(),
            'A15'=>$this->float(),
            'A16'=>$this->float(),
            'A17'=>$this->float(),
            'A18'=>$this->float(),
            'A19'=>$this->float(),
            'A20'=>$this->float(),
            'A21'=>$this->float(),
            'A22'=>$this->float(),
            'A23'=>$this->float(),
            'A24'=>$this->float(),
            'A25'=>$this->float(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('capital_car_temp');
    }
}
