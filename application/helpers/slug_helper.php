<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function slug($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    // trim
    $text = trim($text, '-');
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // lowercase
    $text = strtolower($text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    if (empty($text))
    {
        return 'n-a';
    }
    return $text.'.html';
}

function generateSlug($string, $table, $field)
{
    $CI =& get_instance();
    $count = 0;
    $string = url_title($string, '-', TRUE);
    $slug = $string;
    while(true)
    {
        $query = $CI->db->get_where($table, [$field => $slug]);
        if ($query->num_rows() == 0) break;
        $slug = $string . '-' . (++$count);
    }
    return $slug;
}
