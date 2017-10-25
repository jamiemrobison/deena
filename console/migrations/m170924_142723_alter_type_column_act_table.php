<?php

use yii\db\Migration;

/**
 * Class m170924_142723_alter_type_column_act_table
 */
class m170924_142723_alter_type_column_act_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->alterColumn('act','car_code',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->alterColumn('act','car_code',$this->integer());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170924_142723_alter_type_column_act_table cannot be reverted.\n";

        return false;
    }
    */
}
