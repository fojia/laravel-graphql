<?php
declare(strict_types=1);

namespace App\GraphQL\Scalars;

use Carbon\Carbon;
use GraphQL\Type\Definition\CustomScalarType;
use GraphQL\Type\Definition\ScalarType;
use GraphQL\Language\AST\StringValueNode;
use GraphQL\Error\Error;

class DateTimeType extends ScalarType
{
    /**
     * @var string
     */
    public $name = 'DateTimeType';
    /**
     * @var string
     */
    public $description = 'DateTime scalar type';

    /**
     * Format display of datas
     *
     * @var
     */
    public $format;

    /**
     * Return data object or string
     *
     * @var bool
     */
    public $isObject = false;


    public function __construct($config = [])
    {
        if (isset($config['format'])) {
            $this->format = $config['format'];
        }
        if (isset($config['object'])) {
            $this->isObject = $config['object'];
        }
        parent::__construct($config);

    }

    /**
     * @param mixed $value
     *
     * @return mixed
     */
    public function serialize($value)
    {
        $date = Carbon::parse($value);
        if ($this->format) {
            return $date->format($this->format);
        }
        if ($this->isObject) {
            return $date->toDate();
        }

        return $date->format('Y-m-d H:i:s');
    }

    /**
     * @param mixed $value
     *
     * @return string
     */
    public function parseValue($value): string
    {

        return $value;
    }

    /**
     * @param \GraphQL\Language\AST\Node $valueNode
     * @param array|null                 $variables
     *
     * @return mixed
     * @throws Error
     */
    public function parseLiteral($valueNode, ?array $variables = null)
    {
        if (!$valueNode instanceof StringValueNode) {
            throw new Error('Query error: Can only parse strings got: ' . $valueNode->kind, [$valueNode]);
        }

        return $valueNode->value;
    }

    /**
     * @return DateTimeType
     */
    public function toType(): DateTimeType
    {
        return new static();
    }
}
