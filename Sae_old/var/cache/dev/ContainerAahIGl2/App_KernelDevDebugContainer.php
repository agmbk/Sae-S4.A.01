<?php

namespace ContainerAahIGl2;

use Closure;
use Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension;
use EmptyIterator;
use Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener;
use Sensio\Bundle\FrameworkExtraBundle\EventListener\IsGrantedListener;
use Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener;
use Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener;
use Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener;
use Sensio\Bundle\FrameworkExtraBundle\Request\ArgumentNameConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager;
use Sensio\Bundle\FrameworkExtraBundle\Security\ExpressionLanguage;
use Sensio\Bundle\FrameworkExtraBundle\Templating\TemplateGuesser;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Bridge\Twig\AppVariable;
use Symfony\Bridge\Twig\Extension\AssetExtension;
use Symfony\Bridge\Twig\Extension\CodeExtension;
use Symfony\Bridge\Twig\Extension\CsrfExtension;
use Symfony\Bridge\Twig\Extension\DumpExtension;
use Symfony\Bridge\Twig\Extension\ExpressionExtension;
use Symfony\Bridge\Twig\Extension\FormExtension;
use Symfony\Bridge\Twig\Extension\HttpFoundationExtension;
use Symfony\Bridge\Twig\Extension\HttpKernelExtension;
use Symfony\Bridge\Twig\Extension\LogoutUrlExtension;
use Symfony\Bridge\Twig\Extension\ProfilerExtension;
use Symfony\Bridge\Twig\Extension\RoutingExtension;
use Symfony\Bridge\Twig\Extension\SecurityExtension;
use Symfony\Bridge\Twig\Extension\SerializerExtension;
use Symfony\Bridge\Twig\Extension\StopwatchExtension;
use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Bridge\Twig\Extension\WebLinkExtension;
use Symfony\Bridge\Twig\Extension\YamlExtension;
use Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver;
use Symfony\Bundle\FrameworkBundle\DependencyInjection\Compiler\AddDebugLogProcessorPass;
use Symfony\Bundle\SecurityBundle\Debug\TraceableFirewallListener;
use Symfony\Bundle\SecurityBundle\Security\FirewallMap;
use Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator;
use Symfony\Bundle\WebProfilerBundle\Csp\ContentSecurityPolicyHandler;
use Symfony\Bundle\WebProfilerBundle\Csp\NonceGenerator;
use Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener;
use Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension;
use Symfony\Component\Asset\Context\RequestStackContext;
use Symfony\Component\Asset\Packages;
use Symfony\Component\Asset\PathPackage;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Argument\ServiceLocator;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBag;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\UrlHelper;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver;
use Symfony\Component\HttpKernel\Controller\TraceableControllerResolver;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory;
use Symfony\Component\HttpKernel\DataCollector\DumpDataCollector;
use Symfony\Component\HttpKernel\Debug\FileLinkFormatter;
use Symfony\Component\HttpKernel\EventListener\DebugHandlersListener;
use Symfony\Component\HttpKernel\EventListener\ProfilerListener;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpKernel\EventListener\SessionListener;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManager;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Security\Core\Authorization\Strategy\AffirmativeStrategy;
use Symfony\Component\Security\Core\Authorization\TraceableAccessDecisionManager;
use Symfony\Component\Security\Core\Role\RoleHierarchy;
use Symfony\Component\Security\Http\EventListener\IsGrantedAttributeListener;
use Symfony\Component\Security\Http\Impersonate\ImpersonateUrlGenerator;
use Symfony\Component\Security\Http\Logout\LogoutUrlGenerator;
use Symfony\Component\Stopwatch\Stopwatch;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\ContextProvider\CliContextProvider;
use Symfony\Component\VarDumper\Dumper\ContextProvider\RequestContextProvider;
use Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\Server\Connection;
use Twig\Environment;
use Twig\Extra\TwigExtraBundle\MissingExtensionSuggestor;
use Twig\Loader\FilesystemLoader;
use Twig\Profiler\Profile;
use Twig\RuntimeLoader\ContainerRuntimeLoader;
use function dirname;
use const DIRECTORY_SEPARATOR;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class App_KernelDevDebugContainer extends Container
{
    protected $containerDir;
    protected $targetDir;
    protected $parameters = [];
    protected Closure $getService;
    private $buildParameters;
    private $loadedDynamicParameters = [
        'kernel.runtime_environment' => false,
        'kernel.build_dir' => false,
        'kernel.cache_dir' => false,
        'kernel.secret' => false,
        'debug.file_link_format' => false,
        'debug.container.dump' => false,
        'router.cache_dir' => false,
        'serializer.mapping.cache.file' => false,
        'session.save_path' => false,
        'validator.mapping.cache.file' => false,
        'profiler.storage.dsn' => false,
        'doctrine.orm.proxy_dir' => false,
    ];
    private $dynamicParameters = [];

    public function compile(): void
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled(): bool
    {
        return true;
    }

    public function getRemovedIds(): array
    {
        return require $this->containerDir . DIRECTORY_SEPARATOR . 'removed-ids.php';
    }

    public function hasParameter(string $name): bool
    {
        if (isset($this->buildParameters[$name])) {
            return true;
        }

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || \array_key_exists($name, $this->parameters);
    }

    public function getParameterBag(): ParameterBagInterface
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            foreach ($this->buildParameters as $name => $value) {
                $parameters[$name] = $value;
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private function getDynamicParameter(string $name)
    {
        $value = match ($name) {
            'kernel.runtime_environment' => $this->getEnv('default:kernel.environment:APP_RUNTIME_ENV'),
            'kernel.build_dir' => $this->targetDir . '',
            'kernel.cache_dir' => $this->targetDir . '',
            'kernel.secret' => $this->getEnv('APP_SECRET'),
            'debug.file_link_format' => $this->getEnv('default::SYMFONY_IDE'),
            'debug.container.dump' => ($this->targetDir . '' . '/App_KernelDevDebugContainer.xml'),
            'router.cache_dir' => $this->targetDir . '',
            'serializer.mapping.cache.file' => ($this->targetDir . '' . '/serialization.php'),
            'session.save_path' => ($this->targetDir . '' . '/sessions'),
            'validator.mapping.cache.file' => ($this->targetDir . '' . '/validation.php'),
            'profiler.storage.dsn' => ('file:' . $this->targetDir . '' . '/profiler'),
            'doctrine.orm.proxy_dir' => ($this->targetDir . '' . '/doctrine/orm/Proxies'),
            default => throw new ParameterNotFoundException($name),
        };
        $this->loadedDynamicParameters[$name] = true;

        return $this->dynamicParameters[$name] = $value;
    }

    /**
     * Gets the public '.container.private.profiler' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Profiler\Profiler
     */
    protected function get_Container_Private_ProfilerService()
    {
        $a = new Logger('profiler');
        $a->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $a->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $a->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        AddDebugLogProcessorPass::configureLogger($a);

        $this->services['.container.private.profiler'] = $instance = new \Symfony\Component\HttpKernel\Profiler\Profiler(new \Symfony\Component\HttpKernel\Profiler\FileProfilerStorage(('file:' . $this->targetDir . '' . '/profiler')), $a, true);

        $b = ($this->services['kernel'] ?? $this->get('kernel'));
        $c = ($this->services['request_stack'] ??= new RequestStack());
        $d = new \Symfony\Component\Cache\DataCollector\CacheDataCollector();
        $d->addInstance('cache.app', ($this->services['cache.app'] ?? $this->getCache_AppService()));
        $d->addInstance('cache.system', ($this->services['cache.system'] ?? $this->getCache_SystemService()));
        $d->addInstance('cache.validator', ($this->privates['cache.validator'] ?? $this->getCache_ValidatorService()));
        $d->addInstance('cache.serializer', ($this->privates['cache.serializer'] ?? $this->getCache_SerializerService()));
        $d->addInstance('cache.annotations', ($this->privates['cache.annotations'] ?? $this->getCache_AnnotationsService()));
        $d->addInstance('cache.property_info', ($this->privates['cache.property_info'] ?? $this->getCache_PropertyInfoService()));
        $d->addInstance('cache.messenger.restart_workers_signal', ($this->privates['cache.messenger.restart_workers_signal'] ?? $this->getCache_Messenger_RestartWorkersSignalService()));
        $d->addInstance('cache.validator_expression_language', ($this->services['cache.validator_expression_language'] ?? $this->getCache_ValidatorExpressionLanguageService()));
        $d->addInstance('cache.doctrine.orm.default.result', ($this->privates['cache.doctrine.orm.default.result'] ?? $this->getCache_Doctrine_Orm_Default_ResultService()));
        $d->addInstance('cache.doctrine.orm.default.query', ($this->privates['cache.doctrine.orm.default.query'] ?? $this->getCache_Doctrine_Orm_Default_QueryService()));
        $d->addInstance('cache.security_expression_language', ($this->privates['cache.security_expression_language'] ?? $this->getCache_SecurityExpressionLanguageService()));
        $d->addInstance('cache.security_is_granted_attribute_expression_language', ($this->services['cache.security_is_granted_attribute_expression_language'] ?? $this->getCache_SecurityIsGrantedAttributeExpressionLanguageService()));
        $e = new \Symfony\Component\HttpClient\DataCollector\HttpClientDataCollector();
        $e->registerClient('http_client', ($this->privates['.debug.http_client'] ?? $this->get_Debug_HttpClientService()));
        $f = new \Symfony\Component\Messenger\DataCollector\MessengerDataCollector();
        $f->registerBus('messenger.bus.default', ($this->services['messenger.default_bus'] ?? $this->getMessenger_DefaultBusService()));
        $g = new \Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector();
        if ($this->has('kernel')) {
            $g->setKernel($b);
        }

        $instance->add(($this->privates['data_collector.request'] ?? $this->getDataCollector_RequestService()));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\TimeDataCollector($b, ($this->privates['debug.stopwatch'] ??= new Stopwatch(true))));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\MemoryDataCollector());
        $instance->add(new \Symfony\Component\Validator\DataCollector\ValidatorDataCollector(($this->privates['debug.validator'] ?? $this->getDebug_ValidatorService())));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector());
        $instance->add(($this->privates['data_collector.form'] ?? $this->getDataCollector_FormService()));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\ExceptionDataCollector());
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\LoggerDataCollector($a, ($this->targetDir . '' . '/App_KernelDevDebugContainer'), $c));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\EventDataCollector(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), $c));
        $instance->add(($this->privates['data_collector.router'] ??= new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector()));
        $instance->add($d);
        $instance->add(new \Symfony\Component\Translation\DataCollector\TranslationDataCollector(($this->services['translator'] ?? $this->getTranslatorService())));
        $instance->add(new \Symfony\Bundle\SecurityBundle\DataCollector\SecurityDataCollector(($this->privates['security.untracked_token_storage'] ??= new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage()), ($this->privates['security.role_hierarchy'] ??= new RoleHierarchy([])), ($this->privates['security.logout_url_generator'] ?? $this->getSecurity_LogoutUrlGeneratorService()), ($this->privates['debug.security.access.decision_manager'] ?? $this->getDebug_Security_Access_DecisionManagerService()), ($this->privates['security.firewall.map'] ?? $this->getSecurity_Firewall_MapService()), ($this->privates['debug.security.firewall'] ?? $this->getDebug_Security_FirewallService())));
        $instance->add(new \Symfony\Bridge\Twig\DataCollector\TwigDataCollector(($this->privates['twig.profile'] ??= new Profile()), ($this->privates['twig'] ?? $this->getTwigService())));
        $instance->add($e);
        $instance->add(new \Doctrine\Bundle\DoctrineBundle\DataCollector\DoctrineDataCollector(($this->services['doctrine'] ?? $this->getDoctrineService()), true, ($this->privates['doctrine.debug_data_holder'] ??= new \Doctrine\Bundle\DoctrineBundle\Middleware\BacktraceDebugDataHolder([]))));
        $instance->add(($this->services['data_collector.dump'] ?? $this->getDataCollector_DumpService()));
        $instance->add($f);
        $instance->add(new \Symfony\Component\Mailer\DataCollector\MessageDataCollector(($this->privates['mailer.message_logger_listener'] ??= new \Symfony\Component\Mailer\EventListener\MessageLoggerListener())));
        $instance->add(new \Symfony\Component\Notifier\DataCollector\NotificationDataCollector(($this->privates['notifier.logger_notification_listener'] ??= new \Symfony\Component\Notifier\EventListener\NotificationLoggerListener())));
        $instance->add(($this->privates['serializer.data_collector'] ??= new \Symfony\Component\Serializer\DataCollector\SerializerDataCollector()));
        $instance->add($g);

        return $instance;
    }

    /**
     * Gets the private 'debug.log_processor' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Processor\DebugProcessor
     */
    protected function getDebug_LogProcessorService()
    {
        return $this->privates['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor(($this->services['request_stack'] ??= new RequestStack()));
    }

    /**
     * Gets the private 'monolog.handler.console' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Handler\ConsoleHandler
     */
    protected function getMonolog_Handler_ConsoleService()
    {
        return $this->privates['monolog.handler.console'] = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, true, [], []);
    }

    /**
     * Gets the private 'monolog.handler.main' shared service.
     *
     * @return \Monolog\Handler\StreamHandler
     */
    protected function getMonolog_Handler_MainService()
    {
        $this->privates['monolog.handler.main'] = $instance = new \Monolog\Handler\StreamHandler((dirname(__DIR__, 3) . '' . DIRECTORY_SEPARATOR . 'log/dev.log'), 100, true, NULL, false);

        $instance->pushProcessor(new \Monolog\Processor\PsrLogMessageProcessor());

        return $instance;
    }

    /**
     * Gets the public 'cache.app' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_AppService()
    {
        $a = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('O0SkgBFa+X', 0, ($this->targetDir . '' . '/pools/app'), ($this->privates['cache.default_marshaller'] ??= new \Symfony\Component\Cache\Marshaller\DefaultMarshaller(NULL, true)));
        $a->setLogger(($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));

        return $this->services['cache.app'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter($a);
    }

    /**
     * Gets the private 'monolog.logger.cache' shared service.
     *
     * @return Logger
     */
    protected function getMonolog_Logger_CacheService()
    {
        $this->privates['monolog.logger.cache'] = $instance = new Logger('cache');

        $instance->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        AddDebugLogProcessorPass::configureLogger($instance);

        return $instance;
    }

    /**
     * Gets the public 'cache.system' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SystemService()
    {
        return $this->services['cache.system'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('BzTzlDaolh', 0, $this->getParameter('container.build_id'), ($this->targetDir . '' . '/pools/system'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    public function getParameter(string $name): array|bool|string|int|float|\UnitEnum|null
    {
        if (isset($this->buildParameters[$name])) {
            return $this->buildParameters[$name];
        }

        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || \array_key_exists($name, $this->parameters))) {
            throw new ParameterNotFoundException($name);
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    /**
     * Gets the private 'cache.validator' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_ValidatorService()
    {
        return $this->privates['cache.validator'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('3EQFauFNQr', 0, $this->getParameter('container.build_id'), ($this->targetDir . '' . '/pools/system'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private 'cache.serializer' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SerializerService()
    {
        return $this->privates['cache.serializer'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('JXQSKeHRAI', 0, $this->getParameter('container.build_id'), ($this->targetDir . '' . '/pools/system'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private 'cache.annotations' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_AnnotationsService()
    {
        return $this->privates['cache.annotations'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('FqEBOdU0gR', 0, $this->getParameter('container.build_id'), ($this->targetDir . '' . '/pools/system'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private 'cache.property_info' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_PropertyInfoService()
    {
        return $this->privates['cache.property_info'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('c3ahWeGn72', 0, $this->getParameter('container.build_id'), ($this->targetDir . '' . '/pools/system'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private 'cache.messenger.restart_workers_signal' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_Messenger_RestartWorkersSignalService()
    {
        $a = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('M8E+auBYuT', 0, ($this->targetDir . '' . '/pools/app'), ($this->privates['cache.default_marshaller'] ??= new \Symfony\Component\Cache\Marshaller\DefaultMarshaller(NULL, true)));
        $a->setLogger(($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));

        return $this->privates['cache.messenger.restart_workers_signal'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter($a);
    }

    /**
     * Gets the public 'cache.validator_expression_language' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_ValidatorExpressionLanguageService()
    {
        return $this->services['cache.validator_expression_language'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('bhja8Qg3wL', 0, $this->getParameter('container.build_id'), ($this->targetDir . '' . '/pools/system'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private 'cache.doctrine.orm.default.result' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_Doctrine_Orm_Default_ResultService()
    {
        return $this->privates['cache.doctrine.orm.default.result'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(new \Symfony\Component\Cache\Adapter\ArrayAdapter());
    }

    /**
     * Gets the private 'cache.doctrine.orm.default.query' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_Doctrine_Orm_Default_QueryService()
    {
        return $this->privates['cache.doctrine.orm.default.query'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(new \Symfony\Component\Cache\Adapter\ArrayAdapter());
    }

    /**
     * Gets the private 'cache.security_expression_language' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SecurityExpressionLanguageService()
    {
        return $this->privates['cache.security_expression_language'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('1VHTzoH3CJ', 0, $this->getParameter('container.build_id'), ($this->targetDir . '' . '/pools/system'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the public 'cache.security_is_granted_attribute_expression_language' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SecurityIsGrantedAttributeExpressionLanguageService()
    {
        return $this->services['cache.security_is_granted_attribute_expression_language'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('+S1o-BwO7f', 0, $this->getParameter('container.build_id'), ($this->targetDir . '' . '/pools/system'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private '.debug.http_client' shared service.
     *
     * @return \Symfony\Component\HttpClient\TraceableHttpClient
     */
    protected function get_Debug_HttpClientService()
    {
        $a = \Symfony\Component\HttpClient\HttpClient::create([], 6);

        $b = new Logger('http_client');
        $b->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $b->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $b->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        AddDebugLogProcessorPass::configureLogger($b);

        $a->setLogger($b);

        return $this->privates['.debug.http_client'] = new \Symfony\Component\HttpClient\TraceableHttpClient($a, ($this->privates['debug.stopwatch'] ??= new Stopwatch(true)));
    }

    /**
     * Gets the public 'messenger.default_bus' shared service.
     *
     * @return \Symfony\Component\Messenger\TraceableMessageBus
     */
    protected function getMessenger_DefaultBusService()
    {
        return $this->services['messenger.default_bus'] = new \Symfony\Component\Messenger\TraceableMessageBus(new \Symfony\Component\Messenger\MessageBus(new RewindableGenerator(function () {
            yield 0 => ($this->privates['messenger.bus.default.middleware.traceable'] ?? $this->load('getMessenger_Bus_Default_Middleware_TraceableService'));
            yield 1 => ($this->privates['messenger.bus.default.middleware.add_bus_name_stamp_middleware'] ??= new \Symfony\Component\Messenger\Middleware\AddBusNameStampMiddleware('messenger.bus.default'));
            yield 2 => ($this->privates['messenger.middleware.reject_redelivered_message_middleware'] ??= new \Symfony\Component\Messenger\Middleware\RejectRedeliveredMessageMiddleware());
            yield 3 => ($this->privates['messenger.middleware.dispatch_after_current_bus'] ??= new \Symfony\Component\Messenger\Middleware\DispatchAfterCurrentBusMiddleware());
            yield 4 => ($this->privates['messenger.middleware.failed_message_processing_middleware'] ??= new \Symfony\Component\Messenger\Middleware\FailedMessageProcessingMiddleware());
            yield 5 => ($this->privates['messenger.bus.default.middleware.send_message'] ?? $this->load('getMessenger_Bus_Default_Middleware_SendMessageService'));
            yield 6 => ($this->privates['messenger.bus.default.middleware.handle_message'] ?? $this->load('getMessenger_Bus_Default_Middleware_HandleMessageService'));
        }, 7)));
    }

    protected function load($file, $lazyLoad = true)
    {
        if (class_exists($class = __NAMESPACE__ . '\\' . $file, false)) {
            return $class::do($this, $lazyLoad);
        }

        if ('.' === $file[-4]) {
            $class = substr($class, 0, -4);
        } else {
            $file .= '.php';
        }

        $service = require $this->containerDir . DIRECTORY_SEPARATOR . $file;

        return class_exists($class, false) ? $class::do($this, $lazyLoad) : $service;
    }

    /**
     * Gets the private 'data_collector.request' shared service.
     *
     * @return \Symfony\Component\HttpKernel\DataCollector\RequestDataCollector
     */
    protected function getDataCollector_RequestService()
    {
        return $this->privates['data_collector.request'] = new \Symfony\Component\HttpKernel\DataCollector\RequestDataCollector(($this->services['request_stack'] ??= new RequestStack()));
    }

    /**
     * Gets the private 'debug.validator' shared service.
     *
     * @return \Symfony\Component\Validator\Validator\TraceableValidator
     */
    protected function getDebug_ValidatorService()
    {
        $a = ($this->privates['validator.builder'] ?? $this->getValidator_BuilderService());

        if (isset($this->privates['debug.validator'])) {
            return $this->privates['debug.validator'];
        }

        return $this->privates['debug.validator'] = new \Symfony\Component\Validator\Validator\TraceableValidator($a->getValidator());
    }

    /**
     * Gets the private 'validator.builder' shared service.
     *
     * @return \Symfony\Component\Validator\ValidatorBuilder
     */
    protected function getValidator_BuilderService()
    {
        $this->privates['validator.builder'] = $instance = \Symfony\Component\Validator\Validation::createValidatorBuilder();

        $a = ($this->privates['property_info'] ?? $this->getPropertyInfoService());

        $instance->setConstraintValidatorFactory(new \Symfony\Component\Validator\ContainerConstraintValidatorFactory(new ServiceLocator($this->getService, [
            'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator' => ['privates', 'doctrine.orm.validator.unique', 'getDoctrine_Orm_Validator_UniqueService', true],
            'Symfony\\Component\\Security\\Core\\Validator\\Constraints\\UserPasswordValidator' => ['privates', 'security.validator.user_password', 'getSecurity_Validator_UserPasswordService', true],
            'Symfony\\Component\\Validator\\Constraints\\EmailValidator' => ['privates', 'validator.email', 'getValidator_EmailService', true],
            'Symfony\\Component\\Validator\\Constraints\\ExpressionValidator' => ['privates', 'validator.expression', 'getValidator_ExpressionService', true],
            'Symfony\\Component\\Validator\\Constraints\\NotCompromisedPasswordValidator' => ['privates', 'validator.not_compromised_password', 'getValidator_NotCompromisedPasswordService', true],
            'Symfony\\Component\\Validator\\Constraints\\WhenValidator' => ['privates', 'validator.when', 'getValidator_WhenService', true],
            'doctrine.orm.validator.unique' => ['privates', 'doctrine.orm.validator.unique', 'getDoctrine_Orm_Validator_UniqueService', true],
            'security.validator.user_password' => ['privates', 'security.validator.user_password', 'getSecurity_Validator_UserPasswordService', true],
            'validator.expression' => ['privates', 'validator.expression', 'getValidator_ExpressionService', true],
        ], [
            'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator' => '?',
            'Symfony\\Component\\Security\\Core\\Validator\\Constraints\\UserPasswordValidator' => '?',
            'Symfony\\Component\\Validator\\Constraints\\EmailValidator' => '?',
            'Symfony\\Component\\Validator\\Constraints\\ExpressionValidator' => '?',
            'Symfony\\Component\\Validator\\Constraints\\NotCompromisedPasswordValidator' => '?',
            'Symfony\\Component\\Validator\\Constraints\\WhenValidator' => '?',
            'doctrine.orm.validator.unique' => '?',
            'security.validator.user_password' => '?',
            'validator.expression' => '?',
        ])));
        if ($this->has('translator')) {
            $instance->setTranslator(($this->services['translator'] ?? $this->getTranslatorService()));
        }
        $instance->setTranslationDomain('validators');
        $instance->addXmlMappings([0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/config/validation.xml')]);
        $instance->enableAnnotationMapping(true);
        $instance->setDoctrineAnnotationReader(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()));
        $instance->addMethodMapping('loadValidatorMetadata');
        $instance->addObjectInitializers([0 => new \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer(($this->services['doctrine'] ?? $this->getDoctrineService()))]);
        $instance->addLoader(new \Symfony\Component\Validator\Mapping\Loader\PropertyInfoLoader($a, $a, $a, NULL));
        $instance->addLoader(new \Symfony\Bridge\Doctrine\Validator\DoctrineLoader(($this->services['doctrine.orm.default_entity_manager'] ?? $this->getDoctrine_Orm_DefaultEntityManagerService()), NULL));

        return $instance;
    }

    /**
     * Gets the private 'property_info' shared service.
     *
     * @return \Symfony\Component\PropertyInfo\PropertyInfoExtractor
     */
    protected function getPropertyInfoService()
    {
        return $this->privates['property_info'] = new \Symfony\Component\PropertyInfo\PropertyInfoExtractor(new RewindableGenerator(function () {
            yield 0 => ($this->privates['property_info.serializer_extractor'] ?? $this->load('getPropertyInfo_SerializerExtractorService'));
            yield 1 => ($this->privates['property_info.reflection_extractor'] ??= new \Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor());
            yield 2 => ($this->privates['doctrine.orm.default_entity_manager.property_info_extractor'] ?? $this->load('getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService'));
        }, 3), new RewindableGenerator(function () {
            yield 0 => ($this->privates['doctrine.orm.default_entity_manager.property_info_extractor'] ?? $this->load('getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService'));
            yield 1 => ($this->privates['property_info.phpstan_extractor'] ??= new \Symfony\Component\PropertyInfo\Extractor\PhpStanExtractor());
            yield 2 => ($this->privates['property_info.php_doc_extractor'] ??= new \Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor());
            yield 3 => ($this->privates['property_info.reflection_extractor'] ??= new \Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor());
        }, 4), new RewindableGenerator(function () {
            yield 0 => ($this->privates['property_info.php_doc_extractor'] ??= new \Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor());
        }, 1), new RewindableGenerator(function () {
            yield 0 => ($this->privates['doctrine.orm.default_entity_manager.property_info_extractor'] ?? $this->load('getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService'));
            yield 1 => ($this->privates['property_info.reflection_extractor'] ??= new \Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor());
        }, 2), new RewindableGenerator(function () {
            yield 0 => ($this->privates['property_info.reflection_extractor'] ??= new \Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor());
        }, 1));
    }

    /**
     * Gets the public 'translator' shared service.
     *
     * @return \Symfony\Component\Translation\DataCollectorTranslator
     */
    protected function getTranslatorService()
    {
        return $this->services['translator'] = new \Symfony\Component\Translation\DataCollectorTranslator(($this->privates['translator.default'] ?? $this->getTranslator_DefaultService()));
    }

    /**
     * Gets the private 'translator.default' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\Translator
     */
    protected function getTranslator_DefaultService()
    {
        $this->privates['translator.default'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\Translator(new ServiceLocator($this->getService, [
            'translation.loader.csv' => ['privates', 'translation.loader.csv', 'getTranslation_Loader_CsvService', true],
            'translation.loader.dat' => ['privates', 'translation.loader.dat', 'getTranslation_Loader_DatService', true],
            'translation.loader.ini' => ['privates', 'translation.loader.ini', 'getTranslation_Loader_IniService', true],
            'translation.loader.json' => ['privates', 'translation.loader.json', 'getTranslation_Loader_JsonService', true],
            'translation.loader.mo' => ['privates', 'translation.loader.mo', 'getTranslation_Loader_MoService', true],
            'translation.loader.php' => ['privates', 'translation.loader.php', 'getTranslation_Loader_PhpService', true],
            'translation.loader.po' => ['privates', 'translation.loader.po', 'getTranslation_Loader_PoService', true],
            'translation.loader.qt' => ['privates', 'translation.loader.qt', 'getTranslation_Loader_QtService', true],
            'translation.loader.res' => ['privates', 'translation.loader.res', 'getTranslation_Loader_ResService', true],
            'translation.loader.xliff' => ['privates', 'translation.loader.xliff', 'getTranslation_Loader_XliffService', true],
            'translation.loader.yml' => ['privates', 'translation.loader.yml', 'getTranslation_Loader_YmlService', true],
        ], [
            'translation.loader.csv' => '?',
            'translation.loader.dat' => '?',
            'translation.loader.ini' => '?',
            'translation.loader.json' => '?',
            'translation.loader.mo' => '?',
            'translation.loader.php' => '?',
            'translation.loader.po' => '?',
            'translation.loader.qt' => '?',
            'translation.loader.res' => '?',
            'translation.loader.xliff' => '?',
            'translation.loader.yml' => '?',
        ]), new \Symfony\Component\Translation\Formatter\MessageFormatter(new \Symfony\Component\Translation\IdentityTranslator()), 'en', ['translation.loader.php' => [0 => 'php'], 'translation.loader.yml' => [0 => 'yaml', 1 => 'yml'], 'translation.loader.xliff' => [0 => 'xlf', 1 => 'xliff'], 'translation.loader.po' => [0 => 'po'], 'translation.loader.mo' => [0 => 'mo'], 'translation.loader.qt' => [0 => 'ts'], 'translation.loader.csv' => [0 => 'csv'], 'translation.loader.res' => [0 => 'res'], 'translation.loader.dat' => [0 => 'dat'], 'translation.loader.ini' => [0 => 'ini'], 'translation.loader.json' => [0 => 'json']], ['cache_dir' => ($this->targetDir . '' . '/translations'), 'debug' => true, 'resource_files' => ['af' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.af.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.af.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.af.xlf')], 'ar' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.ar.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.ar.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.ar.xlf')], 'az' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.az.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.az.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.az.xlf')], 'be' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.be.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.be.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.be.xlf')], 'bg' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.bg.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.bg.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.bg.xlf')], 'bs' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.bs.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.bs.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.bs.xlf')], 'ca' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.ca.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.ca.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.ca.xlf')], 'cs' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.cs.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.cs.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.cs.xlf')], 'cy' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.cy.xlf')], 'da' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.da.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.da.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.da.xlf')], 'de' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.de.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.de.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.de.xlf')], 'el' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.el.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.el.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.el.xlf')], 'en' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.en.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.en.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.en.xlf')], 'es' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.es.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.es.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.es.xlf')], 'et' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.et.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.et.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.et.xlf')], 'eu' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.eu.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.eu.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.eu.xlf')], 'fa' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.fa.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.fa.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.fa.xlf')], 'fi' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.fi.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.fi.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.fi.xlf')], 'fr' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.fr.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.fr.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.fr.xlf')], 'gl' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.gl.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.gl.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.gl.xlf')], 'he' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.he.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.he.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.he.xlf')], 'hr' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.hr.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.hr.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.hr.xlf')], 'hu' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.hu.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.hu.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.hu.xlf')], 'hy' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.hy.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.hy.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.hy.xlf')], 'id' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.id.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.id.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.id.xlf')], 'it' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.it.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.it.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.it.xlf')], 'ja' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.ja.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.ja.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.ja.xlf')], 'lb' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.lb.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.lb.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.lb.xlf')], 'lt' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.lt.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.lt.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.lt.xlf')], 'lv' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.lv.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.lv.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.lv.xlf')], 'mn' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.mn.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.mn.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.mn.xlf')], 'my' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.my.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.my.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.my.xlf')], 'nb' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.nb.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.nb.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.nb.xlf')], 'nl' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.nl.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.nl.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.nl.xlf')], 'nn' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.nn.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.nn.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.nn.xlf')], 'no' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.no.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.no.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.no.xlf')], 'pl' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.pl.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.pl.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.pl.xlf')], 'pt' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.pt.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.pt.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.pt.xlf')], 'pt_BR' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.pt_BR.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.pt_BR.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.pt_BR.xlf')], 'ro' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.ro.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.ro.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.ro.xlf')], 'ru' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.ru.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.ru.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.ru.xlf')], 'sk' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.sk.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.sk.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.sk.xlf')], 'sl' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.sl.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.sl.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.sl.xlf')], 'sq' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.sq.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.sq.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.sq.xlf')], 'sr_Cyrl' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.sr_Cyrl.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.sr_Cyrl.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.sr_Cyrl.xlf')], 'sr_Latn' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.sr_Latn.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.sr_Latn.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.sr_Latn.xlf')], 'sv' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.sv.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.sv.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.sv.xlf')], 'th' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.th.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.th.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.th.xlf')], 'tl' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.tl.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.tl.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.tl.xlf')], 'tr' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.tr.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.tr.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.tr.xlf')], 'uk' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.uk.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.uk.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.uk.xlf')], 'ur' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.ur.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.ur.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.ur.xlf')], 'uz' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.uz.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.uz.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.uz.xlf')], 'vi' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.vi.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.vi.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.vi.xlf')], 'zh_CN' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.zh_CN.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.zh_CN.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.zh_CN.xlf')], 'zh_TW' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.zh_TW.xlf'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations' . DIRECTORY_SEPARATOR . 'validators.zh_TW.xlf'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations' . DIRECTORY_SEPARATOR . 'security.zh_TW.xlf')]], 'scanned_directories' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations'), 3 => (dirname(__DIR__, 4) . '/translations'), 4 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'framework-bundle/translations'), 5 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle/translations'), 6 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-migrations-bundle/translations'), 7 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'debug-bundle/translations'), 8 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bundle/translations'), 9 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'web-profiler-bundle/translations'), 10 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'extra-bundle/translations'), 11 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-bundle/translations'), 12 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'monolog-bundle/translations'), 13 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'maker-bundle' . DIRECTORY_SEPARATOR . 'src/translations'), 14 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src/translations')], 'cache_vary' => ['scanned_directories' => [0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator/Resources/translations'), 1 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form/Resources/translations'), 2 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core/Resources/translations'), 3 => 'translations', 4 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'framework-bundle/translations'), 5 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle/translations'), 6 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-migrations-bundle/translations'), 7 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'debug-bundle/translations'), 8 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bundle/translations'), 9 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'web-profiler-bundle/translations'), 10 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'extra-bundle/translations'), 11 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-bundle/translations'), 12 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'monolog-bundle/translations'), 13 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'maker-bundle' . DIRECTORY_SEPARATOR . 'src/translations'), 14 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src/translations')]]], []);

        $instance->setConfigCacheFactory(($this->privates['config_cache_factory'] ?? $this->getConfigCacheFactoryService()));
        $instance->setFallbackLocales([0 => 'en']);

        return $instance;
    }

    /**
     * Gets the private 'config_cache_factory' shared service.
     *
     * @return \Symfony\Component\Config\ResourceCheckerConfigCacheFactory
     */
    protected function getConfigCacheFactoryService()
    {
        return $this->privates['config_cache_factory'] = new \Symfony\Component\Config\ResourceCheckerConfigCacheFactory(new RewindableGenerator(function () {
            yield 0 => ($this->privates['dependency_injection.config.container_parameters_resource_checker'] ??= new \Symfony\Component\DependencyInjection\Config\ContainerParametersResourceChecker($this));
            yield 1 => ($this->privates['config.resource.self_checking_resource_checker'] ??= new \Symfony\Component\Config\Resource\SelfCheckingResourceChecker());
        }, 2));
    }

    /**
     * Gets the private 'annotations.cached_reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\PsrCachedReader
     */
    protected function getAnnotations_CachedReaderService()
    {
        return $this->privates['annotations.cached_reader'] = new \Doctrine\Common\Annotations\PsrCachedReader(($this->privates['annotations.reader'] ?? $this->getAnnotations_ReaderService()), $this->getAnnotations_CacheAdapterService(), true);
    }

    /**
     * Gets the private 'annotations.reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\AnnotationReader
     */
    protected function getAnnotations_ReaderService()
    {
        $this->privates['annotations.reader'] = $instance = new \Doctrine\Common\Annotations\AnnotationReader();

        $a = new \Doctrine\Common\Annotations\AnnotationRegistry();
        $a->registerUniqueLoader('class_exists');

        $instance->addGlobalIgnoredName('required', $a);

        return $instance;
    }

    /**
     * Gets the private 'annotations.cache_adapter' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\PhpArrayAdapter
     */
    protected function getAnnotations_CacheAdapterService()
    {
        return \Symfony\Component\Cache\Adapter\PhpArrayAdapter::create(($this->targetDir . '' . '/annotations.php'), ($this->privates['cache.annotations'] ?? $this->getCache_AnnotationsService()));
    }

    /**
     * Gets the public 'doctrine' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected function getDoctrineService()
    {
        return $this->services['doctrine'] = new \Doctrine\Bundle\DoctrineBundle\Registry($this, $this->parameters['doctrine.connections'], $this->parameters['doctrine.entity_managers'], 'default', 'default');
    }

    /**
     * Gets the public 'doctrine.orm.default_entity_manager' shared service.
     *
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getDoctrine_Orm_DefaultEntityManagerService($lazyLoad = true)
    {
        if (true === $lazyLoad) {
            return $this->services['doctrine.orm.default_entity_manager'] = $this->createProxy('EntityManagerGhost51e8656', fn() => \EntityManagerGhost51e8656::createLazyGhost($this->getDoctrine_Orm_DefaultEntityManagerService(...)));
        }

        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Proxy' . DIRECTORY_SEPARATOR . 'Autoloader.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Proxy' . DIRECTORY_SEPARATOR . 'Autoloader.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'persistence' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Persistence' . DIRECTORY_SEPARATOR . 'ObjectManager.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'EntityManagerInterface.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'EntityManager.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Configuration.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'MappingDriver.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'persistence' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Persistence' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Driver' . DIRECTORY_SEPARATOR . 'MappingDriverChain.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'NamingStrategy.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'UnderscoreNamingStrategy.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'QuoteStrategy.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Internal' . DIRECTORY_SEPARATOR . 'SQLResultCasing.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'DefaultQuoteStrategy.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'EntityListenerResolver.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'EntityListenerServiceResolver.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'ContainerEntityListenerResolver.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'RepositoryFactory.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle' . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'ContainerRepositoryFactory.php';
        include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle' . DIRECTORY_SEPARATOR . 'ManagerConfigurator.php';

        $a = new \Doctrine\ORM\Configuration();

        $b = new \Doctrine\Persistence\Mapping\Driver\MappingDriverChain();
        $b->addDriver(($this->privates['doctrine.orm.default_attribute_metadata_driver'] ??= new \Doctrine\ORM\Mapping\Driver\AttributeDriver([0 => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Entity')])), 'App\\Entity');

        $a->setEntityNamespaces(['App' => 'App\\Entity']);
        $a->setMetadataCache(new \Symfony\Component\Cache\Adapter\ArrayAdapter());
        $a->setQueryCache(($this->privates['cache.doctrine.orm.default.query'] ?? $this->getCache_Doctrine_Orm_Default_QueryService()));
        $a->setResultCache(($this->privates['cache.doctrine.orm.default.result'] ?? $this->getCache_Doctrine_Orm_Default_ResultService()));
        $a->setMetadataDriverImpl(new \Doctrine\Bundle\DoctrineBundle\Mapping\MappingDriver($b, new ServiceLocator($this->getService, [
            'doctrine.ulid_generator' => ['privates', 'doctrine.ulid_generator', 'getDoctrine_UlidGeneratorService', true],
            'doctrine.uuid_generator' => ['privates', 'doctrine.uuid_generator', 'getDoctrine_UuidGeneratorService', true],
        ], [
            'doctrine.ulid_generator' => '?',
            'doctrine.uuid_generator' => '?',
        ])));
        $a->setProxyDir(($this->targetDir . '' . '/doctrine/orm/Proxies'));
        $a->setProxyNamespace('Proxies');
        $a->setAutoGenerateProxyClasses(true);
        $a->setSchemaIgnoreClasses([]);
        $a->setClassMetadataFactoryName('Doctrine\\Bundle\\DoctrineBundle\\Mapping\\ClassMetadataFactory');
        $a->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
        $a->setNamingStrategy(new \Doctrine\ORM\Mapping\UnderscoreNamingStrategy(0, true));
        $a->setQuoteStrategy(new \Doctrine\ORM\Mapping\DefaultQuoteStrategy());
        $a->setEntityListenerResolver(new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerEntityListenerResolver($this));
        $a->setLazyGhostObjectEnabled(true);
        $a->setRepositoryFactory(new \Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory(new ServiceLocator($this->getService, [
            'App\\Repository\\EquipesRepository' => ['privates', 'App\\Repository\\EquipesRepository', 'getEquipesRepositoryService', true],
            'App\\Repository\\MatchesRepository' => ['privates', 'App\\Repository\\MatchesRepository', 'getMatchesRepositoryService', true],
            'App\\Repository\\UtilisateurRepository' => ['privates', 'App\\Repository\\UtilisateurRepository', 'getUtilisateurRepositoryService', true],
        ], [
            'App\\Repository\\EquipesRepository' => '?',
            'App\\Repository\\MatchesRepository' => '?',
            'App\\Repository\\UtilisateurRepository' => '?',
        ])));

        $instance = ($lazyLoad->__construct(($this->services['doctrine.dbal.default_connection'] ?? $this->getDoctrine_Dbal_DefaultConnectionService()), $a) && false ?: $lazyLoad);

        (new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator([], []))->configure($instance);

        return $instance;
    }

    protected function createProxy($class, Closure $factory)
    {
        class_exists($class, false) || require __DIR__ . '/' . $class . '.php';

        return $factory();
    }

    public function __construct(array $buildParameters = [], $containerDir = __DIR__)
    {
        $this->getService = $this->getService(...);
        $this->buildParameters = $buildParameters;
        $this->containerDir = $containerDir;
        $this->targetDir = dirname($containerDir);
        $this->parameters = $this->getDefaultParameters();

        $this->services = $this->privates = [];
        $this->syntheticIds = [
            'kernel' => true,
        ];
        $this->methodMap = [
            '.container.private.profiler' => 'get_Container_Private_ProfilerService',
            'cache.app' => 'getCache_AppService',
            'cache.security_is_granted_attribute_expression_language' => 'getCache_SecurityIsGrantedAttributeExpressionLanguageService',
            'cache.system' => 'getCache_SystemService',
            'cache.validator_expression_language' => 'getCache_ValidatorExpressionLanguageService',
            'data_collector.dump' => 'getDataCollector_DumpService',
            'doctrine' => 'getDoctrineService',
            'doctrine.dbal.default_connection' => 'getDoctrine_Dbal_DefaultConnectionService',
            'doctrine.orm.default_entity_manager' => 'getDoctrine_Orm_DefaultEntityManagerService',
            'event_dispatcher' => 'getEventDispatcherService',
            'http_kernel' => 'getHttpKernelService',
            'messenger.default_bus' => 'getMessenger_DefaultBusService',
            'monolog.logger.deprecation' => 'getMonolog_Logger_DeprecationService',
            'request_stack' => 'getRequestStackService',
            'router' => 'getRouterService',
            'translator' => 'getTranslatorService',
            'var_dumper.cloner' => 'getVarDumper_ClonerService',
            'profiler' => 'getProfilerService',
        ];
        $this->fileMap = [
            'App\\Controller\\EquipesController' => 'getEquipesControllerService',
            'App\\Controller\\LoginController' => 'getLoginControllerService',
            'App\\Controller\\MatchesController' => 'getMatchesControllerService',
            'Doctrine\\Bundle\\DoctrineBundle\\Controller\\ProfilerController' => 'getProfilerControllerService',
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController' => 'getRedirectControllerService',
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController' => 'getTemplateControllerService',
            'cache.app_clearer' => 'getCache_AppClearerService',
            'cache.global_clearer' => 'getCache_GlobalClearerService',
            'cache.system_clearer' => 'getCache_SystemClearerService',
            'cache_warmer' => 'getCacheWarmerService',
            'console.command_loader' => 'getConsole_CommandLoaderService',
            'container.env_var_processors_locator' => 'getContainer_EnvVarProcessorsLocatorService',
            'container.get_routing_condition_service' => 'getContainer_GetRoutingConditionServiceService',
            'error_controller' => 'getErrorControllerService',
            'routing.loader' => 'getRouting_LoaderService',
            'services_resetter' => 'getServicesResetterService',
            'web_profiler.controller.exception_panel' => 'getWebProfiler_Controller_ExceptionPanelService',
            'web_profiler.controller.profiler' => 'getWebProfiler_Controller_ProfilerService',
            'web_profiler.controller.router' => 'getWebProfiler_Controller_RouterService',
        ];
        $this->aliases = [
            'App\\Kernel' => 'kernel',
            'database_connection' => 'doctrine.dbal.default_connection',
            'doctrine.orm.entity_manager' => 'doctrine.orm.default_entity_manager',
        ];

        $this->privates['service_container'] = function () {
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'HttpKernelInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'KernelInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'RebootableInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'TerminableInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'Kernel.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'framework-bundle' . DIRECTORY_SEPARATOR . 'Kernel' . DIRECTORY_SEPARATOR . 'MicroKernelTrait.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Kernel.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'ControllerMetadata' . DIRECTORY_SEPARATOR . 'ArgumentMetadataFactoryInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'ControllerMetadata' . DIRECTORY_SEPARATOR . 'ArgumentMetadataFactory.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'event-dispatcher' . DIRECTORY_SEPARATOR . 'EventSubscriberInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'ResponseListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'LocaleListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'ValidateRequestListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'DisallowRobotsIndexingListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'ErrorListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'CacheAttributeListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'dependency-injection' . DIRECTORY_SEPARATOR . 'ParameterBag' . DIRECTORY_SEPARATOR . 'ParameterBagInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'dependency-injection' . DIRECTORY_SEPARATOR . 'ParameterBag' . DIRECTORY_SEPARATOR . 'ParameterBag.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'dependency-injection' . DIRECTORY_SEPARATOR . 'ParameterBag' . DIRECTORY_SEPARATOR . 'FrozenParameterBag.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'psr' . DIRECTORY_SEPARATOR . 'container' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'ContainerInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'dependency-injection' . DIRECTORY_SEPARATOR . 'ParameterBag' . DIRECTORY_SEPARATOR . 'ContainerBagInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'dependency-injection' . DIRECTORY_SEPARATOR . 'ParameterBag' . DIRECTORY_SEPARATOR . 'ContainerBag.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'runtime' . DIRECTORY_SEPARATOR . 'RunnerInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'runtime' . DIRECTORY_SEPARATOR . 'Runner' . DIRECTORY_SEPARATOR . 'Symfony' . DIRECTORY_SEPARATOR . 'HttpKernelRunner.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'runtime' . DIRECTORY_SEPARATOR . 'Runner' . DIRECTORY_SEPARATOR . 'Symfony' . DIRECTORY_SEPARATOR . 'ResponseRunner.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'runtime' . DIRECTORY_SEPARATOR . 'RuntimeInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'runtime' . DIRECTORY_SEPARATOR . 'GenericRuntime.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'runtime' . DIRECTORY_SEPARATOR . 'SymfonyRuntime.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'HttpKernel.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'ControllerResolverInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'TraceableControllerResolver.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'ControllerResolver.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'ContainerControllerResolver.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'framework-bundle' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'ControllerResolver.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'ArgumentResolverInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'TraceableArgumentResolver.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'ArgumentResolver.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-foundation' . DIRECTORY_SEPARATOR . 'RequestStack.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'ConfigCacheFactoryInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'ResourceCheckerConfigCacheFactory.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'LocaleAwareListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'psr' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'CacheItemPoolInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'Adapter' . DIRECTORY_SEPARATOR . 'AdapterInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache-contracts' . DIRECTORY_SEPARATOR . 'CacheInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'PruneableInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'service-contracts' . DIRECTORY_SEPARATOR . 'ResetInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'ResettableInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'Adapter' . DIRECTORY_SEPARATOR . 'TraceableAdapter.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'psr' . DIRECTORY_SEPARATOR . 'log' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'LoggerAwareInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'psr' . DIRECTORY_SEPARATOR . 'log' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'LoggerAwareTrait.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'Traits' . DIRECTORY_SEPARATOR . 'AbstractAdapterTrait.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache-contracts' . DIRECTORY_SEPARATOR . 'CacheTrait.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'Traits' . DIRECTORY_SEPARATOR . 'ContractsTrait.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'Adapter' . DIRECTORY_SEPARATOR . 'AbstractAdapter.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'Traits' . DIRECTORY_SEPARATOR . 'FilesystemCommonTrait.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'Traits' . DIRECTORY_SEPARATOR . 'FilesystemTrait.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'Adapter' . DIRECTORY_SEPARATOR . 'FilesystemAdapter.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'Marshaller' . DIRECTORY_SEPARATOR . 'MarshallerInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'Marshaller' . DIRECTORY_SEPARATOR . 'DefaultMarshaller.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'mailer' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'MessageLoggerListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'translation-contracts' . DIRECTORY_SEPARATOR . 'TranslatorInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'translation' . DIRECTORY_SEPARATOR . 'TranslatorBagInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'translation-contracts' . DIRECTORY_SEPARATOR . 'LocaleAwareInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'translation' . DIRECTORY_SEPARATOR . 'Translator.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'CacheWarmer' . DIRECTORY_SEPARATOR . 'WarmableInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'framework-bundle' . DIRECTORY_SEPARATOR . 'Translation' . DIRECTORY_SEPARATOR . 'Translator.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'service-contracts' . DIRECTORY_SEPARATOR . 'ServiceProviderInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'service-contracts' . DIRECTORY_SEPARATOR . 'ServiceLocatorTrait.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'dependency-injection' . DIRECTORY_SEPARATOR . 'ServiceLocator.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'translation' . DIRECTORY_SEPARATOR . 'Formatter' . DIRECTORY_SEPARATOR . 'MessageFormatterInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'translation' . DIRECTORY_SEPARATOR . 'Formatter' . DIRECTORY_SEPARATOR . 'IntlFormatterInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'translation' . DIRECTORY_SEPARATOR . 'Formatter' . DIRECTORY_SEPARATOR . 'MessageFormatter.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'translation-contracts' . DIRECTORY_SEPARATOR . 'TranslatorTrait.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'translation' . DIRECTORY_SEPARATOR . 'IdentityTranslator.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'DebugHandlersListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'psr' . DIRECTORY_SEPARATOR . 'log' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'LoggerInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Monolog' . DIRECTORY_SEPARATOR . 'ResettableInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Monolog' . DIRECTORY_SEPARATOR . 'Logger.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'Log' . DIRECTORY_SEPARATOR . 'DebugLoggerInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'monolog-bridge' . DIRECTORY_SEPARATOR . 'Logger.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'Debug' . DIRECTORY_SEPARATOR . 'FileLinkFormatter.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'stopwatch' . DIRECTORY_SEPARATOR . 'Stopwatch.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'monolog-bridge' . DIRECTORY_SEPARATOR . 'Processor' . DIRECTORY_SEPARATOR . 'CompatibilityProcessor.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'monolog-bridge' . DIRECTORY_SEPARATOR . 'Processor' . DIRECTORY_SEPARATOR . 'DebugProcessor.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'routing' . DIRECTORY_SEPARATOR . 'RequestContext.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'expression-language' . DIRECTORY_SEPARATOR . 'ExpressionFunctionProviderInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'routing' . DIRECTORY_SEPARATOR . 'Matcher' . DIRECTORY_SEPARATOR . 'ExpressionLanguageProvider.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'RouterListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'annotations' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'Common' . DIRECTORY_SEPARATOR . 'Annotations' . DIRECTORY_SEPARATOR . 'Reader.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'annotations' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'Common' . DIRECTORY_SEPARATOR . 'Annotations' . DIRECTORY_SEPARATOR . 'AnnotationReader.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'annotations' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'Common' . DIRECTORY_SEPARATOR . 'Annotations' . DIRECTORY_SEPARATOR . 'AnnotationRegistry.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'annotations' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'Common' . DIRECTORY_SEPARATOR . 'Annotations' . DIRECTORY_SEPARATOR . 'PsrCachedReader.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'Traits' . DIRECTORY_SEPARATOR . 'ProxyTrait.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'Adapter' . DIRECTORY_SEPARATOR . 'PhpArrayAdapter.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'property-info' . DIRECTORY_SEPARATOR . 'PropertyTypeExtractorInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'property-info' . DIRECTORY_SEPARATOR . 'PropertyDescriptionExtractorInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'property-info' . DIRECTORY_SEPARATOR . 'PropertyAccessExtractorInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'property-info' . DIRECTORY_SEPARATOR . 'PropertyListExtractorInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'property-info' . DIRECTORY_SEPARATOR . 'PropertyInfoExtractorInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'property-info' . DIRECTORY_SEPARATOR . 'PropertyInitializableExtractorInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'property-info' . DIRECTORY_SEPARATOR . 'PropertyInfoExtractor.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'web-link' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'AddLinkHeaderListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'AbstractSessionListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'SessionListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator' . DIRECTORY_SEPARATOR . 'ValidatorBuilder.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator' . DIRECTORY_SEPARATOR . 'Validation.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator' . DIRECTORY_SEPARATOR . 'ConstraintValidatorFactoryInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator' . DIRECTORY_SEPARATOR . 'ContainerConstraintValidatorFactory.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator' . DIRECTORY_SEPARATOR . 'ObjectInitializerInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'doctrine-bridge' . DIRECTORY_SEPARATOR . 'Validator' . DIRECTORY_SEPARATOR . 'DoctrineInitializer.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Loader' . DIRECTORY_SEPARATOR . 'LoaderInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Loader' . DIRECTORY_SEPARATOR . 'AutoMappingTrait.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Loader' . DIRECTORY_SEPARATOR . 'PropertyInfoLoader.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'doctrine-bridge' . DIRECTORY_SEPARATOR . 'Validator' . DIRECTORY_SEPARATOR . 'DoctrineLoader.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'notifier' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'NotificationLoggerListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'ProfilerListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'DataCollectorInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'DataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'LateDataCollectorInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'RequestDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'RouterDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'framework-bundle' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'RouterDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'FormDataCollectorInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'FormDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'FormDataExtractorInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'form' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'FormDataExtractor.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Factory' . DIRECTORY_SEPARATOR . 'MetadataFactoryInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator' . DIRECTORY_SEPARATOR . 'Validator' . DIRECTORY_SEPARATOR . 'ValidatorInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator' . DIRECTORY_SEPARATOR . 'Validator' . DIRECTORY_SEPARATOR . 'TraceableValidator.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'serializer' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'SerializerDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'persistence' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Persistence' . DIRECTORY_SEPARATOR . 'ConnectionRegistry.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'persistence' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Persistence' . DIRECTORY_SEPARATOR . 'ManagerRegistry.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'persistence' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Persistence' . DIRECTORY_SEPARATOR . 'AbstractManagerRegistry.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'doctrine-bridge' . DIRECTORY_SEPARATOR . 'ManagerRegistry.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle' . DIRECTORY_SEPARATOR . 'Registry.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'dbal' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Connection.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle' . DIRECTORY_SEPARATOR . 'ConnectionFactory.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'dbal' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Configuration.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'dbal' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Driver' . DIRECTORY_SEPARATOR . 'Middleware.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'dbal' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Logging' . DIRECTORY_SEPARATOR . 'Middleware.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle' . DIRECTORY_SEPARATOR . 'Middleware' . DIRECTORY_SEPARATOR . 'ConnectionNameAwareInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle' . DIRECTORY_SEPARATOR . 'Middleware' . DIRECTORY_SEPARATOR . 'DebugMiddleware.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'event-manager' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'EventManager.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'doctrine-bridge' . DIRECTORY_SEPARATOR . 'ContainerAwareEventManager.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'doctrine-bridge' . DIRECTORY_SEPARATOR . 'Middleware' . DIRECTORY_SEPARATOR . 'Debug' . DIRECTORY_SEPARATOR . 'DebugDataHolder.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle' . DIRECTORY_SEPARATOR . 'Middleware' . DIRECTORY_SEPARATOR . 'BacktraceDebugDataHolder.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'persistence' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Persistence' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Driver' . DIRECTORY_SEPARATOR . 'MappingDriver.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Driver' . DIRECTORY_SEPARATOR . 'CompatibilityAnnotationDriver.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'persistence' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Persistence' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Driver' . DIRECTORY_SEPARATOR . 'ColocatedMappingDriver.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Driver' . DIRECTORY_SEPARATOR . 'AttributeDriver.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'Adapter' . DIRECTORY_SEPARATOR . 'ArrayAdapter.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'var-dumper' . DIRECTORY_SEPARATOR . 'Dumper' . DIRECTORY_SEPARATOR . 'DataDumperInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'DumpDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'var-dumper' . DIRECTORY_SEPARATOR . 'Cloner' . DIRECTORY_SEPARATOR . 'ClonerInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'var-dumper' . DIRECTORY_SEPARATOR . 'Cloner' . DIRECTORY_SEPARATOR . 'AbstractCloner.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'var-dumper' . DIRECTORY_SEPARATOR . 'Cloner' . DIRECTORY_SEPARATOR . 'VarCloner.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'var-dumper' . DIRECTORY_SEPARATOR . 'Cloner' . DIRECTORY_SEPARATOR . 'DumperInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'var-dumper' . DIRECTORY_SEPARATOR . 'Dumper' . DIRECTORY_SEPARATOR . 'AbstractDumper.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'var-dumper' . DIRECTORY_SEPARATOR . 'Dumper' . DIRECTORY_SEPARATOR . 'CliDumper.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'var-dumper' . DIRECTORY_SEPARATOR . 'Dumper' . DIRECTORY_SEPARATOR . 'HtmlDumper.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'var-dumper' . DIRECTORY_SEPARATOR . 'Server' . DIRECTORY_SEPARATOR . 'Connection.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'var-dumper' . DIRECTORY_SEPARATOR . 'Dumper' . DIRECTORY_SEPARATOR . 'ContextProvider' . DIRECTORY_SEPARATOR . 'ContextProviderInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'var-dumper' . DIRECTORY_SEPARATOR . 'Dumper' . DIRECTORY_SEPARATOR . 'ContextProvider' . DIRECTORY_SEPARATOR . 'SourceContextProvider.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'var-dumper' . DIRECTORY_SEPARATOR . 'Dumper' . DIRECTORY_SEPARATOR . 'ContextProvider' . DIRECTORY_SEPARATOR . 'RequestContextProvider.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'var-dumper' . DIRECTORY_SEPARATOR . 'Dumper' . DIRECTORY_SEPARATOR . 'ContextProvider' . DIRECTORY_SEPARATOR . 'CliContextProvider.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Cache' . DIRECTORY_SEPARATOR . 'CacheInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Cache' . DIRECTORY_SEPARATOR . 'FilesystemCache.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'ExtensionInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'AbstractExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'CoreExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'EscaperExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'OptimizerExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'StagingExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'ExtensionSet.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Template.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'TemplateWrapper.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Environment.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Loader' . DIRECTORY_SEPARATOR . 'LoaderInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Loader' . DIRECTORY_SEPARATOR . 'FilesystemLoader.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'CsrfExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'DumpExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'ProfilerExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'ProfilerExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'TranslationExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'AssetExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'asset' . DIRECTORY_SEPARATOR . 'Packages.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'asset' . DIRECTORY_SEPARATOR . 'PackageInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'asset' . DIRECTORY_SEPARATOR . 'Package.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'asset' . DIRECTORY_SEPARATOR . 'PathPackage.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'asset' . DIRECTORY_SEPARATOR . 'VersionStrategy' . DIRECTORY_SEPARATOR . 'VersionStrategyInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'asset' . DIRECTORY_SEPARATOR . 'VersionStrategy' . DIRECTORY_SEPARATOR . 'EmptyVersionStrategy.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'asset' . DIRECTORY_SEPARATOR . 'Context' . DIRECTORY_SEPARATOR . 'ContextInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'asset' . DIRECTORY_SEPARATOR . 'Context' . DIRECTORY_SEPARATOR . 'RequestStackContext.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'CodeExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'RoutingExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'YamlExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'StopwatchExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'ExpressionExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'HttpKernelExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'HttpFoundationExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-foundation' . DIRECTORY_SEPARATOR . 'UrlHelper.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'WebLinkExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'SerializerExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'FormExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'LogoutUrlExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'Extension' . DIRECTORY_SEPARATOR . 'SecurityExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-http' . DIRECTORY_SEPARATOR . 'Impersonate' . DIRECTORY_SEPARATOR . 'ImpersonateUrlGenerator.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle' . DIRECTORY_SEPARATOR . 'Twig' . DIRECTORY_SEPARATOR . 'DoctrineExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'web-profiler-bundle' . DIRECTORY_SEPARATOR . 'Twig' . DIRECTORY_SEPARATOR . 'WebProfilerExtension.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'AppVariable.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'RuntimeLoader' . DIRECTORY_SEPARATOR . 'RuntimeLoaderInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'RuntimeLoader' . DIRECTORY_SEPARATOR . 'ContainerRuntimeLoader.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'extra-bundle' . DIRECTORY_SEPARATOR . 'MissingExtensionSuggestor.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bundle' . DIRECTORY_SEPARATOR . 'DependencyInjection' . DIRECTORY_SEPARATOR . 'Configurator' . DIRECTORY_SEPARATOR . 'EnvironmentConfigurator.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Profiler' . DIRECTORY_SEPARATOR . 'Profile.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'web-profiler-bundle' . DIRECTORY_SEPARATOR . 'Csp' . DIRECTORY_SEPARATOR . 'ContentSecurityPolicyHandler.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'web-profiler-bundle' . DIRECTORY_SEPARATOR . 'Csp' . DIRECTORY_SEPARATOR . 'NonceGenerator.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'web-profiler-bundle' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'WebDebugToolbarListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core' . DIRECTORY_SEPARATOR . 'Authorization' . DIRECTORY_SEPARATOR . 'AuthorizationCheckerInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core' . DIRECTORY_SEPARATOR . 'Authorization' . DIRECTORY_SEPARATOR . 'AuthorizationChecker.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core' . DIRECTORY_SEPARATOR . 'Authentication' . DIRECTORY_SEPARATOR . 'Token' . DIRECTORY_SEPARATOR . 'Storage' . DIRECTORY_SEPARATOR . 'TokenStorageInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'service-contracts' . DIRECTORY_SEPARATOR . 'ServiceSubscriberInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core' . DIRECTORY_SEPARATOR . 'Authentication' . DIRECTORY_SEPARATOR . 'Token' . DIRECTORY_SEPARATOR . 'Storage' . DIRECTORY_SEPARATOR . 'UsageTrackingTokenStorage.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core' . DIRECTORY_SEPARATOR . 'Authentication' . DIRECTORY_SEPARATOR . 'Token' . DIRECTORY_SEPARATOR . 'Storage' . DIRECTORY_SEPARATOR . 'TokenStorage.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core' . DIRECTORY_SEPARATOR . 'Authentication' . DIRECTORY_SEPARATOR . 'AuthenticationTrustResolverInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core' . DIRECTORY_SEPARATOR . 'Authentication' . DIRECTORY_SEPARATOR . 'AuthenticationTrustResolver.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core' . DIRECTORY_SEPARATOR . 'Role' . DIRECTORY_SEPARATOR . 'RoleHierarchyInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core' . DIRECTORY_SEPARATOR . 'Role' . DIRECTORY_SEPARATOR . 'RoleHierarchy.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-http' . DIRECTORY_SEPARATOR . 'FirewallMapInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-bundle' . DIRECTORY_SEPARATOR . 'Security' . DIRECTORY_SEPARATOR . 'FirewallMap.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-http' . DIRECTORY_SEPARATOR . 'Logout' . DIRECTORY_SEPARATOR . 'LogoutUrlGenerator.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-http' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'IsGrantedAttributeListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'expression-language' . DIRECTORY_SEPARATOR . 'ExpressionLanguage.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core' . DIRECTORY_SEPARATOR . 'Authorization' . DIRECTORY_SEPARATOR . 'AccessDecisionManagerInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core' . DIRECTORY_SEPARATOR . 'Authorization' . DIRECTORY_SEPARATOR . 'TraceableAccessDecisionManager.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core' . DIRECTORY_SEPARATOR . 'Authorization' . DIRECTORY_SEPARATOR . 'AccessDecisionManager.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core' . DIRECTORY_SEPARATOR . 'Authorization' . DIRECTORY_SEPARATOR . 'Strategy' . DIRECTORY_SEPARATOR . 'AccessDecisionStrategyInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core' . DIRECTORY_SEPARATOR . 'Authorization' . DIRECTORY_SEPARATOR . 'Strategy' . DIRECTORY_SEPARATOR . 'AffirmativeStrategy.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-http' . DIRECTORY_SEPARATOR . 'Firewall.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-bundle' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'FirewallListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-bundle' . DIRECTORY_SEPARATOR . 'Debug' . DIRECTORY_SEPARATOR . 'TraceableFirewallListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'psr' . DIRECTORY_SEPARATOR . 'event-dispatcher' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'EventDispatcherInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'event-dispatcher-contracts' . DIRECTORY_SEPARATOR . 'EventDispatcherInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'event-dispatcher' . DIRECTORY_SEPARATOR . 'EventDispatcherInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'event-dispatcher' . DIRECTORY_SEPARATOR . 'EventDispatcher.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-http' . DIRECTORY_SEPARATOR . 'Firewall' . DIRECTORY_SEPARATOR . 'FirewallListenerInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-http' . DIRECTORY_SEPARATOR . 'Firewall' . DIRECTORY_SEPARATOR . 'AbstractListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-http' . DIRECTORY_SEPARATOR . 'Firewall' . DIRECTORY_SEPARATOR . 'ContextListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Monolog' . DIRECTORY_SEPARATOR . 'Handler' . DIRECTORY_SEPARATOR . 'HandlerInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Monolog' . DIRECTORY_SEPARATOR . 'Handler' . DIRECTORY_SEPARATOR . 'Handler.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Monolog' . DIRECTORY_SEPARATOR . 'Handler' . DIRECTORY_SEPARATOR . 'AbstractHandler.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Monolog' . DIRECTORY_SEPARATOR . 'Handler' . DIRECTORY_SEPARATOR . 'ProcessableHandlerInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Monolog' . DIRECTORY_SEPARATOR . 'Handler' . DIRECTORY_SEPARATOR . 'FormattableHandlerInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Monolog' . DIRECTORY_SEPARATOR . 'Handler' . DIRECTORY_SEPARATOR . 'ProcessableHandlerTrait.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Monolog' . DIRECTORY_SEPARATOR . 'Handler' . DIRECTORY_SEPARATOR . 'FormattableHandlerTrait.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Monolog' . DIRECTORY_SEPARATOR . 'Handler' . DIRECTORY_SEPARATOR . 'AbstractProcessingHandler.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Monolog' . DIRECTORY_SEPARATOR . 'Handler' . DIRECTORY_SEPARATOR . 'StreamHandler.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Monolog' . DIRECTORY_SEPARATOR . 'Processor' . DIRECTORY_SEPARATOR . 'ProcessorInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Monolog' . DIRECTORY_SEPARATOR . 'Processor' . DIRECTORY_SEPARATOR . 'PsrLogMessageProcessor.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'monolog-bridge' . DIRECTORY_SEPARATOR . 'Handler' . DIRECTORY_SEPARATOR . 'CompatibilityHandler.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'monolog-bridge' . DIRECTORY_SEPARATOR . 'Handler' . DIRECTORY_SEPARATOR . 'ConsoleHandler.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'monolog-bridge' . DIRECTORY_SEPARATOR . 'Handler' . DIRECTORY_SEPARATOR . 'CompatibilityProcessingHandler.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'ControllerListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'ParamConverterListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Request' . DIRECTORY_SEPARATOR . 'ParamConverter' . DIRECTORY_SEPARATOR . 'ParamConverterManager.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Request' . DIRECTORY_SEPARATOR . 'ParamConverter' . DIRECTORY_SEPARATOR . 'ParamConverterInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Request' . DIRECTORY_SEPARATOR . 'ParamConverter' . DIRECTORY_SEPARATOR . 'DoctrineParamConverter.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Request' . DIRECTORY_SEPARATOR . 'ParamConverter' . DIRECTORY_SEPARATOR . 'DateTimeParamConverter.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'TemplateListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Templating' . DIRECTORY_SEPARATOR . 'TemplateGuesser.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'HttpCacheListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'SecurityListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-core' . DIRECTORY_SEPARATOR . 'Authorization' . DIRECTORY_SEPARATOR . 'ExpressionLanguage.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Security' . DIRECTORY_SEPARATOR . 'ExpressionLanguage.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'EventListener' . DIRECTORY_SEPARATOR . 'IsGrantedListener.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Request' . DIRECTORY_SEPARATOR . 'ArgumentNameConverter.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-client-contracts' . DIRECTORY_SEPARATOR . 'HttpClientInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-client' . DIRECTORY_SEPARATOR . 'TraceableHttpClient.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-client' . DIRECTORY_SEPARATOR . 'HttpClient.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'translation' . DIRECTORY_SEPARATOR . 'DataCollectorTranslator.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'routing' . DIRECTORY_SEPARATOR . 'RequestContextAwareInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'routing' . DIRECTORY_SEPARATOR . 'Matcher' . DIRECTORY_SEPARATOR . 'UrlMatcherInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'routing' . DIRECTORY_SEPARATOR . 'Generator' . DIRECTORY_SEPARATOR . 'UrlGeneratorInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'routing' . DIRECTORY_SEPARATOR . 'RouterInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'routing' . DIRECTORY_SEPARATOR . 'Matcher' . DIRECTORY_SEPARATOR . 'RequestMatcherInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'routing' . DIRECTORY_SEPARATOR . 'Router.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'framework-bundle' . DIRECTORY_SEPARATOR . 'Routing' . DIRECTORY_SEPARATOR . 'Router.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'messenger' . DIRECTORY_SEPARATOR . 'MessageBusInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'messenger' . DIRECTORY_SEPARATOR . 'TraceableMessageBus.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'messenger' . DIRECTORY_SEPARATOR . 'MessageBus.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'event-dispatcher' . DIRECTORY_SEPARATOR . 'Debug' . DIRECTORY_SEPARATOR . 'TraceableEventDispatcher.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'Debug' . DIRECTORY_SEPARATOR . 'TraceableEventDispatcher.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'monolog' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Monolog' . DIRECTORY_SEPARATOR . 'Handler' . DIRECTORY_SEPARATOR . 'NullHandler.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'Profiler' . DIRECTORY_SEPARATOR . 'Profiler.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'Profiler' . DIRECTORY_SEPARATOR . 'ProfilerStorageInterface.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'Profiler' . DIRECTORY_SEPARATOR . 'FileProfilerStorage.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'TimeDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'MemoryDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'validator' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'ValidatorDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'AjaxDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'ExceptionDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'LoggerDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'EventDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'CacheDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'translation' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'TranslationDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-bundle' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'SecurityDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'TwigDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-client' . DIRECTORY_SEPARATOR . 'HttpClientTrait.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-client' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'HttpClientDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'doctrine-bridge' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'DoctrineDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'DoctrineDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'messenger' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'MessengerDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'mailer' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'MessageDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'notifier' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'NotificationDataCollector.php';
            include_once dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'http-kernel' . DIRECTORY_SEPARATOR . 'DataCollector' . DIRECTORY_SEPARATOR . 'ConfigDataCollector.php';
        };
    }

    protected function getDefaultParameters(): array
    {
        return [
            'kernel.project_dir' => dirname(__DIR__, 4),
            'kernel.environment' => 'dev',
            'kernel.debug' => true,
            'kernel.logs_dir' => (dirname(__DIR__, 3) . '' . DIRECTORY_SEPARATOR . 'log'),
            'kernel.bundles' => [
                'FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                'DoctrineBundle' => 'Doctrine\\Bundle\\DoctrineBundle\\DoctrineBundle',
                'DoctrineMigrationsBundle' => 'Doctrine\\Bundle\\MigrationsBundle\\DoctrineMigrationsBundle',
                'DebugBundle' => 'Symfony\\Bundle\\DebugBundle\\DebugBundle',
                'TwigBundle' => 'Symfony\\Bundle\\TwigBundle\\TwigBundle',
                'WebProfilerBundle' => 'Symfony\\Bundle\\WebProfilerBundle\\WebProfilerBundle',
                'TwigExtraBundle' => 'Twig\\Extra\\TwigExtraBundle\\TwigExtraBundle',
                'SecurityBundle' => 'Symfony\\Bundle\\SecurityBundle\\SecurityBundle',
                'MonologBundle' => 'Symfony\\Bundle\\MonologBundle\\MonologBundle',
                'MakerBundle' => 'Symfony\\Bundle\\MakerBundle\\MakerBundle',
                'SensioFrameworkExtraBundle' => 'Sensio\\Bundle\\FrameworkExtraBundle\\SensioFrameworkExtraBundle',
            ],
            'kernel.bundles_metadata' => [
                'FrameworkBundle' => [
                    'path' => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'framework-bundle'),
                    'namespace' => 'Symfony\\Bundle\\FrameworkBundle',
                ],
                'DoctrineBundle' => [
                    'path' => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle'),
                    'namespace' => 'Doctrine\\Bundle\\DoctrineBundle',
                ],
                'DoctrineMigrationsBundle' => [
                    'path' => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-migrations-bundle'),
                    'namespace' => 'Doctrine\\Bundle\\MigrationsBundle',
                ],
                'DebugBundle' => [
                    'path' => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'debug-bundle'),
                    'namespace' => 'Symfony\\Bundle\\DebugBundle',
                ],
                'TwigBundle' => [
                    'path' => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bundle'),
                    'namespace' => 'Symfony\\Bundle\\TwigBundle',
                ],
                'WebProfilerBundle' => [
                    'path' => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'web-profiler-bundle'),
                    'namespace' => 'Symfony\\Bundle\\WebProfilerBundle',
                ],
                'TwigExtraBundle' => [
                    'path' => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR . 'extra-bundle'),
                    'namespace' => 'Twig\\Extra\\TwigExtraBundle',
                ],
                'SecurityBundle' => [
                    'path' => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-bundle'),
                    'namespace' => 'Symfony\\Bundle\\SecurityBundle',
                ],
                'MonologBundle' => [
                    'path' => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'monolog-bundle'),
                    'namespace' => 'Symfony\\Bundle\\MonologBundle',
                ],
                'MakerBundle' => [
                    'path' => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'maker-bundle' . DIRECTORY_SEPARATOR . 'src'),
                    'namespace' => 'Symfony\\Bundle\\MakerBundle',
                ],
                'SensioFrameworkExtraBundle' => [
                    'path' => (dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'sensio' . DIRECTORY_SEPARATOR . 'framework-extra-bundle' . DIRECTORY_SEPARATOR . 'src'),
                    'namespace' => 'Sensio\\Bundle\\FrameworkExtraBundle',
                ],
            ],
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'App_KernelDevDebugContainer',
            'event_dispatcher.event_aliases' => [
                'Symfony\\Component\\Console\\Event\\ConsoleCommandEvent' => 'console.command',
                'Symfony\\Component\\Console\\Event\\ConsoleErrorEvent' => 'console.error',
                'Symfony\\Component\\Console\\Event\\ConsoleSignalEvent' => 'console.signal',
                'Symfony\\Component\\Console\\Event\\ConsoleTerminateEvent' => 'console.terminate',
                'Symfony\\Component\\Form\\Event\\PreSubmitEvent' => 'form.pre_submit',
                'Symfony\\Component\\Form\\Event\\SubmitEvent' => 'form.submit',
                'Symfony\\Component\\Form\\Event\\PostSubmitEvent' => 'form.post_submit',
                'Symfony\\Component\\Form\\Event\\PreSetDataEvent' => 'form.pre_set_data',
                'Symfony\\Component\\Form\\Event\\PostSetDataEvent' => 'form.post_set_data',
                'Symfony\\Component\\HttpKernel\\Event\\ControllerArgumentsEvent' => 'kernel.controller_arguments',
                'Symfony\\Component\\HttpKernel\\Event\\ControllerEvent' => 'kernel.controller',
                'Symfony\\Component\\HttpKernel\\Event\\ResponseEvent' => 'kernel.response',
                'Symfony\\Component\\HttpKernel\\Event\\FinishRequestEvent' => 'kernel.finish_request',
                'Symfony\\Component\\HttpKernel\\Event\\RequestEvent' => 'kernel.request',
                'Symfony\\Component\\HttpKernel\\Event\\ViewEvent' => 'kernel.view',
                'Symfony\\Component\\HttpKernel\\Event\\ExceptionEvent' => 'kernel.exception',
                'Symfony\\Component\\HttpKernel\\Event\\TerminateEvent' => 'kernel.terminate',
                'Symfony\\Component\\Security\\Core\\Event\\AuthenticationSuccessEvent' => 'security.authentication.success',
                'Symfony\\Component\\Security\\Http\\Event\\InteractiveLoginEvent' => 'security.interactive_login',
                'Symfony\\Component\\Security\\Http\\Event\\SwitchUserEvent' => 'security.switch_user',
            ],
            'fragment.renderer.hinclude.global_template' => NULL,
            'fragment.path' => '/_fragment',
            'kernel.http_method_override' => false,
            'kernel.trust_x_sendfile_type_header' => false,
            'kernel.trusted_hosts' => [

            ],
            'kernel.default_locale' => 'en',
            'kernel.enabled_locales' => [

            ],
            'kernel.error_controller' => 'error_controller',
            'asset.request_context.base_path' => NULL,
            'asset.request_context.secure' => NULL,
            'translator.logging' => false,
            'translator.default_path' => (dirname(__DIR__, 4) . '/translations'),
            'debug.error_handler.throw_at' => -1,
            'router.request_context.host' => 'localhost',
            'router.request_context.scheme' => 'http',
            'router.request_context.base_url' => '',
            'router.resource' => 'kernel::loadRoutes',
            'request_listener.http_port' => 80,
            'request_listener.https_port' => 443,
            'session.metadata.storage_key' => '_sf2_meta',
            'session.storage.options' => [
                'cache_limiter' => '0',
                'cookie_secure' => 'auto',
                'cookie_httponly' => true,
                'cookie_samesite' => 'lax',
                'gc_probability' => 1,
            ],
            'session.metadata.update_threshold' => 0,
            'form.type_extension.csrf.enabled' => true,
            'form.type_extension.csrf.field_name' => '_token',
            'validator.translation_domain' => 'validators',
            'profiler_listener.only_exceptions' => false,
            'profiler_listener.only_main_requests' => false,
            'doctrine.dbal.configuration.class' => 'Doctrine\\DBAL\\Configuration',
            'doctrine.data_collector.class' => 'Doctrine\\Bundle\\DoctrineBundle\\DataCollector\\DoctrineDataCollector',
            'doctrine.dbal.connection.event_manager.class' => 'Symfony\\Bridge\\Doctrine\\ContainerAwareEventManager',
            'doctrine.dbal.connection_factory.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ConnectionFactory',
            'doctrine.dbal.events.mysql_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\MysqlSessionInit',
            'doctrine.dbal.events.oracle_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\OracleSessionInit',
            'doctrine.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Registry',
            'doctrine.entity_managers' => [
                'default' => 'doctrine.orm.default_entity_manager',
            ],
            'doctrine.default_entity_manager' => 'default',
            'doctrine.dbal.connection_factory.types' => [

            ],
            'doctrine.connections' => [
                'default' => 'doctrine.dbal.default_connection',
            ],
            'doctrine.default_connection' => 'default',
            'doctrine.orm.configuration.class' => 'Doctrine\\ORM\\Configuration',
            'doctrine.orm.entity_manager.class' => 'Doctrine\\ORM\\EntityManager',
            'doctrine.orm.manager_configurator.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ManagerConfigurator',
            'doctrine.orm.cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine.orm.cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine.orm.cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine.orm.cache.memcache_host' => 'localhost',
            'doctrine.orm.cache.memcache_port' => 11211,
            'doctrine.orm.cache.memcache_instance.class' => 'Memcache',
            'doctrine.orm.cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine.orm.cache.memcached_host' => 'localhost',
            'doctrine.orm.cache.memcached_port' => 11211,
            'doctrine.orm.cache.memcached_instance.class' => 'Memcached',
            'doctrine.orm.cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine.orm.cache.redis_host' => 'localhost',
            'doctrine.orm.cache.redis_port' => 6379,
            'doctrine.orm.cache.redis_instance.class' => 'Redis',
            'doctrine.orm.cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine.orm.cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine.orm.cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine.orm.metadata.driver_chain.class' => 'Doctrine\\Persistence\\Mapping\\Driver\\MappingDriverChain',
            'doctrine.orm.metadata.annotation.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
            'doctrine.orm.metadata.xml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedXmlDriver',
            'doctrine.orm.metadata.yml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedYamlDriver',
            'doctrine.orm.metadata.php.class' => 'Doctrine\\ORM\\Mapping\\Driver\\PHPDriver',
            'doctrine.orm.metadata.staticphp.class' => 'Doctrine\\ORM\\Mapping\\Driver\\StaticPHPDriver',
            'doctrine.orm.metadata.attribute.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AttributeDriver',
            'doctrine.orm.proxy_cache_warmer.class' => 'Symfony\\Bridge\\Doctrine\\CacheWarmer\\ProxyCacheWarmer',
            'form.type_guesser.doctrine.class' => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser',
            'doctrine.orm.validator.unique.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator',
            'doctrine.orm.validator_initializer.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\DoctrineInitializer',
            'doctrine.orm.security.user.provider.class' => 'Symfony\\Bridge\\Doctrine\\Security\\User\\EntityUserProvider',
            'doctrine.orm.listeners.resolve_target_entity.class' => 'Doctrine\\ORM\\Tools\\ResolveTargetEntityListener',
            'doctrine.orm.listeners.attach_entity_listeners.class' => 'Doctrine\\ORM\\Tools\\AttachEntityListenersListener',
            'doctrine.orm.naming_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultNamingStrategy',
            'doctrine.orm.naming_strategy.underscore.class' => 'Doctrine\\ORM\\Mapping\\UnderscoreNamingStrategy',
            'doctrine.orm.quote_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultQuoteStrategy',
            'doctrine.orm.quote_strategy.ansi.class' => 'Doctrine\\ORM\\Mapping\\AnsiQuoteStrategy',
            'doctrine.orm.entity_listener_resolver.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Mapping\\ContainerEntityListenerResolver',
            'doctrine.orm.second_level_cache.default_cache_factory.class' => 'Doctrine\\ORM\\Cache\\DefaultCacheFactory',
            'doctrine.orm.second_level_cache.default_region.class' => 'Doctrine\\ORM\\Cache\\Region\\DefaultRegion',
            'doctrine.orm.second_level_cache.filelock_region.class' => 'Doctrine\\ORM\\Cache\\Region\\FileLockRegion',
            'doctrine.orm.second_level_cache.logger_chain.class' => 'Doctrine\\ORM\\Cache\\Logging\\CacheLoggerChain',
            'doctrine.orm.second_level_cache.logger_statistics.class' => 'Doctrine\\ORM\\Cache\\Logging\\StatisticsCacheLogger',
            'doctrine.orm.second_level_cache.cache_configuration.class' => 'Doctrine\\ORM\\Cache\\CacheConfiguration',
            'doctrine.orm.second_level_cache.regions_configuration.class' => 'Doctrine\\ORM\\Cache\\RegionsConfiguration',
            'doctrine.orm.auto_generate_proxy_classes' => true,
            'doctrine.orm.enable_lazy_ghost_objects' => true,
            'doctrine.orm.proxy_namespace' => 'Proxies',
            'doctrine.migrations.preferred_em' => NULL,
            'doctrine.migrations.preferred_connection' => NULL,
            'env(VAR_DUMPER_SERVER)' => '127.0.0.1:9912',
            'twig.form.resources' => [
                0 => 'form_div_layout.html.twig',
            ],
            'twig.default_path' => (dirname(__DIR__, 4) . '/templates'),
            'web_profiler.debug_toolbar.intercept_redirects' => false,
            'web_profiler.debug_toolbar.mode' => 2,
            'security.role_hierarchy.roles' => [

            ],
            'security.access.denied_url' => NULL,
            'security.authentication.manager.erase_credentials' => true,
            'security.authentication.session_strategy.strategy' => 'migrate',
            'security.authentication.hide_user_not_found' => true,
            'security.firewalls' => [
                0 => 'dev',
                1 => 'main',
            ],
            'monolog.use_microseconds' => true,
            'monolog.swift_mailer.handlers' => [

            ],
            'monolog.handlers_to_channels' => [
                'monolog.handler.console' => [
                    'type' => 'exclusive',
                    'elements' => [
                        0 => 'event',
                        1 => 'doctrine',
                        2 => 'console',
                    ],
                ],
                'monolog.handler.main' => [
                    'type' => 'exclusive',
                    'elements' => [
                        0 => 'event',
                    ],
                ],
            ],
            'data_collector.templates' => [
                'data_collector.request' => [
                    0 => 'request',
                    1 => '@WebProfiler/Collector/request.html.twig',
                ],
                'data_collector.time' => [
                    0 => 'time',
                    1 => '@WebProfiler/Collector/time.html.twig',
                ],
                'data_collector.memory' => [
                    0 => 'memory',
                    1 => '@WebProfiler/Collector/memory.html.twig',
                ],
                'data_collector.validator' => [
                    0 => 'validator',
                    1 => '@WebProfiler/Collector/validator.html.twig',
                ],
                'data_collector.ajax' => [
                    0 => 'ajax',
                    1 => '@WebProfiler/Collector/ajax.html.twig',
                ],
                'data_collector.form' => [
                    0 => 'form',
                    1 => '@WebProfiler/Collector/form.html.twig',
                ],
                'data_collector.exception' => [
                    0 => 'exception',
                    1 => '@WebProfiler/Collector/exception.html.twig',
                ],
                'data_collector.logger' => [
                    0 => 'logger',
                    1 => '@WebProfiler/Collector/logger.html.twig',
                ],
                'data_collector.events' => [
                    0 => 'events',
                    1 => '@WebProfiler/Collector/events.html.twig',
                ],
                'data_collector.router' => [
                    0 => 'router',
                    1 => '@WebProfiler/Collector/router.html.twig',
                ],
                'data_collector.cache' => [
                    0 => 'cache',
                    1 => '@WebProfiler/Collector/cache.html.twig',
                ],
                'data_collector.translation' => [
                    0 => 'translation',
                    1 => '@WebProfiler/Collector/translation.html.twig',
                ],
                'data_collector.security' => [
                    0 => 'security',
                    1 => '@Security/Collector/security.html.twig',
                ],
                'data_collector.twig' => [
                    0 => 'twig',
                    1 => '@WebProfiler/Collector/twig.html.twig',
                ],
                'data_collector.http_client' => [
                    0 => 'http_client',
                    1 => '@WebProfiler/Collector/http_client.html.twig',
                ],
                'data_collector.doctrine' => [
                    0 => 'db',
                    1 => '@Doctrine/Collector/db.html.twig',
                ],
                'data_collector.dump' => [
                    0 => 'dump',
                    1 => '@Debug/Profiler/dump.html.twig',
                ],
                'data_collector.messenger' => [
                    0 => 'messenger',
                    1 => '@WebProfiler/Collector/messenger.html.twig',
                ],
                'mailer.data_collector' => [
                    0 => 'mailer',
                    1 => '@WebProfiler/Collector/mailer.html.twig',
                ],
                'notifier.data_collector' => [
                    0 => 'notifier',
                    1 => '@WebProfiler/Collector/notifier.html.twig',
                ],
                'serializer.data_collector' => [
                    0 => 'serializer',
                    1 => '@WebProfiler/Collector/serializer.html.twig',
                ],
                'data_collector.config' => [
                    0 => 'config',
                    1 => '@WebProfiler/Collector/config.html.twig',
                ],
            ],
            'console.command.ids' => [

            ],
        ];
    }

    /**
     * Gets the public 'doctrine.dbal.default_connection' shared service.
     *
     * @return \Doctrine\DBAL\Connection
     */
    protected function getDoctrine_Dbal_DefaultConnectionService()
    {
        $a = new \Doctrine\DBAL\Configuration();

        $b = new Logger('doctrine');
        $b->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $b->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        AddDebugLogProcessorPass::configureLogger($b);
        $c = new \Doctrine\Bundle\DoctrineBundle\Middleware\DebugMiddleware(($this->privates['doctrine.debug_data_holder'] ??= new \Doctrine\Bundle\DoctrineBundle\Middleware\BacktraceDebugDataHolder([])), ($this->privates['debug.stopwatch'] ??= new Stopwatch(true)));
        $c->setConnectionName('default');

        $a->setMiddlewares([0 => new \Doctrine\DBAL\Logging\Middleware($b), 1 => $c]);

        return $this->services['doctrine.dbal.default_connection'] = (new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory([]))->createConnection(['url' => $this->getEnv('resolve:DATABASE_URL'), 'driver' => 'pdo_mysql', 'host' => 'localhost', 'port' => NULL, 'user' => 'root', 'password' => NULL, 'driverOptions' => [], 'defaultTableOptions' => []], $a, new \Symfony\Bridge\Doctrine\ContainerAwareEventManager(new ServiceLocator($this->getService, [
            'doctrine.orm.default_listeners.attach_entity_listeners' => ['privates', 'doctrine.orm.default_listeners.attach_entity_listeners', 'getDoctrine_Orm_DefaultListeners_AttachEntityListenersService', true],
            'doctrine.orm.listeners.doctrine_dbal_cache_adapter_schema_subscriber' => ['privates', 'doctrine.orm.listeners.doctrine_dbal_cache_adapter_schema_subscriber', 'getDoctrine_Orm_Listeners_DoctrineDbalCacheAdapterSchemaSubscriberService', true],
            'doctrine.orm.listeners.doctrine_token_provider_schema_subscriber' => ['privates', 'doctrine.orm.listeners.doctrine_token_provider_schema_subscriber', 'getDoctrine_Orm_Listeners_DoctrineTokenProviderSchemaSubscriberService', true],
            'doctrine.orm.messenger.doctrine_schema_subscriber' => ['privates', 'doctrine.orm.messenger.doctrine_schema_subscriber', 'getDoctrine_Orm_Messenger_DoctrineSchemaSubscriberService', true],
        ], [
            'doctrine.orm.default_listeners.attach_entity_listeners' => '?',
            'doctrine.orm.listeners.doctrine_dbal_cache_adapter_schema_subscriber' => '?',
            'doctrine.orm.listeners.doctrine_token_provider_schema_subscriber' => '?',
            'doctrine.orm.messenger.doctrine_schema_subscriber' => '?',
        ]), [0 => 'doctrine.orm.messenger.doctrine_schema_subscriber', 1 => 'doctrine.orm.listeners.doctrine_dbal_cache_adapter_schema_subscriber', 2 => 'doctrine.orm.listeners.doctrine_token_provider_schema_subscriber', 3 => [0 => [0 => 'loadClassMetadata'], 1 => 'doctrine.orm.default_listeners.attach_entity_listeners']]), []);
    }

    /**
     * Gets the private 'data_collector.form' shared service.
     *
     * @return \Symfony\Component\Form\Extension\DataCollector\FormDataCollector
     */
    protected function getDataCollector_FormService()
    {
        return $this->privates['data_collector.form'] = new \Symfony\Component\Form\Extension\DataCollector\FormDataCollector(new \Symfony\Component\Form\Extension\DataCollector\FormDataExtractor());
    }

    /**
     * Gets the public 'event_dispatcher' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher
     */
    protected function getEventDispatcherService()
    {
        $a = new Logger('event');
        $a->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $a->pushHandler(new \Monolog\Handler\NullHandler());
        AddDebugLogProcessorPass::configureLogger($a);

        $this->services['event_dispatcher'] = $instance = new \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher(new \Symfony\Component\EventDispatcher\EventDispatcher(), ($this->privates['debug.stopwatch'] ??= new Stopwatch(true)), $a, ($this->services['request_stack'] ??= new RequestStack()));

        $instance->addListener('kernel.controller', [0 => #[Closure(name: 'data_collector.router', class: 'Symfony\\Bundle\\FrameworkBundle\\DataCollector\\RouterDataCollector')] function () {
            return ($this->privates['data_collector.router'] ??= new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector());
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\CheckPassportEvent', [0 => #[Closure(name: 'security.listener.user_provider', class: 'Symfony\\Component\\Security\\Http\\EventListener\\UserProviderListener')] function () {
            return ($this->privates['security.listener.user_provider'] ?? $this->load('getSecurity_Listener_UserProviderService'));
        }, 1 => 'checkPassport'], 1024);
        $instance->addListener('kernel.response', [0 => #[Closure(name: 'security.context_listener.0', class: 'Symfony\\Component\\Security\\Http\\Firewall\\ContextListener')] function () {
            return ($this->privates['security.context_listener.0'] ?? $this->getSecurity_ContextListener_0Service());
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.response', [0 => #[Closure(name: 'response_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\ResponseListener')] function () {
            return ($this->privates['response_listener'] ??= new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8', false));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => #[Closure(name: 'locale_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\LocaleListener')] function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListenerService());
        }, 1 => 'setDefaultLocale'], 100);
        $instance->addListener('kernel.request', [0 => #[Closure(name: 'locale_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\LocaleListener')] function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListenerService());
        }, 1 => 'onKernelRequest'], 16);
        $instance->addListener('kernel.finish_request', [0 => #[Closure(name: 'locale_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\LocaleListener')] function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListenerService());
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.request', [0 => #[Closure(name: 'validate_request_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\ValidateRequestListener')] function () {
            return ($this->privates['validate_request_listener'] ??= new \Symfony\Component\HttpKernel\EventListener\ValidateRequestListener());
        }, 1 => 'onKernelRequest'], 256);
        $instance->addListener('kernel.response', [0 => #[Closure(name: 'disallow_search_engine_index_response_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\DisallowRobotsIndexingListener')] function () {
            return ($this->privates['disallow_search_engine_index_response_listener'] ??= new \Symfony\Component\HttpKernel\EventListener\DisallowRobotsIndexingListener());
        }, 1 => 'onResponse'], -255);
        $instance->addListener('kernel.controller_arguments', [0 => #[Closure(name: 'exception_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\ErrorListener')] function () {
            return ($this->privates['exception_listener'] ?? $this->getExceptionListenerService());
        }, 1 => 'onControllerArguments'], 0);
        $instance->addListener('kernel.exception', [0 => #[Closure(name: 'exception_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\ErrorListener')] function () {
            return ($this->privates['exception_listener'] ?? $this->getExceptionListenerService());
        }, 1 => 'logKernelException'], 0);
        $instance->addListener('kernel.exception', [0 => #[Closure(name: 'exception_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\ErrorListener')] function () {
            return ($this->privates['exception_listener'] ?? $this->getExceptionListenerService());
        }, 1 => 'onKernelException'], -128);
        $instance->addListener('kernel.response', [0 => #[Closure(name: 'exception_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\ErrorListener')] function () {
            return ($this->privates['exception_listener'] ?? $this->getExceptionListenerService());
        }, 1 => 'removeCspHeader'], -128);
        $instance->addListener('kernel.controller_arguments', [0 => #[Closure(name: 'controller.cache_attribute_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\CacheAttributeListener')] function () {
            return ($this->privates['controller.cache_attribute_listener'] ??= new \Symfony\Component\HttpKernel\EventListener\CacheAttributeListener());
        }, 1 => 'onKernelControllerArguments'], 10);
        $instance->addListener('kernel.response', [0 => #[Closure(name: 'controller.cache_attribute_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\CacheAttributeListener')] function () {
            return ($this->privates['controller.cache_attribute_listener'] ??= new \Symfony\Component\HttpKernel\EventListener\CacheAttributeListener());
        }, 1 => 'onKernelResponse'], -10);
        $instance->addListener('kernel.request', [0 => #[Closure(name: 'locale_aware_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\LocaleAwareListener')] function () {
            return ($this->privates['locale_aware_listener'] ?? $this->getLocaleAwareListenerService());
        }, 1 => 'onKernelRequest'], 15);
        $instance->addListener('kernel.finish_request', [0 => #[Closure(name: 'locale_aware_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\LocaleAwareListener')] function () {
            return ($this->privates['locale_aware_listener'] ?? $this->getLocaleAwareListenerService());
        }, 1 => 'onKernelFinishRequest'], -15);
        $instance->addListener('console.error', [0 => #[Closure(name: 'console.error_listener', class: 'Symfony\\Component\\Console\\EventListener\\ErrorListener')] function () {
            return ($this->privates['console.error_listener'] ?? $this->load('getConsole_ErrorListenerService'));
        }, 1 => 'onConsoleError'], -128);
        $instance->addListener('console.terminate', [0 => #[Closure(name: 'console.error_listener', class: 'Symfony\\Component\\Console\\EventListener\\ErrorListener')] function () {
            return ($this->privates['console.error_listener'] ?? $this->load('getConsole_ErrorListenerService'));
        }, 1 => 'onConsoleTerminate'], -128);
        $instance->addListener('console.error', [0 => #[Closure(name: 'console.suggest_missing_package_subscriber', class: 'Symfony\\Bundle\\FrameworkBundle\\EventListener\\SuggestMissingPackageSubscriber')] function () {
            return ($this->privates['console.suggest_missing_package_subscriber'] ??= new \Symfony\Bundle\FrameworkBundle\EventListener\SuggestMissingPackageSubscriber());
        }, 1 => 'onConsoleError'], 0);
        $instance->addListener('Symfony\\Component\\Mailer\\Event\\MessageEvent', [0 => #[Closure(name: 'mailer.envelope_listener', class: 'Symfony\\Component\\Mailer\\EventListener\\EnvelopeListener')] function () {
            return ($this->privates['mailer.envelope_listener'] ??= new \Symfony\Component\Mailer\EventListener\EnvelopeListener(NULL, NULL));
        }, 1 => 'onMessage'], -255);
        $instance->addListener('Symfony\\Component\\Mailer\\Event\\MessageEvent', [0 => #[Closure(name: 'mailer.message_logger_listener', class: 'Symfony\\Component\\Mailer\\EventListener\\MessageLoggerListener')] function () {
            return ($this->privates['mailer.message_logger_listener'] ??= new \Symfony\Component\Mailer\EventListener\MessageLoggerListener());
        }, 1 => 'onMessage'], -255);
        $instance->addListener('Symfony\\Component\\Mailer\\Event\\MessageEvent', [0 => #[Closure(name: 'mailer.messenger_transport_listener', class: 'Symfony\\Component\\Mailer\\EventListener\\MessengerTransportListener')] function () {
            return ($this->privates['mailer.messenger_transport_listener'] ??= new \Symfony\Component\Mailer\EventListener\MessengerTransportListener());
        }, 1 => 'onMessage'], 0);
        $instance->addListener('kernel.request', [0 => #[Closure(name: 'debug.debug_handlers_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\DebugHandlersListener')] function () {
            return ($this->privates['debug.debug_handlers_listener'] ?? $this->getDebug_DebugHandlersListenerService());
        }, 1 => 'configure'], 2048);
        $instance->addListener('console.command', [0 => #[Closure(name: 'debug.debug_handlers_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\DebugHandlersListener')] function () {
            return ($this->privates['debug.debug_handlers_listener'] ?? $this->getDebug_DebugHandlersListenerService());
        }, 1 => 'configure'], 2048);
        $instance->addListener('kernel.request', [0 => #[Closure(name: 'router_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\RouterListener')] function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelRequest'], 32);
        $instance->addListener('kernel.finish_request', [0 => #[Closure(name: 'router_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\RouterListener')] function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.exception', [0 => #[Closure(name: 'router_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\RouterListener')] function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelException'], -64);
        $instance->addListener('kernel.response', [0 => #[Closure(name: 'web_link.add_link_header_listener', class: 'Symfony\\Component\\WebLink\\EventListener\\AddLinkHeaderListener')] function () {
            return ($this->privates['web_link.add_link_header_listener'] ??= new \Symfony\Component\WebLink\EventListener\AddLinkHeaderListener());
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => #[Closure(name: 'session_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\SessionListener')] function () {
            return ($this->privates['session_listener'] ?? $this->getSessionListenerService());
        }, 1 => 'onKernelRequest'], 128);
        $instance->addListener('kernel.response', [0 => #[Closure(name: 'session_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\SessionListener')] function () {
            return ($this->privates['session_listener'] ?? $this->getSessionListenerService());
        }, 1 => 'onKernelResponse'], -1000);
        $instance->addListener('Symfony\\Component\\Messenger\\Event\\WorkerMessageFailedEvent', [0 => #[Closure(name: 'messenger.retry.send_failed_message_for_retry_listener', class: 'Symfony\\Component\\Messenger\\EventListener\\SendFailedMessageForRetryListener')] function () {
            return ($this->privates['messenger.retry.send_failed_message_for_retry_listener'] ?? $this->load('getMessenger_Retry_SendFailedMessageForRetryListenerService'));
        }, 1 => 'onMessageFailed'], 100);
        $instance->addListener('Symfony\\Component\\Messenger\\Event\\WorkerMessageFailedEvent', [0 => #[Closure(name: 'messenger.failure.add_error_details_stamp_listener', class: 'Symfony\\Component\\Messenger\\EventListener\\AddErrorDetailsStampListener')] function () {
            return ($this->privates['messenger.failure.add_error_details_stamp_listener'] ??= new \Symfony\Component\Messenger\EventListener\AddErrorDetailsStampListener());
        }, 1 => 'onMessageFailed'], 200);
        $instance->addListener('Symfony\\Component\\Messenger\\Event\\WorkerMessageFailedEvent', [0 => #[Closure(name: 'messenger.failure.send_failed_message_to_failure_transport_listener', class: 'Symfony\\Component\\Messenger\\EventListener\\SendFailedMessageToFailureTransportListener')] function () {
            return ($this->privates['messenger.failure.send_failed_message_to_failure_transport_listener'] ?? $this->load('getMessenger_Failure_SendFailedMessageToFailureTransportListenerService'));
        }, 1 => 'onMessageFailed'], -100);
        $instance->addListener('Symfony\\Component\\Messenger\\Event\\WorkerStartedEvent', [0 => #[Closure(name: 'messenger.listener.stop_worker_on_restart_signal_listener', class: 'Symfony\\Component\\Messenger\\EventListener\\StopWorkerOnRestartSignalListener')] function () {
            return ($this->privates['messenger.listener.stop_worker_on_restart_signal_listener'] ?? $this->load('getMessenger_Listener_StopWorkerOnRestartSignalListenerService'));
        }, 1 => 'onWorkerStarted'], 0);
        $instance->addListener('Symfony\\Component\\Messenger\\Event\\WorkerRunningEvent', [0 => #[Closure(name: 'messenger.listener.stop_worker_on_restart_signal_listener', class: 'Symfony\\Component\\Messenger\\EventListener\\StopWorkerOnRestartSignalListener')] function () {
            return ($this->privates['messenger.listener.stop_worker_on_restart_signal_listener'] ?? $this->load('getMessenger_Listener_StopWorkerOnRestartSignalListenerService'));
        }, 1 => 'onWorkerRunning'], 0);
        $instance->addListener('Symfony\\Component\\Messenger\\Event\\WorkerMessageFailedEvent', [0 => #[Closure(name: 'messenger.listener.stop_worker_on_stop_exception_listener', class: 'Symfony\\Component\\Messenger\\EventListener\\StopWorkerOnCustomStopExceptionListener')] function () {
            return ($this->privates['messenger.listener.stop_worker_on_stop_exception_listener'] ??= new \Symfony\Component\Messenger\EventListener\StopWorkerOnCustomStopExceptionListener());
        }, 1 => 'onMessageFailed'], 0);
        $instance->addListener('Symfony\\Component\\Messenger\\Event\\WorkerRunningEvent', [0 => #[Closure(name: 'messenger.listener.stop_worker_on_stop_exception_listener', class: 'Symfony\\Component\\Messenger\\EventListener\\StopWorkerOnCustomStopExceptionListener')] function () {
            return ($this->privates['messenger.listener.stop_worker_on_stop_exception_listener'] ??= new \Symfony\Component\Messenger\EventListener\StopWorkerOnCustomStopExceptionListener());
        }, 1 => 'onWorkerRunning'], 0);
        $instance->addListener('Symfony\\Component\\Notifier\\Event\\MessageEvent', [0 => #[Closure(name: 'notifier.logger_notification_listener', class: 'Symfony\\Component\\Notifier\\EventListener\\NotificationLoggerListener')] function () {
            return ($this->privates['notifier.logger_notification_listener'] ??= new \Symfony\Component\Notifier\EventListener\NotificationLoggerListener());
        }, 1 => 'onNotification'], -255);
        $instance->addListener('kernel.response', [0 => #[Closure(name: 'profiler_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\ProfilerListener')] function () {
            return ($this->privates['profiler_listener'] ?? $this->getProfilerListenerService());
        }, 1 => 'onKernelResponse'], -100);
        $instance->addListener('kernel.exception', [0 => #[Closure(name: 'profiler_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\ProfilerListener')] function () {
            return ($this->privates['profiler_listener'] ?? $this->getProfilerListenerService());
        }, 1 => 'onKernelException'], 0);
        $instance->addListener('kernel.terminate', [0 => #[Closure(name: 'profiler_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\ProfilerListener')] function () {
            return ($this->privates['profiler_listener'] ?? $this->getProfilerListenerService());
        }, 1 => 'onKernelTerminate'], -1024);
        $instance->addListener('kernel.controller', [0 => #[Closure(name: 'data_collector.request', class: 'Symfony\\Component\\HttpKernel\\DataCollector\\RequestDataCollector')] function () {
            return ($this->privates['data_collector.request'] ?? $this->getDataCollector_RequestService());
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.response', [0 => #[Closure(name: 'data_collector.request', class: 'Symfony\\Component\\HttpKernel\\DataCollector\\RequestDataCollector')] function () {
            return ($this->privates['data_collector.request'] ?? $this->getDataCollector_RequestService());
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('Symfony\\Component\\Messenger\\Event\\WorkerMessageHandledEvent', [0 => #[Closure(name: 'doctrine.orm.messenger.event_subscriber.doctrine_clear_entity_manager', class: 'Symfony\\Bridge\\Doctrine\\Messenger\\DoctrineClearEntityManagerWorkerSubscriber')] function () {
            return ($this->privates['doctrine.orm.messenger.event_subscriber.doctrine_clear_entity_manager'] ?? $this->load('getDoctrine_Orm_Messenger_EventSubscriber_DoctrineClearEntityManagerService'));
        }, 1 => 'onWorkerMessageHandled'], 0);
        $instance->addListener('Symfony\\Component\\Messenger\\Event\\WorkerMessageFailedEvent', [0 => #[Closure(name: 'doctrine.orm.messenger.event_subscriber.doctrine_clear_entity_manager', class: 'Symfony\\Bridge\\Doctrine\\Messenger\\DoctrineClearEntityManagerWorkerSubscriber')] function () {
            return ($this->privates['doctrine.orm.messenger.event_subscriber.doctrine_clear_entity_manager'] ?? $this->load('getDoctrine_Orm_Messenger_EventSubscriber_DoctrineClearEntityManagerService'));
        }, 1 => 'onWorkerMessageFailed'], 0);
        $instance->addListener('console.command', [0 => #[Closure(name: 'debug.dump_listener', class: 'Symfony\\Component\\HttpKernel\\EventListener\\DumpListener')] function () {
            return ($this->privates['debug.dump_listener'] ?? $this->load('getDebug_DumpListenerService'));
        }, 1 => 'configure'], 1024);
        $instance->addListener('kernel.view', [0 => #[Closure(name: 'controller.template_attribute_listener', class: 'Symfony\\Bridge\\Twig\\EventListener\\TemplateAttributeListener')] function () {
            return ($this->privates['controller.template_attribute_listener'] ?? $this->load('getController_TemplateAttributeListenerService'));
        }, 1 => 'onKernelView'], -128);
        $instance->addListener('Symfony\\Component\\Mailer\\Event\\MessageEvent', [0 => #[Closure(name: 'twig.mailer.message_listener', class: 'Symfony\\Component\\Mailer\\EventListener\\MessageListener')] function () {
            return ($this->privates['twig.mailer.message_listener'] ?? $this->load('getTwig_Mailer_MessageListenerService'));
        }, 1 => 'onMessage'], 0);
        $instance->addListener('kernel.response', [0 => #[Closure(name: 'web_profiler.debug_toolbar', class: 'Symfony\\Bundle\\WebProfilerBundle\\EventListener\\WebDebugToolbarListener')] function () {
            return ($this->privates['web_profiler.debug_toolbar'] ?? $this->getWebProfiler_DebugToolbarService());
        }, 1 => 'onKernelResponse'], -128);
        $instance->addListener('kernel.controller_arguments', [0 => #[Closure(name: 'controller.is_granted_attribute_listener', class: 'Symfony\\Component\\Security\\Http\\EventListener\\IsGrantedAttributeListener')] function () {
            return ($this->privates['controller.is_granted_attribute_listener'] ?? $this->getController_IsGrantedAttributeListenerService());
        }, 1 => 'onKernelControllerArguments'], 20);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\CheckPassportEvent', [0 => #[Closure(name: 'security.listener.check_authenticator_credentials', class: 'Symfony\\Component\\Security\\Http\\EventListener\\CheckCredentialsListener')] function () {
            return ($this->privates['security.listener.check_authenticator_credentials'] ?? $this->load('getSecurity_Listener_CheckAuthenticatorCredentialsService'));
        }, 1 => 'checkPassport'], 0);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\LoginSuccessEvent', [0 => #[Closure(name: 'security.listener.password_migrating', class: 'Symfony\\Component\\Security\\Http\\EventListener\\PasswordMigratingListener')] function () {
            return ($this->privates['security.listener.password_migrating'] ?? $this->load('getSecurity_Listener_PasswordMigratingService'));
        }, 1 => 'onLoginSuccess'], 0);
        $instance->addListener('debug.security.authorization.vote', [0 => #[Closure(name: 'debug.security.voter.vote_listener', class: 'Symfony\\Bundle\\SecurityBundle\\EventListener\\VoteListener')] function () {
            return ($this->privates['debug.security.voter.vote_listener'] ?? $this->load('getDebug_Security_Voter_VoteListenerService'));
        }, 1 => 'onVoterVote'], 0);
        $instance->addListener('kernel.request', [0 => #[Closure(name: 'debug.security.firewall', class: 'Symfony\\Bundle\\SecurityBundle\\Debug\\TraceableFirewallListener')] function () {
            return ($this->privates['debug.security.firewall'] ?? $this->getDebug_Security_FirewallService());
        }, 1 => 'configureLogoutUrlGenerator'], 8);
        $instance->addListener('kernel.request', [0 => #[Closure(name: 'debug.security.firewall', class: 'Symfony\\Bundle\\SecurityBundle\\Debug\\TraceableFirewallListener')] function () {
            return ($this->privates['debug.security.firewall'] ?? $this->getDebug_Security_FirewallService());
        }, 1 => 'onKernelRequest'], 8);
        $instance->addListener('kernel.finish_request', [0 => #[Closure(name: 'debug.security.firewall', class: 'Symfony\\Bundle\\SecurityBundle\\Debug\\TraceableFirewallListener')] function () {
            return ($this->privates['debug.security.firewall'] ?? $this->getDebug_Security_FirewallService());
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('console.command', [0 => #[Closure(name: 'monolog.handler.console', class: 'Symfony\\Bridge\\Monolog\\Handler\\ConsoleHandler')] function () {
            return ($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService());
        }, 1 => 'onCommand'], 255);
        $instance->addListener('console.terminate', [0 => #[Closure(name: 'monolog.handler.console', class: 'Symfony\\Bridge\\Monolog\\Handler\\ConsoleHandler')] function () {
            return ($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService());
        }, 1 => 'onTerminate'], -255);
        $instance->addListener('console.error', [0 => #[Closure(name: 'maker.console_error_listener', class: 'Symfony\\Bundle\\MakerBundle\\Event\\ConsoleErrorSubscriber')] function () {
            return ($this->privates['maker.console_error_listener'] ??= new \Symfony\Bundle\MakerBundle\Event\ConsoleErrorSubscriber());
        }, 1 => 'onConsoleError'], 0);
        $instance->addListener('console.terminate', [0 => #[Closure(name: 'maker.console_error_listener', class: 'Symfony\\Bundle\\MakerBundle\\Event\\ConsoleErrorSubscriber')] function () {
            return ($this->privates['maker.console_error_listener'] ??= new \Symfony\Bundle\MakerBundle\Event\ConsoleErrorSubscriber());
        }, 1 => 'onConsoleTerminate'], 0);
        $instance->addListener('kernel.controller', [0 => #[Closure(name: 'sensio_framework_extra.controller.listener', class: 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ControllerListener')] function () {
            return ($this->privates['sensio_framework_extra.controller.listener'] ?? $this->getSensioFrameworkExtra_Controller_ListenerService());
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.controller', [0 => #[Closure(name: 'sensio_framework_extra.converter.listener', class: 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ParamConverterListener')] function () {
            return ($this->privates['sensio_framework_extra.converter.listener'] ?? $this->getSensioFrameworkExtra_Converter_ListenerService());
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.controller', [0 => #[Closure(name: 'sensio_framework_extra.view.listener', class: 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\TemplateListener')] function () {
            return ($this->privates['sensio_framework_extra.view.listener'] ?? $this->getSensioFrameworkExtra_View_ListenerService());
        }, 1 => 'onKernelController'], -128);
        $instance->addListener('kernel.view', [0 => #[Closure(name: 'sensio_framework_extra.view.listener', class: 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\TemplateListener')] function () {
            return ($this->privates['sensio_framework_extra.view.listener'] ?? $this->getSensioFrameworkExtra_View_ListenerService());
        }, 1 => 'onKernelView'], 0);
        $instance->addListener('kernel.controller', [0 => #[Closure(name: 'sensio_framework_extra.cache.listener', class: 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\HttpCacheListener')] function () {
            return ($this->privates['sensio_framework_extra.cache.listener'] ??= new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener());
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.response', [0 => #[Closure(name: 'sensio_framework_extra.cache.listener', class: 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\HttpCacheListener')] function () {
            return ($this->privates['sensio_framework_extra.cache.listener'] ??= new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener());
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.controller_arguments', [0 => #[Closure(name: 'sensio_framework_extra.security.listener', class: 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\SecurityListener')] function () {
            return ($this->privates['sensio_framework_extra.security.listener'] ?? $this->getSensioFrameworkExtra_Security_ListenerService());
        }, 1 => 'onKernelControllerArguments'], 0);
        $instance->addListener('kernel.controller_arguments', [0 => #[Closure(name: 'framework_extra_bundle.event.is_granted', class: 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\IsGrantedListener')] function () {
            return ($this->privates['framework_extra_bundle.event.is_granted'] ?? $this->getFrameworkExtraBundle_Event_IsGrantedService());
        }, 1 => 'onKernelControllerArguments'], 0);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\CheckPassportEvent', [0 => #[Closure(name: 'security.listener.csrf_protection', class: 'Symfony\\Component\\Security\\Http\\EventListener\\CsrfProtectionListener')] function () {
            return ($this->privates['security.listener.csrf_protection'] ?? $this->load('getSecurity_Listener_CsrfProtectionService'));
        }, 1 => 'checkPassport'], 512);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\LogoutEvent', [0 => #[Closure(name: 'security.logout.listener.csrf_token_clearing', class: 'Symfony\\Component\\Security\\Http\\EventListener\\CsrfTokenClearingLogoutListener')] function () {
            return ($this->privates['security.logout.listener.csrf_token_clearing'] ?? $this->load('getSecurity_Logout_Listener_CsrfTokenClearingService'));
        }, 1 => 'onLogout'], 0);

        return $instance;
    }

    /**
     * Gets the private 'security.context_listener.0' shared service.
     *
     * @return \Symfony\Component\Security\Http\Firewall\ContextListener
     */
    protected function getSecurity_ContextListener_0Service()
    {
        return $this->privates['security.context_listener.0'] = new \Symfony\Component\Security\Http\Firewall\ContextListener(($this->privates['security.untracked_token_storage'] ??= new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage()), new RewindableGenerator(function () {
            yield 0 => ($this->privates['security.user.provider.concrete.users_in_memory'] ??= new \Symfony\Component\Security\Core\User\InMemoryUserProvider([]));
        }, 1), 'main', ($this->privates['monolog.logger.security'] ?? $this->getMonolog_Logger_SecurityService()), ($this->privates['security.event_dispatcher.main'] ?? $this->getSecurity_EventDispatcher_MainService()), ($this->privates['security.authentication.trust_resolver'] ??= new AuthenticationTrustResolver()), [0 => ($this->privates['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), 1 => 'enableUsageTracking']);
    }

    /**
     * Gets the private 'monolog.logger.security' shared service.
     *
     * @return Logger
     */
    protected function getMonolog_Logger_SecurityService()
    {
        $this->privates['monolog.logger.security'] = $instance = new Logger('security');

        $instance->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        AddDebugLogProcessorPass::configureLogger($instance);

        return $instance;
    }

    /**
     * Gets the private 'security.event_dispatcher.main' shared service.
     *
     * @return \Symfony\Component\EventDispatcher\EventDispatcher
     */
    protected function getSecurity_EventDispatcher_MainService()
    {
        $this->privates['security.event_dispatcher.main'] = $instance = new \Symfony\Component\EventDispatcher\EventDispatcher();

        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\CheckPassportEvent', [0 => #[Closure(name: 'security.listener.main.user_provider', class: 'Symfony\\Component\\Security\\Http\\EventListener\\UserProviderListener')] function () {
            return ($this->privates['security.listener.main.user_provider'] ?? $this->load('getSecurity_Listener_Main_UserProviderService'));
        }, 1 => 'checkPassport'], 2048);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\LoginSuccessEvent', [0 => #[Closure(name: 'security.listener.session.main', class: 'Symfony\\Component\\Security\\Http\\EventListener\\SessionStrategyListener')] function () {
            return ($this->privates['security.listener.session.main'] ?? $this->load('getSecurity_Listener_Session_MainService'));
        }, 1 => 'onSuccessfulLogin'], 0);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\CheckPassportEvent', [0 => #[Closure(name: 'security.listener.user_checker.main', class: 'Symfony\\Component\\Security\\Http\\EventListener\\UserCheckerListener')] function () {
            return ($this->privates['security.listener.user_checker.main'] ?? $this->load('getSecurity_Listener_UserChecker_MainService'));
        }, 1 => 'preCheckCredentials'], 256);
        $instance->addListener('security.authentication.success', [0 => #[Closure(name: 'security.listener.user_checker.main', class: 'Symfony\\Component\\Security\\Http\\EventListener\\UserCheckerListener')] function () {
            return ($this->privates['security.listener.user_checker.main'] ?? $this->load('getSecurity_Listener_UserChecker_MainService'));
        }, 1 => 'postCheckCredentials'], 256);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\CheckPassportEvent', [0 => #[Closure(name: 'security.listener.user_provider', class: 'Symfony\\Component\\Security\\Http\\EventListener\\UserProviderListener')] function () {
            return ($this->privates['security.listener.user_provider'] ?? $this->load('getSecurity_Listener_UserProviderService'));
        }, 1 => 'checkPassport'], 1024);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\CheckPassportEvent', [0 => #[Closure(name: 'security.listener.check_authenticator_credentials', class: 'Symfony\\Component\\Security\\Http\\EventListener\\CheckCredentialsListener')] function () {
            return ($this->privates['security.listener.check_authenticator_credentials'] ?? $this->load('getSecurity_Listener_CheckAuthenticatorCredentialsService'));
        }, 1 => 'checkPassport'], 0);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\LoginSuccessEvent', [0 => #[Closure(name: 'security.listener.password_migrating', class: 'Symfony\\Component\\Security\\Http\\EventListener\\PasswordMigratingListener')] function () {
            return ($this->privates['security.listener.password_migrating'] ?? $this->load('getSecurity_Listener_PasswordMigratingService'));
        }, 1 => 'onLoginSuccess'], 0);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\CheckPassportEvent', [0 => #[Closure(name: 'security.listener.csrf_protection', class: 'Symfony\\Component\\Security\\Http\\EventListener\\CsrfProtectionListener')] function () {
            return ($this->privates['security.listener.csrf_protection'] ?? $this->load('getSecurity_Listener_CsrfProtectionService'));
        }, 1 => 'checkPassport'], 512);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\LogoutEvent', [0 => #[Closure(name: 'security.logout.listener.csrf_token_clearing', class: 'Symfony\\Component\\Security\\Http\\EventListener\\CsrfTokenClearingLogoutListener')] function () {
            return ($this->privates['security.logout.listener.csrf_token_clearing'] ?? $this->load('getSecurity_Logout_Listener_CsrfTokenClearingService'));
        }, 1 => 'onLogout'], 0);

        return $instance;
    }

    /**
     * Gets the private 'security.token_storage' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\Token\Storage\UsageTrackingTokenStorage
     */
    protected function getSecurity_TokenStorageService()
    {
        return $this->privates['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\UsageTrackingTokenStorage(($this->privates['security.untracked_token_storage'] ??= new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage()), new ServiceLocator($this->getService, [
            'request_stack' => ['services', 'request_stack', 'getRequestStackService', false],
        ], [
            'request_stack' => '?',
        ]));
    }

    /**
     * Gets the private 'locale_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleListener
     */
    protected function getLocaleListenerService()
    {
        return $this->privates['locale_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleListener(($this->services['request_stack'] ??= new RequestStack()), 'en', ($this->services['router'] ?? $this->getRouterService()), false, []);
    }

    /**
     * Gets the public 'router' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Routing\Router
     */
    protected function getRouterService()
    {
        $a = new Logger('router');
        $a->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $a->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $a->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        AddDebugLogProcessorPass::configureLogger($a);

        $this->services['router'] = $instance = new \Symfony\Bundle\FrameworkBundle\Routing\Router((new ServiceLocator($this->getService, [
            'routing.loader' => ['services', 'routing.loader', 'getRouting_LoaderService', true],
        ], [
            'routing.loader' => 'Symfony\\Component\\Config\\Loader\\LoaderInterface',
        ]))->withContext('router.default', $this), 'kernel::loadRoutes', ['cache_dir' => $this->targetDir . '', 'debug' => true, 'generator_class' => 'Symfony\\Component\\Routing\\Generator\\CompiledUrlGenerator', 'generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\CompiledUrlGeneratorDumper', 'matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableCompiledUrlMatcher', 'matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\CompiledUrlMatcherDumper', 'strict_requirements' => true, 'resource_type' => 'service'], ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()), ($this->privates['parameter_bag'] ??= new ContainerBag($this)), $a, 'en');

        $instance->setConfigCacheFactory(($this->privates['config_cache_factory'] ?? $this->getConfigCacheFactoryService()));
        $instance->addExpressionLanguageProvider(($this->privates['router.expression_language_provider'] ?? $this->getRouter_ExpressionLanguageProviderService()));

        return $instance;
    }

    /**
     * Gets the private 'router.request_context' shared service.
     *
     * @return \Symfony\Component\Routing\RequestContext
     */
    protected function getRouter_RequestContextService()
    {
        $this->privates['router.request_context'] = $instance = \Symfony\Component\Routing\RequestContext::fromUri('', 'localhost', 'http', 80, 443);

        $instance->setParameter('_functions', ($this->privates['router.expression_language_provider'] ?? $this->getRouter_ExpressionLanguageProviderService()));

        return $instance;
    }

    public function setParameter(string $name, $value): void
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    /**
     * Gets the private 'router.expression_language_provider' shared service.
     *
     * @return \Symfony\Component\Routing\Matcher\ExpressionLanguageProvider
     */
    protected function getRouter_ExpressionLanguageProviderService()
    {
        return $this->privates['router.expression_language_provider'] = new \Symfony\Component\Routing\Matcher\ExpressionLanguageProvider(new ServiceLocator($this->getService, [
            'env' => ['privates', 'container.getenv', 'getContainer_GetenvService', true],
            'service' => ['services', 'container.get_routing_condition_service', 'getContainer_GetRoutingConditionServiceService', true],
        ], [
            'env' => 'Closure',
            'service' => 'Closure',
        ]));
    }

    /**
     * Gets the private 'exception_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ErrorListener
     */
    protected function getExceptionListenerService()
    {
        return $this->privates['exception_listener'] = new \Symfony\Component\HttpKernel\EventListener\ErrorListener('error_controller', ($this->privates['monolog.logger.request'] ?? $this->getMonolog_Logger_RequestService()), true, []);
    }

    /**
     * Gets the private 'monolog.logger.request' shared service.
     *
     * @return Logger
     */
    protected function getMonolog_Logger_RequestService()
    {
        $this->privates['monolog.logger.request'] = $instance = new Logger('request');

        $instance->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        AddDebugLogProcessorPass::configureLogger($instance);

        return $instance;
    }

    /**
     * Gets the private 'locale_aware_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleAwareListener
     */
    protected function getLocaleAwareListenerService()
    {
        return $this->privates['locale_aware_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleAwareListener(new RewindableGenerator(function () {
            yield 0 => ($this->privates['slugger'] ??= new \Symfony\Component\String\Slugger\AsciiSlugger('en'));
            yield 1 => ($this->privates['translator.default'] ?? $this->getTranslator_DefaultService());
            yield 2 => ($this->privates['translation.locale_switcher'] ?? $this->load('getTranslation_LocaleSwitcherService'));
        }, 3), ($this->services['request_stack'] ??= new RequestStack()));
    }

    /**
     * Gets the private 'debug.debug_handlers_listener' shared service.
     *
     * @return DebugHandlersListener
     */
    protected function getDebug_DebugHandlersListenerService()
    {
        $a = new Logger('php');
        $a->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $a->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $a->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        AddDebugLogProcessorPass::configureLogger($a);

        return $this->privates['debug.debug_handlers_listener'] = new DebugHandlersListener(NULL, $a, NULL, -1, true, true, ($this->services['monolog.logger.deprecation'] ?? $this->getMonolog_Logger_DeprecationService()));
    }

    /**
     * Gets the public 'monolog.logger.deprecation' shared service.
     *
     * @return Logger
     */
    protected function getMonolog_Logger_DeprecationService()
    {
        $this->services['monolog.logger.deprecation'] = $instance = new Logger('deprecation');

        $instance->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        AddDebugLogProcessorPass::configureLogger($instance);

        return $instance;
    }

    /**
     * Gets the private 'router_listener' shared service.
     *
     * @return RouterListener
     */
    protected function getRouterListenerService()
    {
        return $this->privates['router_listener'] = new RouterListener(($this->services['router'] ?? $this->getRouterService()), ($this->services['request_stack'] ??= new RequestStack()), ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()), ($this->privates['monolog.logger.request'] ?? $this->getMonolog_Logger_RequestService()), dirname(__DIR__, 4), true);
    }

    /**
     * Gets the private 'session_listener' shared service.
     *
     * @return SessionListener
     */
    protected function getSessionListenerService()
    {
        return $this->privates['session_listener'] = new SessionListener(new ServiceLocator($this->getService, [
            'logger' => ['privates', 'monolog.logger', 'getMonolog_LoggerService', false],
            'session_collector' => ['privates', 'data_collector.request.session_collector', 'getDataCollector_Request_SessionCollectorService', true],
            'session_factory' => ['privates', 'session.factory', 'getSession_FactoryService', true],
        ], [
            'logger' => '?',
            'session_collector' => '?',
            'session_factory' => '?',
        ]), true, $this->parameters['session.storage.options']);
    }

    /**
     * Gets the private 'profiler_listener' shared service.
     *
     * @return ProfilerListener
     */
    protected function getProfilerListenerService()
    {
        $a = ($this->services['.container.private.profiler'] ?? $this->get_Container_Private_ProfilerService());

        if (isset($this->privates['profiler_listener'])) {
            return $this->privates['profiler_listener'];
        }

        return $this->privates['profiler_listener'] = new ProfilerListener($a, ($this->services['request_stack'] ??= new RequestStack()), NULL, false, false, NULL);
    }

    /**
     * Gets the private 'web_profiler.debug_toolbar' shared service.
     *
     * @return WebDebugToolbarListener
     */
    protected function getWebProfiler_DebugToolbarService()
    {
        $a = ($this->privates['twig'] ?? $this->getTwigService());

        if (isset($this->privates['web_profiler.debug_toolbar'])) {
            return $this->privates['web_profiler.debug_toolbar'];
        }

        return $this->privates['web_profiler.debug_toolbar'] = new WebDebugToolbarListener($a, false, 2, ($this->services['router'] ?? $this->getRouterService()), '^/((index|app(_[\\w]+)?)\\.php/)?_wdt', ($this->privates['web_profiler.csp.handler'] ?? $this->getWebProfiler_Csp_HandlerService()), ($this->services['data_collector.dump'] ?? $this->getDataCollector_DumpService()));
    }

    /**
     * Gets the private 'twig' shared service.
     *
     * @return Environment
     */
    protected function getTwigService()
    {
        $a = new FilesystemLoader([], dirname(__DIR__, 4));
        $a->addPath((dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle/Resources/views'), 'Doctrine');
        $a->addPath((dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-bundle/Resources/views'), '!Doctrine');
        $a->addPath((dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-migrations-bundle/Resources/views'), 'DoctrineMigrations');
        $a->addPath((dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'doctrine-migrations-bundle/Resources/views'), '!DoctrineMigrations');
        $a->addPath((dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'debug-bundle/Resources/views'), 'Debug');
        $a->addPath((dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'debug-bundle/Resources/views'), '!Debug');
        $a->addPath((dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'web-profiler-bundle/Resources/views'), 'WebProfiler');
        $a->addPath((dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'web-profiler-bundle/Resources/views'), '!WebProfiler');
        $a->addPath((dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-bundle/Resources/views'), 'Security');
        $a->addPath((dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'security-bundle/Resources/views'), '!Security');
        $a->addPath((dirname(__DIR__, 4) . '/templates'));
        $a->addPath((dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge/Resources/views/Email'), 'email');
        $a->addPath((dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge/Resources/views/Email'), '!email');
        $a->addPath((dirname(__DIR__, 4) . '' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'symfony' . DIRECTORY_SEPARATOR . 'twig-bridge/Resources/views/Form'));

        $this->privates['twig'] = $instance = new Environment($a, ['autoescape' => 'name', 'cache' => ($this->targetDir . '' . '/twig'), 'charset' => 'UTF-8', 'debug' => true, 'strict_variables' => true]);

        $b = ($this->privates['debug.stopwatch'] ??= new Stopwatch(true));
        $c = ($this->services['translator'] ?? $this->getTranslatorService());
        $d = ($this->services['request_stack'] ??= new RequestStack());
        $e = ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService());
        $f = ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService());
        $g = ($this->privates['security.token_storage'] ?? $this->getSecurity_TokenStorageService());
        $h = new HtmlDumper(NULL, 'UTF-8', 1);
        $h->setDisplayOptions(['maxStringLength' => 4096, 'fileLinkFormat' => $f]);
        $i = new AppVariable();
        $i->setEnvironment('dev');
        $i->setDebug(true);
        $i->setTokenStorage($g);
        if ($this->has('request_stack')) {
            $i->setRequestStack($d);
        }
        $j = new MissingExtensionSuggestor();

        $instance->addExtension(new CsrfExtension());
        $instance->addExtension(new DumpExtension(($this->services['var_dumper.cloner'] ?? $this->getVarDumper_ClonerService()), ($this->privates['var_dumper.html_dumper'] ?? $this->getVarDumper_HtmlDumperService())));
        $instance->addExtension(new ProfilerExtension(($this->privates['twig.profile'] ??= new Profile()), $b));
        $instance->addExtension(new TranslationExtension($c));
        $instance->addExtension(new AssetExtension(new Packages(new PathPackage('', new EmptyVersionStrategy(), new RequestStackContext($d, $e->getBaseUrl(), $e->isSecure())), new RewindableGenerator(function () {
            return new EmptyIterator();
        }, 0))));
        $instance->addExtension(new CodeExtension($f, dirname(__DIR__, 4), 'UTF-8'));
        $instance->addExtension(new RoutingExtension(($this->services['router'] ?? $this->getRouterService())));
        $instance->addExtension(new YamlExtension());
        $instance->addExtension(new StopwatchExtension($b, true));
        $instance->addExtension(new ExpressionExtension());
        $instance->addExtension(new HttpKernelExtension());
        $instance->addExtension(new HttpFoundationExtension(new UrlHelper($d, $e)));
        $instance->addExtension(new WebLinkExtension($d));
        $instance->addExtension(new SerializerExtension());
        $instance->addExtension(new FormExtension($c));
        $instance->addExtension(new LogoutUrlExtension(($this->privates['security.logout_url_generator'] ?? $this->getSecurity_LogoutUrlGeneratorService())));
        $instance->addExtension(new SecurityExtension(($this->privates['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService()), new ImpersonateUrlGenerator($d, ($this->privates['security.firewall.map'] ?? $this->getSecurity_Firewall_MapService()), $g)));
        $instance->addExtension(new DoctrineExtension());
        $instance->addExtension(new WebProfilerExtension($h));
        $instance->addGlobal('app', $i);
        $instance->addRuntimeLoader(new ContainerRuntimeLoader(new ServiceLocator($this->getService, [
            'Symfony\\Bridge\\Twig\\Extension\\CsrfRuntime' => ['privates', 'twig.runtime.security_csrf', 'getTwig_Runtime_SecurityCsrfService', true],
            'Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => ['privates', 'twig.runtime.httpkernel', 'getTwig_Runtime_HttpkernelService', true],
            'Symfony\\Bridge\\Twig\\Extension\\SerializerRuntime' => ['privates', 'twig.runtime.serializer', 'getTwig_Runtime_SerializerService', true],
            'Symfony\\Component\\Form\\FormRenderer' => ['privates', 'twig.form.renderer', 'getTwig_Form_RendererService', true],
        ], [
            'Symfony\\Bridge\\Twig\\Extension\\CsrfRuntime' => '?',
            'Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => '?',
            'Symfony\\Bridge\\Twig\\Extension\\SerializerRuntime' => '?',
            'Symfony\\Component\\Form\\FormRenderer' => '?',
        ])));
        $instance->registerUndefinedFilterCallback([0 => $j, 1 => 'suggestFilter']);
        $instance->registerUndefinedFunctionCallback([0 => $j, 1 => 'suggestFunction']);
        $instance->registerUndefinedTokenParserCallback([0 => $j, 1 => 'suggestTag']);
        (new EnvironmentConfigurator('F j, Y H:i', '%d days', NULL, 0, '.', ','))->configure($instance);

        return $instance;
    }

    /**
     * Gets the private 'debug.file_link_formatter' shared service.
     *
     * @return FileLinkFormatter
     */
    protected function getDebug_FileLinkFormatterService()
    {
        return $this->privates['debug.file_link_formatter'] = new FileLinkFormatter($this->getEnv('default::SYMFONY_IDE'), ($this->services['request_stack'] ??= new RequestStack()), dirname(__DIR__, 4), #[Closure(name: 'debug.file_link_formatter.url_format', class: 'string')] function () {
            return ($this->privates['debug.file_link_formatter.url_format'] ?? $this->load('getDebug_FileLinkFormatter_UrlFormatService'));
        });
    }

    /**
     * Gets the public 'var_dumper.cloner' shared service.
     *
     * @return VarCloner
     */
    protected function getVarDumper_ClonerService()
    {
        $this->services['var_dumper.cloner'] = $instance = new VarCloner();

        $instance->setMaxItems(2500);
        $instance->setMinDepth(1);
        $instance->setMaxString(-1);
        $instance->addCasters(['Closure' => 'Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster::unsetClosureFileInfo']);

        return $instance;
    }

    /**
     * Gets the private 'var_dumper.html_dumper' shared service.
     *
     * @return HtmlDumper
     */
    protected function getVarDumper_HtmlDumperService()
    {
        $this->privates['var_dumper.html_dumper'] = $instance = new HtmlDumper(NULL, 'UTF-8', 0);

        $instance->setDisplayOptions(['fileLinkFormat' => ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService())]);

        return $instance;
    }

    /**
     * Gets the private 'security.logout_url_generator' shared service.
     *
     * @return LogoutUrlGenerator
     */
    protected function getSecurity_LogoutUrlGeneratorService()
    {
        return $this->privates['security.logout_url_generator'] = new LogoutUrlGenerator(($this->services['request_stack'] ??= new RequestStack()), ($this->services['router'] ?? $this->getRouterService()), ($this->privates['security.token_storage'] ?? $this->getSecurity_TokenStorageService()));
    }

    /**
     * Gets the private 'security.authorization_checker' shared service.
     *
     * @return AuthorizationChecker
     */
    protected function getSecurity_AuthorizationCheckerService()
    {
        $a = ($this->privates['debug.security.access.decision_manager'] ?? $this->getDebug_Security_Access_DecisionManagerService());

        if (isset($this->privates['security.authorization_checker'])) {
            return $this->privates['security.authorization_checker'];
        }

        return $this->privates['security.authorization_checker'] = new AuthorizationChecker(($this->privates['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), $a, false, false);
    }

    /**
     * Gets the private 'debug.security.access.decision_manager' shared service.
     *
     * @return TraceableAccessDecisionManager
     */
    protected function getDebug_Security_Access_DecisionManagerService()
    {
        return $this->privates['debug.security.access.decision_manager'] = new TraceableAccessDecisionManager(new AccessDecisionManager(new RewindableGenerator(function () {
            yield 0 => ($this->privates['debug.security.voter.security.access.authenticated_voter'] ?? $this->load('getDebug_Security_Voter_Security_Access_AuthenticatedVoterService'));
            yield 1 => ($this->privates['debug.security.voter.security.access.simple_role_voter'] ?? $this->load('getDebug_Security_Voter_Security_Access_SimpleRoleVoterService'));
            yield 2 => ($this->privates['debug.security.voter.security.access.expression_voter'] ?? $this->load('getDebug_Security_Voter_Security_Access_ExpressionVoterService'));
        }, 3), new AffirmativeStrategy(false)));
    }

    /**
     * Gets the private 'security.firewall.map' shared service.
     *
     * @return FirewallMap
     */
    protected function getSecurity_Firewall_MapService()
    {
        $a = ($this->privates['.service_locator.zJyh7qS'] ?? $this->get_ServiceLocator_ZJyh7qSService());

        if (isset($this->privates['security.firewall.map'])) {
            return $this->privates['security.firewall.map'];
        }

        return $this->privates['security.firewall.map'] = new FirewallMap($a, new RewindableGenerator(function () {
            yield 'security.firewall.map.context.dev' => ($this->privates['.security.request_matcher.kLbKLHa'] ?? $this->load('get_Security_RequestMatcher_KLbKLHaService'));
            yield 'security.firewall.map.context.main' => NULL;
        }, 2));
    }

    /**
     * Gets the private '.service_locator.zJyh7qS' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    protected function get_ServiceLocator_ZJyh7qSService()
    {
        return $this->privates['.service_locator.zJyh7qS'] = new ServiceLocator($this->getService, [
            'security.firewall.map.context.dev' => ['privates', 'security.firewall.map.context.dev', 'getSecurity_Firewall_Map_Context_DevService', true],
            'security.firewall.map.context.main' => ['privates', 'security.firewall.map.context.main', 'getSecurity_Firewall_Map_Context_MainService', true],
        ], [
            'security.firewall.map.context.dev' => '?',
            'security.firewall.map.context.main' => '?',
        ]);
    }

    /**
     * Gets the private 'web_profiler.csp.handler' shared service.
     *
     * @return ContentSecurityPolicyHandler
     */
    protected function getWebProfiler_Csp_HandlerService()
    {
        return $this->privates['web_profiler.csp.handler'] = new ContentSecurityPolicyHandler(new NonceGenerator());
    }

    /**
     * Gets the public 'data_collector.dump' shared service.
     *
     * @return DumpDataCollector
     */
    protected function getDataCollector_DumpService()
    {
        return $this->services['data_collector.dump'] = new DumpDataCollector(($this->privates['debug.stopwatch'] ??= new Stopwatch(true)), ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService()), 'UTF-8', ($this->services['request_stack'] ??= new RequestStack()), ($this->privates['var_dumper.server_connection'] ?? $this->getVarDumper_ServerConnectionService()));
    }

    /**
     * Gets the private 'var_dumper.server_connection' shared service.
     *
     * @return Connection
     */
    protected function getVarDumper_ServerConnectionService()
    {
        return $this->privates['var_dumper.server_connection'] = new Connection('tcp://' . $this->getEnv('string:VAR_DUMPER_SERVER'), ['source' => new SourceContextProvider('UTF-8', dirname(__DIR__, 4), ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService())), 'request' => new RequestContextProvider(($this->services['request_stack'] ??= new RequestStack())), 'cli' => new CliContextProvider()]);
    }

    /**
     * Gets the private 'controller.is_granted_attribute_listener' shared service.
     *
     * @return IsGrantedAttributeListener
     */
    protected function getController_IsGrantedAttributeListenerService()
    {
        return $this->privates['controller.is_granted_attribute_listener'] = new IsGrantedAttributeListener(($this->privates['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService()), new \Symfony\Component\ExpressionLanguage\ExpressionLanguage(($this->services['cache.security_is_granted_attribute_expression_language'] ?? $this->getCache_SecurityIsGrantedAttributeExpressionLanguageService())));
    }

    /**
     * Gets the private 'debug.security.firewall' shared service.
     *
     * @return TraceableFirewallListener
     */
    protected function getDebug_Security_FirewallService()
    {
        $a = ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService());

        if (isset($this->privates['debug.security.firewall'])) {
            return $this->privates['debug.security.firewall'];
        }

        return $this->privates['debug.security.firewall'] = new TraceableFirewallListener(($this->privates['security.firewall.map'] ?? $this->getSecurity_Firewall_MapService()), $a, ($this->privates['security.logout_url_generator'] ?? $this->getSecurity_LogoutUrlGeneratorService()));
    }

    /**
     * Gets the private 'sensio_framework_extra.controller.listener' shared service.
     *
     * @return ControllerListener
     */
    protected function getSensioFrameworkExtra_Controller_ListenerService()
    {
        return $this->privates['sensio_framework_extra.controller.listener'] = new ControllerListener(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()));
    }

    /**
     * Gets the private 'sensio_framework_extra.converter.listener' shared service.
     *
     * @return ParamConverterListener
     */
    protected function getSensioFrameworkExtra_Converter_ListenerService()
    {
        $a = new ParamConverterManager();
        $a->add(new DoctrineParamConverter(($this->services['doctrine'] ?? $this->getDoctrineService()), new \Symfony\Component\ExpressionLanguage\ExpressionLanguage()), 0, 'doctrine.orm');
        $a->add(new DateTimeParamConverter(), 0, 'datetime');

        return $this->privates['sensio_framework_extra.converter.listener'] = new ParamConverterListener($a, true);
    }

    /**
     * Gets the private 'sensio_framework_extra.view.listener' shared service.
     *
     * @return TemplateListener
     */
    protected function getSensioFrameworkExtra_View_ListenerService()
    {
        $this->privates['sensio_framework_extra.view.listener'] = $instance = new TemplateListener(new TemplateGuesser(($this->services['kernel'] ?? $this->get('kernel', 1))));

        $instance->setContainer((new ServiceLocator($this->getService, [
            'twig' => ['privates', 'twig', 'getTwigService', false],
        ], [
            'twig' => 'Twig\\Environment',
        ]))->withContext('sensio_framework_extra.view.listener', $this));

        return $instance;
    }

    /**
     * Gets the private 'sensio_framework_extra.security.listener' shared service.
     *
     * @return SecurityListener
     */
    protected function getSensioFrameworkExtra_Security_ListenerService()
    {
        return $this->privates['sensio_framework_extra.security.listener'] = new SecurityListener(($this->privates['framework_extra_bundle.argument_name_convertor'] ?? $this->getFrameworkExtraBundle_ArgumentNameConvertorService()), new ExpressionLanguage(), ($this->privates['security.authentication.trust_resolver'] ??= new AuthenticationTrustResolver()), ($this->privates['security.role_hierarchy'] ??= new RoleHierarchy([])), ($this->privates['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->privates['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService()), ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService()));
    }

    /**
     * Gets the private 'framework_extra_bundle.argument_name_convertor' shared service.
     *
     * @return ArgumentNameConverter
     */
    protected function getFrameworkExtraBundle_ArgumentNameConvertorService()
    {
        return $this->privates['framework_extra_bundle.argument_name_convertor'] = new ArgumentNameConverter(($this->privates['argument_metadata_factory'] ??= new ArgumentMetadataFactory()));
    }

    /**
     * Gets the private 'monolog.logger' shared service.
     *
     * @return Logger
     */
    protected function getMonolog_LoggerService()
    {
        $this->privates['monolog.logger'] = $instance = new Logger('app');

        $instance->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $instance->useMicrosecondTimestamps(true);
        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        AddDebugLogProcessorPass::configureLogger($instance);

        return $instance;
    }

    /**
     * Gets the private 'framework_extra_bundle.event.is_granted' shared service.
     *
     * @return IsGrantedListener
     */
    protected function getFrameworkExtraBundle_Event_IsGrantedService()
    {
        return $this->privates['framework_extra_bundle.event.is_granted'] = new IsGrantedListener(($this->privates['framework_extra_bundle.argument_name_convertor'] ?? $this->getFrameworkExtraBundle_ArgumentNameConvertorService()), ($this->privates['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService()));
    }

    /**
     * Gets the public 'http_kernel' shared service.
     *
     * @return HttpKernel
     */
    protected function getHttpKernelService()
    {
        $a = ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService());

        if (isset($this->services['http_kernel'])) {
            return $this->services['http_kernel'];
        }
        $b = ($this->privates['debug.stopwatch'] ??= new Stopwatch(true));

        return $this->services['http_kernel'] = new HttpKernel($a, new TraceableControllerResolver(new ControllerResolver($this, ($this->privates['monolog.logger.request'] ?? $this->getMonolog_Logger_RequestService())), $b), ($this->services['request_stack'] ??= new RequestStack()), new TraceableArgumentResolver(new ArgumentResolver(($this->privates['argument_metadata_factory'] ??= new ArgumentMetadataFactory()), new RewindableGenerator(function () {
            yield 0 => ($this->privates['debug.security.user_value_resolver'] ?? $this->load('getDebug_Security_UserValueResolverService'));
            yield 1 => ($this->privates['debug.doctrine.orm.entity_value_resolver'] ?? $this->load('getDebug_Doctrine_Orm_EntityValueResolverService'));
            yield 2 => ($this->privates['debug.argument_resolver.backed_enum_resolver'] ?? $this->load('getDebug_ArgumentResolver_BackedEnumResolverService'));
            yield 3 => ($this->privates['debug.argument_resolver.datetime'] ?? $this->load('getDebug_ArgumentResolver_DatetimeService'));
            yield 4 => ($this->privates['debug.argument_resolver.request_attribute'] ?? $this->load('getDebug_ArgumentResolver_RequestAttributeService'));
            yield 5 => ($this->privates['debug.argument_resolver.request'] ?? $this->load('getDebug_ArgumentResolver_RequestService'));
            yield 6 => ($this->privates['debug.argument_resolver.session'] ?? $this->load('getDebug_ArgumentResolver_SessionService'));
            yield 7 => ($this->privates['debug.argument_resolver.service'] ?? $this->load('getDebug_ArgumentResolver_ServiceService'));
            yield 8 => ($this->privates['debug.argument_resolver.default'] ?? $this->load('getDebug_ArgumentResolver_DefaultService'));
            yield 9 => ($this->privates['debug.argument_resolver.variadic'] ?? $this->load('getDebug_ArgumentResolver_VariadicService'));
            yield 10 => ($this->privates['debug.argument_resolver.not_tagged_controller'] ?? $this->load('getDebug_ArgumentResolver_NotTaggedControllerService'));
        }, 11)), $b), true);
    }

    /**
     * Gets the public 'request_stack' shared service.
     *
     * @return RequestStack
     */
    protected function getRequestStackService()
    {
        return $this->services['request_stack'] = new RequestStack();
    }

    /**
     * Gets the private 'parameter_bag' shared service.
     *
     * @return ContainerBag
     */
    protected function getParameterBagService()
    {
        return $this->privates['parameter_bag'] = new ContainerBag($this);
    }

    /**
     * Gets the public 'profiler' alias.
     *
     * @return object The ".container.private.profiler" service.
     */
    protected function getProfilerService()
    {
        trigger_deprecation('symfony/framework-bundle', '5.4', 'Accessing the "profiler" service directly from the container is deprecated, use dependency injection instead.');

        return $this->get('.container.private.profiler');
    }
}
