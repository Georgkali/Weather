<?php

namespace app;

class Today extends Api
{
    private array $data;

    public function __construct(string $url)
    {
        parent::__construct($url);
        $this->data = parent::data()->{"forecast"}->{"forecastday"};
    }


    public function getData(): array
    {
        return $this->data;
    }

}