<?php

namespace App\Factory;

use App\Entity\Socio;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Socio>
 *
 * @method static Socio|Proxy createOne(array $attributes = [])
 * @method static Socio[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Socio|Proxy find(object|array|mixed $criteria)
 * @method static Socio|Proxy findOrCreate(array $attributes)
 * @method static Socio|Proxy first(string $sortedField = 'id')
 * @method static Socio|Proxy last(string $sortedField = 'id')
 * @method static Socio|Proxy random(array $attributes = [])
 * @method static Socio|Proxy randomOrCreate(array $attributes = [])
 * @method static Socio[]|Proxy[] all()
 * @method static Socio[]|Proxy[] findBy(array $attributes)
 * @method static Socio[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Socio[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method Socio|Proxy create(array|callable $attributes = [])
 */
final class SocioFactory extends ModelFactory
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
            'nombre' => self::faker()->text(),
            'apellidos' => self::faker()->text(),
            'estudiante' => self::faker()->boolean(),
            'docente' => self::faker()->boolean(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Socio $socio): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Socio::class;
    }
}
