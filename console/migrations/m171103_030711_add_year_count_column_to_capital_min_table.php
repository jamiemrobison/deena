<?php

use yii\db\Migration;

/**
 * Handles adding year_count to table `capital_min`.
 */
class m171103_030711_add_year_count_column_to_capital_min_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('capital_min','year_count',$this->integer());
        $this->addColumn('capital_min','year_text',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('capital_min','year_count');
        $this->dropColumn('capital_min','year_text');
    }
}
