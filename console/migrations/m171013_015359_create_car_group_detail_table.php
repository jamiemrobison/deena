<?php

use yii\db\Migration;

/**
 * Handles the creation of table `car_group_detail`.
 */
class m171013_015359_create_car_group_detail_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('car_group_detail', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer(),
            'brand'=>$this->integer(),
            'model'=>$this->integer(),
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
        $this->dropTable('car_group_detail');
    }
}
