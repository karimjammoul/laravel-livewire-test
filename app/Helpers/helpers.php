<?php

function toReadableString($string) {
    if (!$string) {
        return $string;
    }

    return ucwords(str_replace('_', ' ', $string));
}
