<?php

use yii\db\Migration;

/**
 * Class m170913_013528_add_column_to_contact_table
 */
class m170913_013528_add_column_to_contact_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('contact','contact_title',$this->integer());
        $this->addColumn('contact','contact_section',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('contact','contact_title');
       $this->dropColumn('contact','contact_section');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170913_013528_add_column_to_contact_table cannot be reverted.\n";

        return false;
    }
    */
}
