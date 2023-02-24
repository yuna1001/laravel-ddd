<?php

namespace App\Domain;

use App\Traits\ImmutableTrait;

/**
 * エンティティ基底クラス
 */
abstract class Entity
{
    use ImmutableTrait;

    /**
     * IDクラス
     *
     * @var Id
     */
    protected Id $id;

    /**
     * エンティティの等価性を検証します．
     *
     * @param Entity $entity
     * @return bool
     */
    public function equals(Entity $entity): bool
    {
        return ($entity instanceof $this || $this instanceof $entity) // エンティティのデータ型の等価性
            && $this->id->equals($entity->id); // IDオブジェクトの等価性
    }
}
