<?php
    namespace Webjump\HelloWord\Console\Command;

    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Input\InputOption;
    use Symfony\Component\Console\Output\OutputInterface;

    /**
     * Class SomeCommand
     */
    class Comando extends Command
    {
        const NAME = 'name';

        /**
         * @inheritDoc
         */
        protected function configure()
        {
            $this->setName('my:first:command');
            $this->setDescription('This is my first console command.');
            $this->addOption(
                self::NAME,
                null,
                InputOption::VALUE_REQUIRED,
                'Name'
            );

            parent::configure();
        }

        /**
         * Execute the command
         *
         * @param InputInterface $input
         * @param OutputInterface $output
         *
         * @return null|int
         */
        protected function execute(InputInterface $input, OutputInterface $output)
        {
            if ($name = $input->getOption(self::NAME)) {
                $output->writeln('<info>HelloWord` ' . $name . '`</info>');
            }

            $output->writeln('<info>Success Message.</info>');

        }
    }