<?php

use yii\db\Migration;

/**
 * Class m170924_033809_add_column_to_contact_table
 */
class m170924_033809_add_column_to_contact_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('contact','phone1',$this->string());
        $this->addColumn('contact','phone2',$this->string());
        $this->addColumn('contact','email1',$this->string());
        $this->addColumn('contact','email2',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('contact','phone1');
       $this->dropColumn('contact','phone2');
       $this->dropColumn('contact','email1');
       $this->dropColumn('contact','email2');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170924_033809_add_column_to_contact_table cannot be reverted.\n";

        return false;
    }
    */
}
