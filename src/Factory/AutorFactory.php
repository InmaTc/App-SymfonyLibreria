<?php

namespace App\Factory;

use App\Entity\Autor;
use App\Repository\AutorRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Autor>
 *
 * @method static Autor|Proxy createOne(array $attributes = [])
 * @method static Autor[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Autor|Proxy find(object|array|mixed $criteria)
 * @method static Autor|Proxy findOrCreate(array $attributes)
 * @method static Autor|Proxy first(string $sortedField = 'id')
 * @method static Autor|Proxy last(string $sortedField = 'id')
 * @method static Autor|Proxy random(array $attributes = [])
 * @method static Autor|Proxy randomOrCreate(array $attributes = [])
 * @method static Autor[]|Proxy[] all()
 * @method static Autor[]|Proxy[] findBy(array $attributes)
 * @method static Autor[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Autor[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static AutorRepository|RepositoryProxy repository()
 * @method Autor|Proxy create(array|callable $attributes = [])
 */
final class AutorFactory extends ModelFactory
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
            'nombre' => self::faker()->firstName(),
            'apellidos' => self::faker()->lastName() . ' ' . self::faker()->lastName(),
            'esNacional' => self::faker()->boolean() ? 1 : 0,
            'fechaNacimiento' => self::faker()->dateTimeBetween('-200 years'),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Autor $autor): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Autor::class;
    }
}
