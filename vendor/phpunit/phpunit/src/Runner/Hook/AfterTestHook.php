<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner;

/**
<<<<<<< HEAD
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
=======
 * This interface, as well as the associated mechanism for extending PHPUnit,
 * will be removed in PHPUnit 10. There is no alternative available in this
 * version of PHPUnit.
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @see https://github.com/sebastianbergmann/phpunit/issues/4676
>>>>>>> 44ccf595db7c3c3c71635086dad7d6c5b6625f30
 */
interface AfterTestHook extends TestHook
{
    /**
     * This hook will fire after any test, regardless of the result.
     *
     * For more fine grained control, have a look at the other hooks
     * that extend PHPUnit\Runner\Hook.
     */
    public function executeAfterTest(string $test, float $time): void;
}
