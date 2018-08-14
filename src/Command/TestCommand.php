<?php

namespace App\Command;

use App\Message\TestMessage;
use Enqueue\Client\ProducerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @package App\Command
 */
class TestCommand extends Command
{
    /**
     * @var ProducerInterface
     */
    private $bus;

    /**
     * @param string|null $name
     * @param ProducerInterface $bus
     */
    public function __construct(string $name = null, ProducerInterface $bus)
    {
        parent::__construct('aProcessorName');

        $this->bus = $bus;
    }

    protected function configure()
    {
        $this
            ->setName('app:create-message')
            ->addArgument('text', InputArgument::REQUIRED)
        ;
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // send command to ONE consumer
        $this->bus->sendEvent('aFooTopic', $input->getArgument('text'));

        #$this->bus->dispatch(new TestMessage($input->getArgument('text')));
    }
}
