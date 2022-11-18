<?php
    function findObjectByGid($array, $gid){
        foreach ( $array as $element ) {
            if ( $gid == $element->gid ) {
                return $element;
            }
        }

        return false;
    }
?>