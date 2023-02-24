<?php

namespace App\Domain;

use App\Traits\ImmutableTrait;

/**
 * 値オブジェクト基底クラス
 */
abstract class ValueObject
{
    use ImmutableTrait;

    /**
     * 値オブジェクトの等価性を検証します．
     *
     * @param ValueObject $VO
     * @return bool
     */
    public function equals(ValueObject $VO): bool
    {
        // 全ての属性を反復的に検証します．
        foreach (get_object_vars($this) as $key => $value) {
            if ($this->$key() !== $VO->$key()) {
                return false;
            }
        }

        return true;
    }
}
