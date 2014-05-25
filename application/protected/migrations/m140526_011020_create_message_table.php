<?php

class m140526_011020_create_message_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createTable('{{message}}',array(
            'id' => 'char(32) null',
            'user_id' => 'char(32) not null',
            'service_account_id' => 'char(32) not null',
            'phone_from' => 'varchar(50) not null',
            'phone_to' => 'varchar(50) not null',
            'body' => 'varchar(1024) not null',
            'time_sent' => 'datetime null',
            'time_received' => 'datetime null',
            'status' => 'varchar(16) null',
            'retry_count' => 'tinyint(4) null',
            'response_id' => 'varchar(64) null',
            'response_status' => 'varchar(32) null',
            'response_error' => 'varchar(1024) null',
        ),'ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci');
        $this->addPrimaryKey('pk_message_id','{{message}}','id');
        $this->addForeignKey('fk_message_user_id','{{message}}','user_id','{{user}}','id','NO ACTION','NO ACTION');
        $this->addForeignKey('fk_message_service_account_id','{{message}}','service_account_id','{{service_account}}','id','NO ACTION','NO ACTION');
	}

	public function safeDown()
	{
        $this->dropTable('{{message}}');
	}
}