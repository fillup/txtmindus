<?php

class m140523_002130_create_user_table extends CDbMigration
{

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createTable('{{user}}',array(
            'id' => 'char(32) null',
            'email' => 'varchar(150) not null',
            'name' => 'varchar(64) null',
            'created' => 'datetime null',
            'access_token' => 'char(40) null',
            'api_token' => 'char(32) null',
        ),'ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci');
        $this->addPrimaryKey('pk_user', '{{user}}', 'id');
        $this->createIndex('idx_user_email', '{{user}}', 'email', true);
	}

	public function safeDown()
	{
        $this->dropTable('{{user}}');
	}
}