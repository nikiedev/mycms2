<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class TaskNewsletter extends BaseCommand
{
	protected $group       = 'Tasks';
	protected $name        = 'cron:newsletter';
	protected $description = 'Send message to subscribers when article/comment is published.';
	
	public function run(array $params)
	{
		// TODO: ...
	}
}