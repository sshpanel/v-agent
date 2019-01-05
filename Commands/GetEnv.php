<?php 

namespace Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class GetEnv extends Command {

    /**
     * The name.
     * 
     * @var string
     */
    protected static $defaultName = 'app:env:get-env';

    /**
     * Configure
     */
    public function configure() {
        //
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        return $output->writeln(file_get_contents(__DIR__ . '/../.env'));
    }
}