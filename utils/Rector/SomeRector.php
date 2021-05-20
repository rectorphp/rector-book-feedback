<?php

declare(strict_types=1);

namespace Utils\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PHPStan\Type\ObjectType;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

final class SomeRector extends AbstractRector
{
    public function getRuleDefinition(): RuleDefinition
    {
    }

    public function getNodeTypes(): array
    {
        return [MethodCall::class];
    }

    /**
     * @param MethodCall $node
     */
    public function refactor(Node $node)
    {
        // does class exist?
        var_dump(class_exists('Symfony\Component\HttpFoundation\Request', false));

        if (! $this->isObjectType($node->var, new ObjectType('Symfony\Component\HttpFoundation\Request'))) {
            return null;
        }

        $node->name = 'changed';
        return $node;
    }
}
