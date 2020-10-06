<?php

function asset($asset)
{
    return base_url('assets/' . $asset);
}

function uploads($url)
{
    return base_url('uploads/'. $url);
}