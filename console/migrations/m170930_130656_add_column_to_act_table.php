<?php

use yii\db\Migration;

/**
 * Class m170930_130656_add_column_to_act_table
 */
class m170930_130656_add_column_to_act_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('act','score_rate',$this->float());
        $this->addColumn('act','score',$this->float());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
      $this->dropColumn('act','score_rate');
      $this->dropColumn('act','score');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170930_130656_add_column_to_act_table cannot be reverted.\n";

        return false;
    }
    */
}
