<?php 

namespace Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ChangePanelUrl extends Command {

    /**
     * The name.
     * 
     * @var string
     */
    protected static $defaultName = 'app:env:change-panel-url';

    /**
     * Configure
     */
    public function configure() {
        $this->addArgument('url', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        $newUrl = $input->getArgument('url'); 

        $this->changeUrl($newUrl); 

        return $this->info(sprintf('URL Successfully changed to %s!', $newUrl));
    }

    protected function changeUrl($url) {

        $urlPrefix = $this->getUrlPrefix();

        file_put_contents(__DIR__ . '/../.env', preg_replace(
                $urlPrefix,
                sprintf('PANEL_URL=%s', $url),
                file_get_contents(__DIR__ . '/../.env')  
            )
        );

        putenv(sprintf('PANEL_URL=%s', $url));

    }

    protected function getUrlPrefix() {
        $escaped = preg_quote('=' . getenv('PANEL_URL'), '/');

        return "/^PANEL_URL{$escaped}/m";
    }
}