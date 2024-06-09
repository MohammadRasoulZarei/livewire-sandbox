<?php
function makeNameFile($file){
    return time().'-'.$file->getClientOriginalName();
}
