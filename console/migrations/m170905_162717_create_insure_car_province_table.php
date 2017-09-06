<?php

use yii\db\Migration;

/**
 * Handles the creation of table `insure_car_province`.
 */
class m170905_162717_create_insure_car_province_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('insure_car_province', [
            'id' => $this->primaryKey(),
            'provice_code'=> $this->string(),
            'name'=> $this->string(),
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
        $this->dropTable('insure_car_province');
    }
}
