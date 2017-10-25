<?php

use yii\db\Migration;

/**
 * Handles the creation of table `car_group_company`.
 */
class m171013_015321_create_car_group_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('car_group_company', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description'=>$this->string(),
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
        $this->dropTable('car_group_company');
    }
}
