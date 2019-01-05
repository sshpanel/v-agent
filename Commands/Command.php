<?php 

namespace Commands;

use Symfony\Component\Process\Process;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Command extends SymfonyCommand {

    /**
     * Return info output.
     * 
     * @param  string
     * @return mixed
     */
    public function info($message, $options = 0) {
        $output = new ConsoleOutput();

        return $output->writeln(sprintf('<info>%s</info>', $message), $options);
    }

    
    /**
     * Return error output.
     * 
     * @param  string
     * @return mixed
     */
    public function error($message, $options = 0) {
        $output = new ConsoleOutput();

        return $output->writeln(sprintf('<error>%s</error>', $message), $options);
    }

    /**
     * Return comment output.
     * 
     * @param  string
     * @return mixed
     */
    public function comment($message, $options = 0) {
        $output = new ConsoleOutput();

        return $output->writeln(sprintf('<comment>%s</comment>', $message), $options);
    }

    
    /**
     * Return question output.
     * 
     * @param  string
     * @return mixed
     */
    public function question($message, $options = 0) {
        $output = new ConsoleOutput();

        return $output->writeln(sprintf('<question>%s</question>', $message), $options);
    }
}