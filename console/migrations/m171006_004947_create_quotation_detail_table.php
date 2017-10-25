<?php

use yii\db\Migration;

/**
 * Handles the creation of table `quotation_detail`.
 */
class m171006_004947_create_quotation_detail_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('quotation_detail', [
            'id' => $this->primaryKey(),
            'quatation_id'=>$this->integer(),
            'car_id'=>$this->integer(),
            'car_code'=>$this->integer(),
            'package_id'=>$this->integer(),
            'amount'=>$this->float(),
            'total_amount'=>$this->float(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('quotation_detail');
    }
}
