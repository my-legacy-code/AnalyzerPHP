<?php

/**
 * @author Harry Liu
 * @version Feb 18, 2018
 */
namespace Stackr\Analyzer\Model;


class Technology
{
    /* @var string */
    public $name;

    /* @var string */
    public $version;

    /* @var string */
    public $icon;

    /* @var string */
    public $website;

    public function __toString()
    {
        return "[Technology name={$this->name} version={$this->version} icon={$this->icon} website={$this->website}]";
    }
}