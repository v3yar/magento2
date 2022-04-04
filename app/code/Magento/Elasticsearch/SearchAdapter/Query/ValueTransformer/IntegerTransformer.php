<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Elasticsearch\SearchAdapter\Query\ValueTransformer;

use Magento\Elasticsearch\SearchAdapter\Query\ValueTransformerInterface;

/**
 * Value transformer for integer type fields.
 */
class IntegerTransformer implements ValueTransformerInterface
{
    /**
     * @inheritdoc
     */
    public function transform(string $value): ?int
    {
        return (\is_numeric($value) &&
            $this->validateIntegerTypesWithInRange($value)) ? (int) $value : null;
    }

    /**
     * @param $value
     * @return bool
     */
    public function validateIntegerTypesWithInRange($value): bool
    {
        return (abs($value) & 0x7FFFFFFF) === abs($value);
    }
}
