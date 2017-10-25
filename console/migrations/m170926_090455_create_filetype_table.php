<?php

use yii\db\Migration;

/**
 * Handles the creation of table `filetype`.
 */
class m170926_090455_create_filetype_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('filetype', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'short_name' => $this->string(),
            'description' => $this->string(),
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
        $this->dropTable('filetype');
    }
}
