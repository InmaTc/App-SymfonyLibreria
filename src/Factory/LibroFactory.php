<?php

namespace App\Factory;

use App\Entity\Libro;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Libro>
 *
 * @method static Libro|Proxy createOne(array $attributes = [])
 * @method static Libro[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Libro|Proxy find(object|array|mixed $criteria)
 * @method static Libro|Proxy findOrCreate(array $attributes)
 * @method static Libro|Proxy first(string $sortedField = 'id')
 * @method static Libro|Proxy last(string $sortedField = 'id')
 * @method static Libro|Proxy random(array $attributes = [])
 * @method static Libro|Proxy randomOrCreate(array $attributes = [])
 * @method static Libro[]|Proxy[] all()
 * @method static Libro[]|Proxy[] findBy(array $attributes)
 * @method static Libro[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Libro[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method Libro|Proxy create(array|callable $attributes = [])
 */
final class LibroFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'titulo' => self::faker()->text(50),
            'anioPublicacion' => self::faker()->dateTimeBetween('-100years'),
            'isbn' => self::faker()->isbn10(),
            'sinopsis' => self::faker()->text(),
            'precioCompra' => self::faker()->numberBetween(400,8000),
            'paginas' => self::faker()->boolean(90) ? self::faker()->numberBetween(60,800) : null,
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Libro $libro): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Libro::class;
    }
}
