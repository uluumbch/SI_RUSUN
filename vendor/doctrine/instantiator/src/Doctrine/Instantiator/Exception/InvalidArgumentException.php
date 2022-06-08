<?php

namespace Doctrine\Instantiator\Exception;

use InvalidArgumentException as BaseInvalidArgumentException;
use ReflectionClass;

use function interface_exists;
use function sprintf;
use function trait_exists;

/**
 * Exception for invalid arguments provided to the instantiator
 */
class InvalidArgumentException extends BaseInvalidArgumentException implements ExceptionInterface
{
    public static function fromNonExistingClass(string $className): self
    {
        if (interface_exists($className)) {
<<<<<<< HEAD
            return new self(sprintf('The provided type "%s" is an interface, and cannot be instantiated', $className));
        }

        if (trait_exists($className)) {
            return new self(sprintf('The provided type "%s" is a trait, and cannot be instantiated', $className));
=======
            return new self(sprintf('The provided type "%s" is an interface, and can not be instantiated', $className));
        }

        if (trait_exists($className)) {
            return new self(sprintf('The provided type "%s" is a trait, and can not be instantiated', $className));
>>>>>>> 44ccf595db7c3c3c71635086dad7d6c5b6625f30
        }

        return new self(sprintf('The provided class "%s" does not exist', $className));
    }

    /**
<<<<<<< HEAD
     * @phpstan-param ReflectionClass<T> $reflectionClass
     *
     * @template T of object
=======
     * @template T of object
     * @phpstan-param ReflectionClass<T> $reflectionClass
>>>>>>> 44ccf595db7c3c3c71635086dad7d6c5b6625f30
     */
    public static function fromAbstractClass(ReflectionClass $reflectionClass): self
    {
        return new self(sprintf(
<<<<<<< HEAD
            'The provided class "%s" is abstract, and cannot be instantiated',
            $reflectionClass->getName()
        ));
    }

    public static function fromEnum(string $className): self
    {
        return new self(sprintf(
            'The provided class "%s" is an enum, and cannot be instantiated',
            $className
        ));
    }
=======
            'The provided class "%s" is abstract, and can not be instantiated',
            $reflectionClass->getName()
        ));
    }
>>>>>>> 44ccf595db7c3c3c71635086dad7d6c5b6625f30
}
