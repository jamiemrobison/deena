<?php

use yii\db\Migration;

/**
 * Handles the creation of table `insure_package`.
 */
class m171031_104542_create_insure_package_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('insure_package', [
            'id' => $this->primaryKey(),
            'insure_id'=>$this->integer(),
            'package_id'=>$this->integer(),
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
        $this->dropTable('insure_package');
    }
}
