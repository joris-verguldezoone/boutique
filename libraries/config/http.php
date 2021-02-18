<?php
// Auto-loader ?

class Http
{
    public static function redirect(string $path)
    {
        header('Location: '.$path);
        exit();
    }
}
?>
?>