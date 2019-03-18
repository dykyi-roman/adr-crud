<?php
/**
 * PHP file.
 *
 * @category   Web-project
 * @package    Booi
 * @subpackage Null
 * @author     PHP Developer <developer@email.com>
 * @license    https://www.booi.com Booi
 * @version    1.0.0
 * @link       ****
 * @since      1.0.0
 */

namespace App\Domain\VO;

use Immutable\ValueObject\ValueObject;

final class Age extends ValueObject
{
    /**
     * Variable
     *
     * @var int |
     */
    protected $age;

    /**
     * Age constructor.
     *
     * @param int $age
     *
     * @throws \Immutable\Exception\ImmutableObjectException
     */
    public function __construct(int $age)
    {
        $this->withChanged($age);
        parent::__construct();
    }

    /**
     * @param int $age
     *
     * @return ValueObject
     * @throws \Immutable\Exception\ImmutableObjectException
     */
    public function withChanged(int $age): ValueObject
    {
        if ($age <= 0 && $age > 150) {
            throw new \RuntimeException('Age is not valid');
        }

        return $this->with([
            'age' => $age,
        ]);
    }
}
