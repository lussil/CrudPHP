<?php
class ControladorVaga
{
    public function create(): never
    {

        $host = $_SERVER['HTTP_HOST'];
        $uri = "/caminho/destino";

        $url = "http://" . $host . $uri;

        // Redireciona para a URL completa
        header("Location: " . $url);
        exit();
    }
}
