<?php

function de() {
    array_map(function ($x) {
        echo ' <pre>';
        print_r($x);
        echo '</pre>';
    }, func_get_args());

    die;
}

function query_debug($sql)
{
    $query = str_replace(array('?'), array('\'%s\''), $sql->toSql());
    $query = vsprintf($query, $sql->getBindings());
    return dd($query);
}