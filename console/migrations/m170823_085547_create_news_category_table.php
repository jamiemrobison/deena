<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_category`.
 */
class m170823_085547_create_news_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news_category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'desctription' =>$this->string(),
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
        $this->dropTable('news_category');
    }
}
