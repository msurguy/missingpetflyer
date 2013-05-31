<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CleanDirs extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cleandirs';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Cleans directories.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$now = time();
		foreach(File::directories('public/uploads') as $dir ){
			$dirtime = filemtime($dir);
			
			if( $now-$dirtime > 3600){
				File::deleteDirectory($dir);
				$this->info('Directory '.$dir.' was deleted');
			}
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('example', InputArgument::OPTIONAL, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}