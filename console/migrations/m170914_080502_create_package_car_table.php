<?php

use yii\db\Migration;

/**
 * Handles the creation of table `package_car`.
 */
class m170914_080502_create_package_car_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('package_car', [
            'id' => $this->primaryKey(),
            'package_id' => $this->integer(),
            'car_id' => $this->integer(),
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
        $this->dropTable('package_car');
    }
}
