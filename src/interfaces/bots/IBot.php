<?php
namespace extas\interfaces\bots;

use extas\interfaces\IHasClass;
use extas\interfaces\IHasDescription;
use extas\interfaces\IHasName;
use extas\interfaces\IHaveUUID;
use extas\interfaces\IItem;

interface IBot extends IItem, IHaveUUID, IHasClass, IHasName, IHasDescription
{
    public const SUBJECT = 'extas.bot';

    public const FIELD__TOKEN = 'token';
    public const FIELD__PLATFORM = 'platform';

    public function getToken(): string;
    public function setToken(string $token): self;

    public function getPlatform(): string;
    public function setPlatform(string $platform): self;
}
