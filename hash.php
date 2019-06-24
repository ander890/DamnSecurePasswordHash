<?php

function dsphHash($password_plain, $salt = "LxzLSC9Xactza23u6+TUv-NbMs%H=4PsLveHyUW9S*zcQp*Uyt"){
    $step1 = crypt($password_plain, $salt);
    $step2 = hash('md2', $step1.$salt);
    $step3 = hash('md4', $step2.$salt);
    $step4 = hash('md5', $step3.$salt);
    $step5 = hash('sha1', $step4.$salt);
    $step6 = hash('sha256', $step5.$salt);
    $step7 = hash('sha384', $step6.$salt);
    $step8 = hash('sha512', $step7.$salt);
    $step9 = hash('ripemd128', $step8.$salt);
    $step10 = hash('ripemd160', $step9.$salt);
    $step11 = hash('ripemd256', $step10.$salt);
    $step12 = hash('ripemd320', $step11.$salt);
    $step13 = hash('whirlpool', $step12.$salt);
    $step14 = hash('tiger128,3', $step13.$salt);
    $step15 = hash('tiger160,3', $step14.$salt);
    $step16 = hash('tiger192,3', $step15.$salt);
    $step17 = hash('tiger128,4', $step16.$salt);
    $step18 = hash('tiger160,4', $step17.$salt);
    $step19 = hash('tiger192,4', $step18.$salt);
    $step20 = hash('snefru', $step19.$salt);
    $step21 = hash('gost', $step20.$salt);
    $step22 = hash('adler32', $step21.$salt);
    $step23 = hash('crc32', $step22.$salt);
    $step24 = hash('crc32b', $step23.$salt);
    $step25 = hash('haval128,3', $step24.$salt);
    $step26 = hash('haval160,3', $step25.$salt);
    $step27 = hash('haval192,3', $step26.$salt);
    $step28 = hash('haval224,3', $step27.$salt);
    $step29 = hash('haval256,3', $step28.$salt);
    $step30 = hash('haval128,4', $step29.$salt);
    $step31 = hash('haval160,4', $step30.$salt);
    $step32 = hash('haval192,4', $step31.$salt);
    $step33 = hash('haval224,4', $step32.$salt);
    $step34 = hash('haval256,4', $step33.$salt);
    $step35 = hash('haval128,5', $step34.$salt);
    $step36 = hash('haval160,5', $step35.$salt);
    $step37 = hash('haval192,5', $step36.$salt);
    $step38 = hash('haval224,5', $step37.$salt);
    $step39 = hash('haval256,5', $step38.$salt);
    return $step39;
}

function dsphVerify($password_plain, $password_hash, $salt = "LxzLSC9Xactza23u6+TUv-NbMs%H=4PsLveHyUW9S*zcQp*Uyt"){
    $hashing = dsphHash($password_plain, $salt);
    if($password_hash == $hashing){
        return true;
    }else{
        return false;
    }
}

?>