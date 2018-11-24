<?php
if (!function_exists("get_description")) {
    function get_description($content, $word = 210)
    {
        if (empty($content)) {
            return '...';
        }

        $description = mb_substr(strip_tags($content), 0, $word);
        return $description;
    }
}
