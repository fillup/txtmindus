<?php

class m140523_011020_create_log_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createTable('{{log}}',array(
            'id' => 'char(32) null',
            'user_id' => 'char(32) not null',
            'phone_from' => 'varchar(50) not null',
            'phone_to' => 'varchar(50) not null',
            'time_sent' => 'datetime null',
            'time_received' => 'datetime null',
            'retry_count' => 'tinyint(4) not null',

        ),'ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci');
	}

	public function safeDown()
	{
	}
}