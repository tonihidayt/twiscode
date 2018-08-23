<?php

/**
 * Laracast Elegant Flash Messaging
 * @param  string $title
 * @param  string $message
 * @return void
 */
function flash($title = null, $message = null)
{
    $flash = app('App\Helpers\Flash');

    if (func_num_args() == 0) {
        return $flash;
    }

    return $flash->info($title, $message);
}

/*
|--------------------------------------------------------------------------
| Detect Active Route
|--------------------------------------------------------------------------
|
| Compare given route with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
 */
function isActiveRoute($route, $output = 'active')
{
    if (Route::currentRouteName() == $route) {
        return $output;
    }
}

/*
|--------------------------------------------------------------------------
| Detect Active Routes
|--------------------------------------------------------------------------
|
| Compare given routes with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
 */
function areActiveRoutes(array $routes, $output = 'active')
{
    foreach ($routes as $route) {
        if (Route::currentRouteName() == $route) {
            return $output;
        }
    }
}

/*
|--------------------------------------------------------------------------
| Edit & Delete Action Button
|--------------------------------------------------------------------------
 */

function edButton($editUrl, $delUrl, $statusUrl = null, $status = null)
{
    $html = '';
    if (!empty($statusUrl)) {
        $html .= '<span class="switch btn btn-xs" data-on="success" data-off="warning" data-method="status"><input type="checkbox" data-toggle="tooltip" data-trans-button-cancel="' . trans('buttons.general.cancel') . '"';
        if ($status == 1) $html .= ' checked data-trans-button-confirm="' . trans('buttons.general.crud.disable') . '" data-trans-text="' . trans('strings.backend.general.status.confirm_disable') . '" data-color="#DD6B55" ';
        else $html .= ' data-trans-button-confirm="' . trans('buttons.general.crud.enable') . '" data-trans-text="' . trans('strings.backend.general.status.confirm_enable') . '" data-color="#5cb85c" ';
        $html .= 'data-trans-title="' . trans('strings.backend.general.are_you_sure') . '" data-default="'. $status .'" data-size="mini" data-url="' . $statusUrl . '" /></span>';
    }
    if (!empty($editUrl)) {
        $html .= '<a href="' . $editUrl . '" class="btn btn-xs" data-ajax="edit"><img src="' . asset("assets/images/icons/edit.png") . '" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '" aria-hidden="true"></a>';
    }
    if (!empty($delUrl)) {
        $html .= ' <a data-url="' . $delUrl . '"
                 data-method="delete"
                 data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
                 data-trans-button-confirm="' . trans('buttons.general.crud.delete') . '"
                 data-trans-title="' . trans('strings.backend.general.are_you_sure') . '" data-color="#DD6B55"  class="btn btn-xs"><img src="' . asset("assets/images/icons/delete.png") . '" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '" aria-hidden="true"></a>';
    } else {
        $html .= ' <span class="btn btn-xs disabled"><img src="' . asset("assets/images/icons/disabled.png") . '"></span>';
    }
    return $html;
}

/*
|--------------------------------------------------------------------------
| Currency List
|--------------------------------------------------------------------------
|
| https://gist.github.com/Min2liz/5728013
|
 */ 


/* Error Below Input Message */
function showErrorBlock($msg)
{
    return '<span class="help-block">
                    <strong>' . $msg . '</strong>
                  </span>';
}

/* Make Url Slug */
function makeSlug($slug, $title)
{
    if (empty($slug)) {
        $slug = str_slug($title, '-');
    }
    return $slug;
}

/*Make Datatables Show Entries*/
function makeDtEntries()
{
    return array([15, 25, 50, -1], [15, 25, 50, trans('default.all')]);
}

function search_array($needle, $haystack)
{

    if (in_array($needle, $haystack)) {
        return true;
    }
    foreach ($haystack as $element) {
        if (is_array($element) && $this->search_array($needle, $element)) {
            return true;
        }

    }
    return false;
}

function human_filesize($bytes, $decimals = 2)
{
    $sz     = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}

/* Convert hexdec color string to rgb(a) string
 * http://mekshq.com/how-to-convert-hexadecimal-color-code-to-rgb-or-rgba-using-php/
 */
function hex2rgba($color, $opacity = false)
{

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if (empty($color)) {
        return $default;
    }

    //Sanitize $color if "#" is provided
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb = array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if ($opacity) {
        if (abs($opacity) > 1) {
            $opacity = 1.0;
        }

        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }

    //Return rgb(a) color string
    return $output;
}

//Get File Icon From mime
function _getFileIcon($mime)
{
    $icon = explode('/', $mime);
    if ($icon[0] == 'image') {
        return '<i class="fa fa-file-image-o"></i> ';
    } elseif ($icon[0] == 'text') {
        return '<i class="fa fa-file-text-o"></i> ';
    } elseif ($icon[1] == 'x-compressed' || $icon[1] == 'x-zip-compressed' || $icon[1] == 'zip' || $icon[1] == 'x-zip') {
        return '<i class="fa fa-file-archive-o"></i> ';
    } elseif ($icon[1] == 'msword') {
        return '<i class="fa fa-file-word-o"></i> ';
    } else {
        return '<i class="fa fa-file-o"></i> ';
    }
}
