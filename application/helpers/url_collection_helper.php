<?php

function asset($asset)
{
    return base_url('assets/' . $asset);
}

function uploads($url)
{
    return base_url('uploads/'. $url);
}

function admin($url)
{
    return base_url('administrator/'. $url);
}