<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('css_url'))
{
    function css_url($nom)
    {
        return base_url() . 'assets/css/' . $nom . '.css';
    }
}

if (!function_exists('js_url'))
{
    function js_url($nom)
    {
        return base_url() . 'assets/js/' . $nom . '.js';
    }
}

if (!function_exists('img_url'))
{
    function img_url($nom)
    {
        return base_url() . 'assets/images/' . $nom;
    }
}

if (!function_exists('doc_url'))
{
    function doc_url($nom)
    {
        return base_url() . 'assets/documents/' . $nom;
    }
}

if (!function_exists('img'))
{
    function img($nom, $alt = '')
    {
        return '<img src="' . img_url($nom) . '" alt="' . $alt . '" />';
    }
}

if (!function_exists('upload_url'))
{
    function upload_url($nom)
    {
        return base_url() . 'uploads/' . $nom;
    }
}

if (!function_exists('is_selected'))
{
    function is_selected($option, $value)
    {
        if ($option == $value)
			echo "selected=\"selected\"";
    }
}

if (!function_exists('upload_exists')) {
    function upload_exists($file_name) {
        $file_path = $_SERVER["DOCUMENT_ROOT"];
        if ($file_path[strlen($file_path) - 1] != "/") {
        $file_path .= "/uploads/" . $file_name;
        }
        else 
            $file_path .= "dev/uploads/" . $file_name;
        return (file_exists($file_path));
    }
}