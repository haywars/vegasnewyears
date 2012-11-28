<?php

$this->breadcrumb = array(
    "Home" => "/".$this->vars['slug'],
    $this->vars['market_name'] => '/'.$this->vars['market_slug'],
    $this->vars['market_name'].' Photos' => null
);

$this->inherit("pages/photos");