<?php

namespace DrSmithFr\ChooseYourSide;

use Symfony\Bundle\FrameworkBundle\Console\Application as BaseApplication;
use Symfony\Component\HttpKernel\KernelInterface;

class Application extends BaseApplication
{
    private Side $side;

    public function __construct(KernelInterface $kernel, Side $side = Side::PEACE)
    {
        $this->side = $side;
        parent::__construct($kernel);
    }

    public function getLongVersion(): string
    {
        return match ($this->side) {
            Side::APOLITICAL => $this->removePolitics(),
            Side::UKRAINE => parent::getLongVersion(),
            Side::RUSSIA => $this->removePolitics() . '<bg=#f7f7f7;fg=#777>#Stand</><bg=#0037a1;fg=#f7f7f7>With</><bg=#ce2a1d;fg=#f7f7f7>Russia</>',
            default => $this->removePolitics() . '<bg=#f7f7f7;fg=#333>#StandForPeace</>  <href=https://www.un.org>https://www.un.org</>',
        };
    }

    private function removePolitics(): string
    {
        $disgustinglyPolitical = parent::getLongVersion();
        $lastUsefulInformation = strrpos($disgustinglyPolitical, ')');
        return substr($disgustinglyPolitical, 0, $lastUsefulInformation) . ') ';
    }
}