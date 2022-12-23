<?php
namespace extas\interfaces\extensions\bots;

interface IExtensionBot
{
    /**
     * @return array [result, error]
     */
    public function run(array $data): array;
}
