<?php
/*
 * SimpleJWT
 *
 * Copyright (C) Kelvin Mo 2015-2023
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 * 1. Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above
 *    copyright notice, this list of conditions and the following
 *    disclaimer in the documentation and/or other materials provided
 *    with the distribution.
 *
 * 3. The name of the author may not be used to endorse or promote
 *    products derived from this software without specific prior
 *    written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 * GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER
 * IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN
 * IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

namespace SimpleJWT\Crypt\Signature;

use SimpleJWT\Crypt\BaseAlgorithm;
use SimpleJWT\Util\Util;

/**
 * Abstract class for SHA2-based signature algorithms.
 */
abstract class SHA2 extends BaseAlgorithm implements SignatureAlgorithm {
    /** @var int the length, in bits, of the SHA-2 hash */
    protected $size;

    /**
     * Creates an instance of this algorithm.
     * 
     * @param ?string $alg the algorithm
     * @param ?int $size the length, in bits, of the SHA-2 hash
     */
    protected function __construct($alg, $size) {
        parent::__construct($alg);
        $this->size = $size;
    }

    public function shortHash($data) {
        $hash = hash('sha' . $this->size, $data, true);
        $short = substr($hash, 0, $this->size / 16);
        return Util::base64url_encode($short);
    }
}

?>
