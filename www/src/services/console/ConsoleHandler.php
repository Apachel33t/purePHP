<?php

namespace Services\Console;

class ConsoleHandler
{
    protected array $registry;

    public function addCommand($name, $callable)
    {
        if (gettype($callable) == "array") {
            $className = $callable[0];
            $method = $callable[1];

            $class = new $className;

            $this->registry[$name] = [$class, $method];
        } else {
            $this->registry[$name] = $callable;
        }
    }

    public function getCommand($command)
    {
        return $this->registry[$command] ?? null;
    }

    public function printer($msg)
    {
        if (gettype($msg) !== "boolean") {
            echo $msg . "\n";
        }
    }

    public function runCommand(array $argv)
    {
        $command_name = "help";

        if (isset($argv[1])) {
            $command_name = $argv[1];
        }

        $command = $this->getCommand($command_name);
        if ($command === null) {
            echo "Error: {$command_name} not found.";
            exit;
        }

        $argv = array_slice($argv, 2);

        $this->printer(call_user_func_array($command, $argv));
    }
}