<?php

class m140525_174340_create_service_accounts_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createTable('{{service_account}}',array(
            'id' => 'char(32) null',
            'user_id' => 'char(32) not null',
            'provider' => 'varchar(16) not null',
            'key' => 'varchar(128) null',
            'secret' => 'varchar(128) null',
            'extra' => 'varchar(1024) null',
        ),'ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci');
        $this->addPrimaryKey('pk_service_account','{{service_account}}','id');
        $this->addForeignKey('fk_service_account_user_id','{{service_account}}','user_id','{{user}}','id','NO ACTION','NO ACTION');
	}

	public function safeDown()
	{
        $this->dropTable('{{service_account}}');
	}
}