<?php namespace helper;

trait renderTrait{
    public function render(string $html, array $options) : string
    {
        extract($options);
        ob_start();
        require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . $html . '.php';
        return ob_get_clean();
    }
}