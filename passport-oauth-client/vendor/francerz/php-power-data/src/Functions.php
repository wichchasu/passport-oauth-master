<?php

namespace Francerz\PowerData;

use ReflectionFunction;

class Functions
{
    public static function testSignature(callable $function, array $args = [], ?string $retType = 'void', ?string $name = null) : bool
    {
        $rf = new ReflectionFunction($function);
        $params = $rf->getParameters();
        if (count($params) != count($args)) {
            return false;
        }
        foreach ($args as $i => $argType) {
            $paramType = $params[$i]->getType()->getName();
            if ($paramType === $argType) continue;
            if (class_exists($paramType) && is_subclass_of($paramType, $argType)) {
                continue;
            }
            return false;
        }
        $rt = $rf->getReturnType();
        if ($retType !== 'void') {
            if ($rt == null) {
                return false;
            }
            $rtName = $rt->getName();
            if ($rtName !== $retType) {
                $return = false;
                if (class_exists($rtName) && is_subclass_of($rtName, $retType)) {
                    $return = true;
                }
                if (!$return) return false;
            }
        } elseif ($rt != null) {
            return false;
        }
        if (isset($name) && $rf->getName() !== $name) {
            return false;
        }
        return true;
    }
}