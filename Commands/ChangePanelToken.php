<?php 

namespace Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ChangePanelToken extends Command {

    /**
     * The name.
     * 
     * @var string
     */
    protected static $defaultName = 'change-panel-token';

    /**
     * Configure
     */
    public function configure() {
        $this->addArgument('token', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        $newToken = $input->getArgument('token'); 

        $this->changeToken($newToken); 

        return $this->info(sprintf('TOKEN Successfully changed to %s!', $newToken));
    }

    protected function changeToken($token) {

        $tokenPrefix = $this->getTokenPrefix();

        file_put_contents(__DIR__ . '/../.env', preg_replace(
                $tokenPrefix,
                sprintf('PANEL_TOKEN=%s', $token),
                file_get_contents(__DIR__ . '/../.env')  
            )
        );

        putenv(sprintf('PANEL_TOKEN=%s', $token));

    }

    protected function getTokenPrefix() {
        $escaped = preg_quote('=' . getenv('PANEL_TOKEN'), '/');

        return "/^PANEL_TOKEN{$escaped}/m";
    }
}