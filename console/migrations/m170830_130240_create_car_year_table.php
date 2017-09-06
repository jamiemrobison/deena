<?php

use yii\db\Migration;

/**
 * Handles the creation of table `car_year`.
 */
class m170830_130240_create_car_year_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('car_year', [
            'id' => $this->primaryKey(),
            'year_eng' => $this->string(),
            'year_thai' => $this->string(),
            'year_text' => $this->string(),
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
        $this->dropTable('car_year');
    }
}
