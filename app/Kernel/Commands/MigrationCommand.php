<?php

namespace Fragment\Kernel\Commands;

use Symfony\Component\Console\Command\Command As Cmd;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MigrationCommand extends Cmd
{
    protected static $defaultName = "database:migrate";

    protected static $defaultDescription = "Run migrations to database";

    protected string $path = 'schema/Migrations';

    protected string $namespace = 'Fragment\\Migrations';
    protected array $migrations = [];

    public function configure(): void
    {
        $this->migrations = $this->getMigrations();
    }

    public function execute(InputInterface $inputInterface, OutputInterface $outputInterface)
    {
        $outputInterface->writeln('Running migrations...');

        if ($this->runMigrations() === true) {
            $outputInterface->writeln('Finished running migrations');
            return Cmd::SUCCESS;
        }

         $outputInterface->writeln('[+] Error running migrations');
        return Cmd::INVALID;
    }

    public function getMigrations(): array
    {
        $result = glob("$this->path/*.php");

        foreach ($result as $key) {
            $name =  $this->namespace . '\\' . pathinfo($key, PATHINFO_FILENAME);
            $class[] = "$name::class";
        }

        return $class;
    }

    public function runMigrations(): bool
    {
        foreach ($this->migrations as $migration) {
            call_user_func($migration);
        }
        return empty($this->migrations) ?? true;

    }
}
