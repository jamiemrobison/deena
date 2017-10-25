<?php

use yii\db\Migration;

/**
 * Handles the creation of table `member`.
 */
class m170829_103417_create_member_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('member', [
            'id' => $this->primaryKey(),
            'member_code' => $this->string(),
            'intro_code' => $this->string(),
            'line_code' => $this->string(),
            'level_id' => $this->string(),
            'applied_date' => $this->integer(),
            'expired_date' => $this->integer(),
            'title_name' => $this->string(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'card_id' => $this->string(),
            'dob' => $this->integer(),
            'address' => $this->string(),
            'mobile' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'line' => $this->string(),
            'career' => $this->string(),
            'card_into' => $this->integer(),
            'card_into_expired' => $this->integer(),
            'bank_account' => $this->string(),
            'income_expect'=> $this->integer(),
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
        $this->dropTable('member');
    }
}
