<?php

namespace ContainerABUby6w;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/src/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder8f461 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer3e3da = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties74406 = [
        
    ];

    public function getConnection()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'getConnection', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'getMetadataFactory', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'getExpressionBuilder', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'beginTransaction', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'getCache', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->getCache();
    }

    public function transactional($func)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'transactional', array('func' => $func), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'wrapInTransaction', array('func' => $func), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'commit', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->commit();
    }

    public function rollback()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'rollback', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'getClassMetadata', array('className' => $className), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'createQuery', array('dql' => $dql), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'createNamedQuery', array('name' => $name), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'createQueryBuilder', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'flush', array('entity' => $entity), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'clear', array('entityName' => $entityName), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->clear($entityName);
    }

    public function close()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'close', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->close();
    }

    public function persist($entity)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'persist', array('entity' => $entity), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'remove', array('entity' => $entity), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'refresh', array('entity' => $entity), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'detach', array('entity' => $entity), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'merge', array('entity' => $entity), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'getRepository', array('entityName' => $entityName), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'contains', array('entity' => $entity), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'getEventManager', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'getConfiguration', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'isOpen', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'getUnitOfWork', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'getProxyFactory', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'initializeObject', array('obj' => $obj), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'getFilters', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'isFiltersStateClean', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'hasFilters', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return $this->valueHolder8f461->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer3e3da = $initializer;

        return $instance;
    }

    public function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config)
    {
        static $reflection;

        if (! $this->valueHolder8f461) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder8f461 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder8f461->__construct($conn, $config);
    }

    public function & __get($name)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, '__get', ['name' => $name], $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        if (isset(self::$publicProperties74406[$name])) {
            return $this->valueHolder8f461->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8f461;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder8f461;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8f461;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder8f461;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, '__isset', array('name' => $name), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8f461;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder8f461;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, '__unset', array('name' => $name), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8f461;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder8f461;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, '__clone', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        $this->valueHolder8f461 = clone $this->valueHolder8f461;
    }

    public function __sleep()
    {
        $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, '__sleep', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;

        return array('valueHolder8f461');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer3e3da = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer3e3da;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer3e3da && ($this->initializer3e3da->__invoke($valueHolder8f461, $this, 'initializeProxy', array(), $this->initializer3e3da) || 1) && $this->valueHolder8f461 = $valueHolder8f461;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder8f461;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder8f461;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
