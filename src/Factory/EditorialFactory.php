<?php

namespace App\Factory;

use App\Entity\Editorial;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Editorial>
 *
 * @method static Editorial|Proxy createOne(array $attributes = [])
 * @method static Editorial[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Editorial|Proxy find(object|array|mixed $criteria)
 * @method static Editorial|Proxy findOrCreate(array $attributes)
 * @method static Editorial|Proxy first(string $sortedField = 'id')
 * @method static Editorial|Proxy last(string $sortedField = 'id')
 * @method static Editorial|Proxy random(array $attributes = [])
 * @method static Editorial|Proxy randomOrCreate(array $attributes = [])
 * @method static Editorial[]|Proxy[] all()
 * @method static Editorial[]|Proxy[] findBy(array $attributes)
 * @method static Editorial[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Editorial[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method Editorial|Proxy create(array|callable $attributes = [])
 */
final class EditorialFactory extends ModelFactory
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
            'nombre' => self::faker()->text(20),
            'cif' => self::faker()->vat(),
            'direccionPostal' => self::faker()->boolean ? self::faker()->address() : null
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Editorial $editorial): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Editorial::class;
    }
}
