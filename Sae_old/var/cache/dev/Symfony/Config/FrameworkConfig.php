<?php

namespace Symfony\Config;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'CsrfProtectionConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'FormConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'HttpCacheConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'EsiConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'SsiConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'FragmentsConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'ProfilerConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'WorkflowsConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'RouterConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'SessionConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'RequestConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'AssetsConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'TranslatorConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'ValidationConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'AnnotationsConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'SerializerConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'PropertyAccessConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'PropertyInfoConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'CacheConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'PhpErrorsConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'ExceptionConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'WebLinkConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'LockConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'SemaphoreConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'MessengerConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'HttpClientConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'MailerConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'SecretsConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'NotifierConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'RateLimiterConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'UidConfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'HtmlSanitizerConfig.php';

use Symfony\Component\Config\Builder\ConfigBuilderInterface;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Config\Framework\AnnotationsConfig;
use Symfony\Config\Framework\AssetsConfig;
use Symfony\Config\Framework\CacheConfig;
use Symfony\Config\Framework\CsrfProtectionConfig;
use Symfony\Config\Framework\EsiConfig;
use Symfony\Config\Framework\ExceptionConfig;
use Symfony\Config\Framework\FormConfig;
use Symfony\Config\Framework\FragmentsConfig;
use Symfony\Config\Framework\HtmlSanitizerConfig;
use Symfony\Config\Framework\HttpCacheConfig;
use Symfony\Config\Framework\HttpClientConfig;
use Symfony\Config\Framework\LockConfig;
use Symfony\Config\Framework\MailerConfig;
use Symfony\Config\Framework\MessengerConfig;
use Symfony\Config\Framework\NotifierConfig;
use Symfony\Config\Framework\PhpErrorsConfig;
use Symfony\Config\Framework\ProfilerConfig;
use Symfony\Config\Framework\PropertyAccessConfig;
use Symfony\Config\Framework\PropertyInfoConfig;
use Symfony\Config\Framework\RateLimiterConfig;
use Symfony\Config\Framework\RequestConfig;
use Symfony\Config\Framework\RouterConfig;
use Symfony\Config\Framework\SecretsConfig;
use Symfony\Config\Framework\SemaphoreConfig;
use Symfony\Config\Framework\SerializerConfig;
use Symfony\Config\Framework\SessionConfig;
use Symfony\Config\Framework\SsiConfig;
use Symfony\Config\Framework\TranslatorConfig;
use Symfony\Config\Framework\UidConfig;
use Symfony\Config\Framework\ValidationConfig;
use Symfony\Config\Framework\WebLinkConfig;
use Symfony\Config\Framework\WorkflowsConfig;
use function func_num_args;
use function is_array;
use const DIRECTORY_SEPARATOR;

/**
 * This class is automatically generated to help in creating a config.
 */
class FrameworkConfig implements ConfigBuilderInterface
{
    private $secret;
    private $httpMethodOverride;
    private $trustXSendfileTypeHeader;
    private $ide;
    private $test;
    private $defaultLocale;
    private $setLocaleFromAcceptLanguage;
    private $setContentLanguageFromLocale;
    private $enabledLocales;
    private $trustedHosts;
    private $trustedProxies;
    private $trustedHeaders;
    private $errorController;
    private $handleAllThrowables;
    private $csrfProtection;
    private $form;
    private $httpCache;
    private $esi;
    private $ssi;
    private $fragments;
    private $profiler;
    private $workflows;
    private $router;
    private $session;
    private $request;
    private $assets;
    private $translator;
    private $validation;
    private $annotations;
    private $serializer;
    private $propertyAccess;
    private $propertyInfo;
    private $cache;
    private $phpErrors;
    private $exceptions;
    private $webLink;
    private $lock;
    private $semaphore;
    private $messenger;
    private $disallowSearchEngineIndex;
    private $httpClient;
    private $mailer;
    private $secrets;
    private $notifier;
    private $rateLimiter;
    private $uid;
    private $htmlSanitizer;
    private $_usedProperties = [];

    public function __construct(array $value = [])
    {
        if (array_key_exists('secret', $value)) {
            $this->_usedProperties['secret'] = true;
            $this->secret = $value['secret'];
            unset($value['secret']);
        }

        if (array_key_exists('http_method_override', $value)) {
            $this->_usedProperties['httpMethodOverride'] = true;
            $this->httpMethodOverride = $value['http_method_override'];
            unset($value['http_method_override']);
        }

        if (array_key_exists('trust_x_sendfile_type_header', $value)) {
            $this->_usedProperties['trustXSendfileTypeHeader'] = true;
            $this->trustXSendfileTypeHeader = $value['trust_x_sendfile_type_header'];
            unset($value['trust_x_sendfile_type_header']);
        }

        if (array_key_exists('ide', $value)) {
            $this->_usedProperties['ide'] = true;
            $this->ide = $value['ide'];
            unset($value['ide']);
        }

        if (array_key_exists('test', $value)) {
            $this->_usedProperties['test'] = true;
            $this->test = $value['test'];
            unset($value['test']);
        }

        if (array_key_exists('default_locale', $value)) {
            $this->_usedProperties['defaultLocale'] = true;
            $this->defaultLocale = $value['default_locale'];
            unset($value['default_locale']);
        }

        if (array_key_exists('set_locale_from_accept_language', $value)) {
            $this->_usedProperties['setLocaleFromAcceptLanguage'] = true;
            $this->setLocaleFromAcceptLanguage = $value['set_locale_from_accept_language'];
            unset($value['set_locale_from_accept_language']);
        }

        if (array_key_exists('set_content_language_from_locale', $value)) {
            $this->_usedProperties['setContentLanguageFromLocale'] = true;
            $this->setContentLanguageFromLocale = $value['set_content_language_from_locale'];
            unset($value['set_content_language_from_locale']);
        }

        if (array_key_exists('enabled_locales', $value)) {
            $this->_usedProperties['enabledLocales'] = true;
            $this->enabledLocales = $value['enabled_locales'];
            unset($value['enabled_locales']);
        }

        if (array_key_exists('trusted_hosts', $value)) {
            $this->_usedProperties['trustedHosts'] = true;
            $this->trustedHosts = $value['trusted_hosts'];
            unset($value['trusted_hosts']);
        }

        if (array_key_exists('trusted_proxies', $value)) {
            $this->_usedProperties['trustedProxies'] = true;
            $this->trustedProxies = $value['trusted_proxies'];
            unset($value['trusted_proxies']);
        }

        if (array_key_exists('trusted_headers', $value)) {
            $this->_usedProperties['trustedHeaders'] = true;
            $this->trustedHeaders = $value['trusted_headers'];
            unset($value['trusted_headers']);
        }

        if (array_key_exists('error_controller', $value)) {
            $this->_usedProperties['errorController'] = true;
            $this->errorController = $value['error_controller'];
            unset($value['error_controller']);
        }

        if (array_key_exists('handle_all_throwables', $value)) {
            $this->_usedProperties['handleAllThrowables'] = true;
            $this->handleAllThrowables = $value['handle_all_throwables'];
            unset($value['handle_all_throwables']);
        }

        if (array_key_exists('csrf_protection', $value)) {
            $this->_usedProperties['csrfProtection'] = true;
            $this->csrfProtection = new CsrfProtectionConfig($value['csrf_protection']);
            unset($value['csrf_protection']);
        }

        if (array_key_exists('form', $value)) {
            $this->_usedProperties['form'] = true;
            $this->form = new FormConfig($value['form']);
            unset($value['form']);
        }

        if (array_key_exists('http_cache', $value)) {
            $this->_usedProperties['httpCache'] = true;
            $this->httpCache = is_array($value['http_cache']) ? new HttpCacheConfig($value['http_cache']) : $value['http_cache'];
            unset($value['http_cache']);
        }

        if (array_key_exists('esi', $value)) {
            $this->_usedProperties['esi'] = true;
            $this->esi = is_array($value['esi']) ? new EsiConfig($value['esi']) : $value['esi'];
            unset($value['esi']);
        }

        if (array_key_exists('ssi', $value)) {
            $this->_usedProperties['ssi'] = true;
            $this->ssi = is_array($value['ssi']) ? new SsiConfig($value['ssi']) : $value['ssi'];
            unset($value['ssi']);
        }

        if (array_key_exists('fragments', $value)) {
            $this->_usedProperties['fragments'] = true;
            $this->fragments = is_array($value['fragments']) ? new FragmentsConfig($value['fragments']) : $value['fragments'];
            unset($value['fragments']);
        }

        if (array_key_exists('profiler', $value)) {
            $this->_usedProperties['profiler'] = true;
            $this->profiler = is_array($value['profiler']) ? new ProfilerConfig($value['profiler']) : $value['profiler'];
            unset($value['profiler']);
        }

        if (array_key_exists('workflows', $value)) {
            $this->_usedProperties['workflows'] = true;
            $this->workflows = is_array($value['workflows']) ? new WorkflowsConfig($value['workflows']) : $value['workflows'];
            unset($value['workflows']);
        }

        if (array_key_exists('router', $value)) {
            $this->_usedProperties['router'] = true;
            $this->router = is_array($value['router']) ? new RouterConfig($value['router']) : $value['router'];
            unset($value['router']);
        }

        if (array_key_exists('session', $value)) {
            $this->_usedProperties['session'] = true;
            $this->session = is_array($value['session']) ? new SessionConfig($value['session']) : $value['session'];
            unset($value['session']);
        }

        if (array_key_exists('request', $value)) {
            $this->_usedProperties['request'] = true;
            $this->request = is_array($value['request']) ? new RequestConfig($value['request']) : $value['request'];
            unset($value['request']);
        }

        if (array_key_exists('assets', $value)) {
            $this->_usedProperties['assets'] = true;
            $this->assets = new AssetsConfig($value['assets']);
            unset($value['assets']);
        }

        if (array_key_exists('translator', $value)) {
            $this->_usedProperties['translator'] = true;
            $this->translator = new TranslatorConfig($value['translator']);
            unset($value['translator']);
        }

        if (array_key_exists('validation', $value)) {
            $this->_usedProperties['validation'] = true;
            $this->validation = new ValidationConfig($value['validation']);
            unset($value['validation']);
        }

        if (array_key_exists('annotations', $value)) {
            $this->_usedProperties['annotations'] = true;
            $this->annotations = new AnnotationsConfig($value['annotations']);
            unset($value['annotations']);
        }

        if (array_key_exists('serializer', $value)) {
            $this->_usedProperties['serializer'] = true;
            $this->serializer = new SerializerConfig($value['serializer']);
            unset($value['serializer']);
        }

        if (array_key_exists('property_access', $value)) {
            $this->_usedProperties['propertyAccess'] = true;
            $this->propertyAccess = new PropertyAccessConfig($value['property_access']);
            unset($value['property_access']);
        }

        if (array_key_exists('property_info', $value)) {
            $this->_usedProperties['propertyInfo'] = true;
            $this->propertyInfo = new PropertyInfoConfig($value['property_info']);
            unset($value['property_info']);
        }

        if (array_key_exists('cache', $value)) {
            $this->_usedProperties['cache'] = true;
            $this->cache = new CacheConfig($value['cache']);
            unset($value['cache']);
        }

        if (array_key_exists('php_errors', $value)) {
            $this->_usedProperties['phpErrors'] = true;
            $this->phpErrors = new PhpErrorsConfig($value['php_errors']);
            unset($value['php_errors']);
        }

        if (array_key_exists('exceptions', $value)) {
            $this->_usedProperties['exceptions'] = true;
            $this->exceptions = array_map(function ($v) {
                return is_array($v) ? new ExceptionConfig($v) : $v;
            }, $value['exceptions']);
            unset($value['exceptions']);
        }

        if (array_key_exists('web_link', $value)) {
            $this->_usedProperties['webLink'] = true;
            $this->webLink = new WebLinkConfig($value['web_link']);
            unset($value['web_link']);
        }

        if (array_key_exists('lock', $value)) {
            $this->_usedProperties['lock'] = true;
            $this->lock = is_array($value['lock']) ? new LockConfig($value['lock']) : $value['lock'];
            unset($value['lock']);
        }

        if (array_key_exists('semaphore', $value)) {
            $this->_usedProperties['semaphore'] = true;
            $this->semaphore = is_array($value['semaphore']) ? new SemaphoreConfig($value['semaphore']) : $value['semaphore'];
            unset($value['semaphore']);
        }

        if (array_key_exists('messenger', $value)) {
            $this->_usedProperties['messenger'] = true;
            $this->messenger = new MessengerConfig($value['messenger']);
            unset($value['messenger']);
        }

        if (array_key_exists('disallow_search_engine_index', $value)) {
            $this->_usedProperties['disallowSearchEngineIndex'] = true;
            $this->disallowSearchEngineIndex = $value['disallow_search_engine_index'];
            unset($value['disallow_search_engine_index']);
        }

        if (array_key_exists('http_client', $value)) {
            $this->_usedProperties['httpClient'] = true;
            $this->httpClient = is_array($value['http_client']) ? new HttpClientConfig($value['http_client']) : $value['http_client'];
            unset($value['http_client']);
        }

        if (array_key_exists('mailer', $value)) {
            $this->_usedProperties['mailer'] = true;
            $this->mailer = new MailerConfig($value['mailer']);
            unset($value['mailer']);
        }

        if (array_key_exists('secrets', $value)) {
            $this->_usedProperties['secrets'] = true;
            $this->secrets = new SecretsConfig($value['secrets']);
            unset($value['secrets']);
        }

        if (array_key_exists('notifier', $value)) {
            $this->_usedProperties['notifier'] = true;
            $this->notifier = new NotifierConfig($value['notifier']);
            unset($value['notifier']);
        }

        if (array_key_exists('rate_limiter', $value)) {
            $this->_usedProperties['rateLimiter'] = true;
            $this->rateLimiter = is_array($value['rate_limiter']) ? new RateLimiterConfig($value['rate_limiter']) : $value['rate_limiter'];
            unset($value['rate_limiter']);
        }

        if (array_key_exists('uid', $value)) {
            $this->_usedProperties['uid'] = true;
            $this->uid = is_array($value['uid']) ? new UidConfig($value['uid']) : $value['uid'];
            unset($value['uid']);
        }

        if (array_key_exists('html_sanitizer', $value)) {
            $this->_usedProperties['htmlSanitizer'] = true;
            $this->htmlSanitizer = is_array($value['html_sanitizer']) ? new HtmlSanitizerConfig($value['html_sanitizer']) : $value['html_sanitizer'];
            unset($value['html_sanitizer']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__) . implode(', ', array_keys($value)));
        }
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function secret($value): static
    {
        $this->_usedProperties['secret'] = true;
        $this->secret = $value;

        return $this;
    }

    /**
     * Set true to enable support for the '_method' request parameter to determine the intended HTTP method on POST requests. Note: When using the HttpCache, you need to call the method in your front controller instead
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function httpMethodOverride($value): static
    {
        $this->_usedProperties['httpMethodOverride'] = true;
        $this->httpMethodOverride = $value;

        return $this;
    }

    /**
     * Set true to enable support for xsendfile in binary file responses.
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function trustXSendfileTypeHeader($value): static
    {
        $this->_usedProperties['trustXSendfileTypeHeader'] = true;
        $this->trustXSendfileTypeHeader = $value;

        return $this;
    }

    /**
     * @default '%env(default::SYMFONY_IDE)%'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function ide($value): static
    {
        $this->_usedProperties['ide'] = true;
        $this->ide = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function test($value): static
    {
        $this->_usedProperties['test'] = true;
        $this->test = $value;

        return $this;
    }

    /**
     * @default 'en'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultLocale($value): static
    {
        $this->_usedProperties['defaultLocale'] = true;
        $this->defaultLocale = $value;

        return $this;
    }

    /**
     * Whether to use the Accept-Language HTTP header to set the Request locale (only when the "_locale" request attribute is not passed).
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function setLocaleFromAcceptLanguage($value): static
    {
        $this->_usedProperties['setLocaleFromAcceptLanguage'] = true;
        $this->setLocaleFromAcceptLanguage = $value;

        return $this;
    }

    /**
     * Whether to set the Content-Language HTTP header on the Response using the Request locale.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function setContentLanguageFromLocale($value): static
    {
        $this->_usedProperties['setContentLanguageFromLocale'] = true;
        $this->setContentLanguageFromLocale = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function enabledLocales(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['enabledLocales'] = true;
        $this->enabledLocales = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed>|string $value
     *
     * @return $this
     */
    public function trustedHosts(ParamConfigurator|string|array $value): static
    {
        $this->_usedProperties['trustedHosts'] = true;
        $this->trustedHosts = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function trustedProxies($value): static
    {
        $this->_usedProperties['trustedProxies'] = true;
        $this->trustedProxies = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed>|string $value
     *
     * @return $this
     */
    public function trustedHeaders(ParamConfigurator|string|array $value): static
    {
        $this->_usedProperties['trustedHeaders'] = true;
        $this->trustedHeaders = $value;

        return $this;
    }

    /**
     * @default 'error_controller'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function errorController($value): static
    {
        $this->_usedProperties['errorController'] = true;
        $this->errorController = $value;

        return $this;
    }

    /**
     * HttpKernel will handle all kinds of \Throwable
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function handleAllThrowables($value): static
    {
        $this->_usedProperties['handleAllThrowables'] = true;
        $this->handleAllThrowables = $value;

        return $this;
    }

    /**
     * @default {"enabled":null}
     */
    public function csrfProtection(array $value = []): CsrfProtectionConfig
    {
        if (null === $this->csrfProtection) {
            $this->_usedProperties['csrfProtection'] = true;
            $this->csrfProtection = new CsrfProtectionConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "csrfProtection()" has already been initialized. You cannot pass values the second time you call csrfProtection().');
        }

        return $this->csrfProtection;
    }

    /**
     * form configuration
     * @default {"enabled":true,"csrf_protection":{"enabled":null,"field_name":"_token"}}
     */
    public function form(array $value = []): FormConfig
    {
        if (null === $this->form) {
            $this->_usedProperties['form'] = true;
            $this->form = new FormConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "form()" has already been initialized. You cannot pass values the second time you call form().');
        }

        return $this->form;
    }

    /**
     * @template TValue
     * @param TValue $value
     * HTTP cache configuration
     * @default {"enabled":false,"debug":"%kernel.debug%","private_headers":[]}
     * @return HttpCacheConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\HttpCacheConfig : static)
     */
    public function httpCache(array $value = []): HttpCacheConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['httpCache'] = true;
            $this->httpCache = $value;

            return $this;
        }

        if (!$this->httpCache instanceof HttpCacheConfig) {
            $this->_usedProperties['httpCache'] = true;
            $this->httpCache = new HttpCacheConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "httpCache()" has already been initialized. You cannot pass values the second time you call httpCache().');
        }

        return $this->httpCache;
    }

    /**
     * @template TValue
     * @param TValue $value
     * esi configuration
     * @default {"enabled":false}
     * @return EsiConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\EsiConfig : static)
     */
    public function esi(array $value = []): EsiConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['esi'] = true;
            $this->esi = $value;

            return $this;
        }

        if (!$this->esi instanceof EsiConfig) {
            $this->_usedProperties['esi'] = true;
            $this->esi = new EsiConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "esi()" has already been initialized. You cannot pass values the second time you call esi().');
        }

        return $this->esi;
    }

    /**
     * @template TValue
     * @param TValue $value
     * ssi configuration
     * @default {"enabled":false}
     * @return SsiConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\SsiConfig : static)
     */
    public function ssi(array $value = []): SsiConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['ssi'] = true;
            $this->ssi = $value;

            return $this;
        }

        if (!$this->ssi instanceof SsiConfig) {
            $this->_usedProperties['ssi'] = true;
            $this->ssi = new SsiConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "ssi()" has already been initialized. You cannot pass values the second time you call ssi().');
        }

        return $this->ssi;
    }

    /**
     * @template TValue
     * @param TValue $value
     * fragments configuration
     * @default {"enabled":false,"hinclude_default_template":null,"path":"\/_fragment"}
     * @return FragmentsConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\FragmentsConfig : static)
     */
    public function fragments(array $value = []): FragmentsConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['fragments'] = true;
            $this->fragments = $value;

            return $this;
        }

        if (!$this->fragments instanceof FragmentsConfig) {
            $this->_usedProperties['fragments'] = true;
            $this->fragments = new FragmentsConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "fragments()" has already been initialized. You cannot pass values the second time you call fragments().');
        }

        return $this->fragments;
    }

    /**
     * @template TValue
     * @param TValue $value
     * profiler configuration
     * @default {"enabled":false,"collect":true,"collect_parameter":null,"only_exceptions":false,"only_main_requests":false,"dsn":"file:%kernel.cache_dir%\/profiler","collect_serializer_data":false}
     * @return ProfilerConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\ProfilerConfig : static)
     */
    public function profiler(array $value = []): ProfilerConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['profiler'] = true;
            $this->profiler = $value;

            return $this;
        }

        if (!$this->profiler instanceof ProfilerConfig) {
            $this->_usedProperties['profiler'] = true;
            $this->profiler = new ProfilerConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "profiler()" has already been initialized. You cannot pass values the second time you call profiler().');
        }

        return $this->profiler;
    }

    /**
     * @template TValue
     * @param TValue $value
     * @default {"enabled":false,"workflows":[]}
     * @return WorkflowsConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\WorkflowsConfig : static)
     */
    public function workflows(mixed $value = []): WorkflowsConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['workflows'] = true;
            $this->workflows = $value;

            return $this;
        }

        if (!$this->workflows instanceof WorkflowsConfig) {
            $this->_usedProperties['workflows'] = true;
            $this->workflows = new WorkflowsConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "workflows()" has already been initialized. You cannot pass values the second time you call workflows().');
        }

        return $this->workflows;
    }

    /**
     * @template TValue
     * @param TValue $value
     * router configuration
     * @default {"enabled":false,"cache_dir":"%kernel.cache_dir%","default_uri":null,"http_port":80,"https_port":443,"strict_requirements":true,"utf8":true}
     * @return RouterConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\RouterConfig : static)
     */
    public function router(array $value = []): RouterConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['router'] = true;
            $this->router = $value;

            return $this;
        }

        if (!$this->router instanceof RouterConfig) {
            $this->_usedProperties['router'] = true;
            $this->router = new RouterConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "router()" has already been initialized. You cannot pass values the second time you call router().');
        }

        return $this->router;
    }

    /**
     * @template TValue
     * @param TValue $value
     * session configuration
     * @default {"enabled":false,"storage_factory_id":"session.storage.factory.native","handler_id":"session.handler.native_file","cookie_httponly":true,"cookie_samesite":null,"gc_probability":1,"save_path":"%kernel.cache_dir%\/sessions","metadata_update_threshold":0}
     * @return SessionConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\SessionConfig : static)
     */
    public function session(array $value = []): SessionConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['session'] = true;
            $this->session = $value;

            return $this;
        }

        if (!$this->session instanceof SessionConfig) {
            $this->_usedProperties['session'] = true;
            $this->session = new SessionConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "session()" has already been initialized. You cannot pass values the second time you call session().');
        }

        return $this->session;
    }

    /**
     * @template TValue
     * @param TValue $value
     * request configuration
     * @default {"enabled":false,"formats":[]}
     * @return RequestConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\RequestConfig : static)
     */
    public function request(array $value = []): RequestConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['request'] = true;
            $this->request = $value;

            return $this;
        }

        if (!$this->request instanceof RequestConfig) {
            $this->_usedProperties['request'] = true;
            $this->request = new RequestConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "request()" has already been initialized. You cannot pass values the second time you call request().');
        }

        return $this->request;
    }

    /**
     * assets configuration
     * @default {"enabled":true,"strict_mode":false,"version_strategy":null,"version":null,"version_format":"%%s?%%s","json_manifest_path":null,"base_path":"","base_urls":[],"packages":[]}
     */
    public function assets(array $value = []): AssetsConfig
    {
        if (null === $this->assets) {
            $this->_usedProperties['assets'] = true;
            $this->assets = new AssetsConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "assets()" has already been initialized. You cannot pass values the second time you call assets().');
        }

        return $this->assets;
    }

    /**
     * translator configuration
     * @default {"enabled":true,"fallbacks":[],"logging":false,"formatter":"translator.formatter.default","cache_dir":"%kernel.cache_dir%\/translations","default_path":"%kernel.project_dir%\/translations","paths":[],"pseudo_localization":{"enabled":false,"accents":true,"expansion_factor":1,"brackets":true,"parse_html":false,"localizable_html_attributes":[]},"providers":[]}
     */
    public function translator(array $value = []): TranslatorConfig
    {
        if (null === $this->translator) {
            $this->_usedProperties['translator'] = true;
            $this->translator = new TranslatorConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "translator()" has already been initialized. You cannot pass values the second time you call translator().');
        }

        return $this->translator;
    }

    /**
     * validation configuration
     * @default {"enabled":true,"enable_annotations":true,"static_method":["loadValidatorMetadata"],"translation_domain":"validators","mapping":{"paths":[]},"not_compromised_password":{"enabled":true,"endpoint":null},"auto_mapping":[]}
     */
    public function validation(array $value = []): ValidationConfig
    {
        if (null === $this->validation) {
            $this->_usedProperties['validation'] = true;
            $this->validation = new ValidationConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "validation()" has already been initialized. You cannot pass values the second time you call validation().');
        }

        return $this->validation;
    }

    /**
     * annotation configuration
     * @default {"enabled":true,"cache":"php_array","file_cache_dir":"%kernel.cache_dir%\/annotations","debug":true}
     */
    public function annotations(array $value = []): AnnotationsConfig
    {
        if (null === $this->annotations) {
            $this->_usedProperties['annotations'] = true;
            $this->annotations = new AnnotationsConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "annotations()" has already been initialized. You cannot pass values the second time you call annotations().');
        }

        return $this->annotations;
    }

    /**
     * serializer configuration
     * @default {"enabled":true,"enable_annotations":true,"mapping":{"paths":[]},"default_context":[]}
     */
    public function serializer(array $value = []): SerializerConfig
    {
        if (null === $this->serializer) {
            $this->_usedProperties['serializer'] = true;
            $this->serializer = new SerializerConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "serializer()" has already been initialized. You cannot pass values the second time you call serializer().');
        }

        return $this->serializer;
    }

    /**
     * Property access configuration
     * @default {"enabled":true,"magic_call":false,"magic_get":true,"magic_set":true,"throw_exception_on_invalid_index":false,"throw_exception_on_invalid_property_path":true}
     */
    public function propertyAccess(array $value = []): PropertyAccessConfig
    {
        if (null === $this->propertyAccess) {
            $this->_usedProperties['propertyAccess'] = true;
            $this->propertyAccess = new PropertyAccessConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "propertyAccess()" has already been initialized. You cannot pass values the second time you call propertyAccess().');
        }

        return $this->propertyAccess;
    }

    /**
     * Property info configuration
     * @default {"enabled":true}
     */
    public function propertyInfo(array $value = []): PropertyInfoConfig
    {
        if (null === $this->propertyInfo) {
            $this->_usedProperties['propertyInfo'] = true;
            $this->propertyInfo = new PropertyInfoConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "propertyInfo()" has already been initialized. You cannot pass values the second time you call propertyInfo().');
        }

        return $this->propertyInfo;
    }

    /**
     * Cache configuration
     * @default {"prefix_seed":"_%kernel.project_dir%.%kernel.container_class%","app":"cache.adapter.filesystem","system":"cache.adapter.system","directory":"%kernel.cache_dir%\/pools\/app","default_redis_provider":"redis:\/\/localhost","default_memcached_provider":"memcached:\/\/localhost","default_doctrine_dbal_provider":"database_connection","default_pdo_provider":null,"pools":[]}
     */
    public function cache(array $value = []): CacheConfig
    {
        if (null === $this->cache) {
            $this->_usedProperties['cache'] = true;
            $this->cache = new CacheConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "cache()" has already been initialized. You cannot pass values the second time you call cache().');
        }

        return $this->cache;
    }

    /**
     * PHP errors handling configuration
     * @default {"log":true,"throw":true}
     */
    public function phpErrors(array $value = []): PhpErrorsConfig
    {
        if (null === $this->phpErrors) {
            $this->_usedProperties['phpErrors'] = true;
            $this->phpErrors = new PhpErrorsConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "phpErrors()" has already been initialized. You cannot pass values the second time you call phpErrors().');
        }

        return $this->phpErrors;
    }

    /**
     * @template TValue
     * @param TValue $value
     * Exception handling configuration
     * @return ExceptionConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\ExceptionConfig : static)
     */
    public function exception(string $class, array $value = []): ExceptionConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['exceptions'] = true;
            $this->exceptions[$class] = $value;

            return $this;
        }

        if (!isset($this->exceptions[$class]) || !$this->exceptions[$class] instanceof ExceptionConfig) {
            $this->_usedProperties['exceptions'] = true;
            $this->exceptions[$class] = new ExceptionConfig($value);
        } elseif (1 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "exception()" has already been initialized. You cannot pass values the second time you call exception().');
        }

        return $this->exceptions[$class];
    }

    /**
     * web links configuration
     * @default {"enabled":true}
     */
    public function webLink(array $value = []): WebLinkConfig
    {
        if (null === $this->webLink) {
            $this->_usedProperties['webLink'] = true;
            $this->webLink = new WebLinkConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "webLink()" has already been initialized. You cannot pass values the second time you call webLink().');
        }

        return $this->webLink;
    }

    /**
     * @template TValue
     * @param TValue $value
     * Lock configuration
     * @default {"enabled":false,"resources":{"default":["flock"]}}
     * @return LockConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\LockConfig : static)
     */
    public function lock(mixed $value = []): LockConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['lock'] = true;
            $this->lock = $value;

            return $this;
        }

        if (!$this->lock instanceof LockConfig) {
            $this->_usedProperties['lock'] = true;
            $this->lock = new LockConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "lock()" has already been initialized. You cannot pass values the second time you call lock().');
        }

        return $this->lock;
    }

    /**
     * @template TValue
     * @param TValue $value
     * Semaphore configuration
     * @default {"enabled":false,"resources":[]}
     * @return SemaphoreConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\SemaphoreConfig : static)
     */
    public function semaphore(mixed $value = []): SemaphoreConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['semaphore'] = true;
            $this->semaphore = $value;

            return $this;
        }

        if (!$this->semaphore instanceof SemaphoreConfig) {
            $this->_usedProperties['semaphore'] = true;
            $this->semaphore = new SemaphoreConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "semaphore()" has already been initialized. You cannot pass values the second time you call semaphore().');
        }

        return $this->semaphore;
    }

    /**
     * Messenger configuration
     * @default {"enabled":true,"routing":[],"serializer":{"default_serializer":"messenger.transport.native_php_serializer","symfony_serializer":{"format":"json","context":[]}},"transports":[],"failure_transport":null,"reset_on_message":true,"default_bus":null,"buses":{"messenger.bus.default":{"default_middleware":{"enabled":true,"allow_no_handlers":false,"allow_no_senders":true},"middleware":[]}}}
     */
    public function messenger(array $value = []): MessengerConfig
    {
        if (null === $this->messenger) {
            $this->_usedProperties['messenger'] = true;
            $this->messenger = new MessengerConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "messenger()" has already been initialized. You cannot pass values the second time you call messenger().');
        }

        return $this->messenger;
    }

    /**
     * Enabled by default when debug is enabled.
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function disallowSearchEngineIndex($value): static
    {
        $this->_usedProperties['disallowSearchEngineIndex'] = true;
        $this->disallowSearchEngineIndex = $value;

        return $this;
    }

    /**
     * @template TValue
     * @param TValue $value
     * HTTP Client configuration
     * @default {"enabled":true,"scoped_clients":[]}
     * @return HttpClientConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\HttpClientConfig : static)
     */
    public function httpClient(mixed $value = []): HttpClientConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['httpClient'] = true;
            $this->httpClient = $value;

            return $this;
        }

        if (!$this->httpClient instanceof HttpClientConfig) {
            $this->_usedProperties['httpClient'] = true;
            $this->httpClient = new HttpClientConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "httpClient()" has already been initialized. You cannot pass values the second time you call httpClient().');
        }

        return $this->httpClient;
    }

    /**
     * Mailer configuration
     * @default {"enabled":true,"message_bus":null,"dsn":null,"transports":[],"headers":[]}
     */
    public function mailer(array $value = []): MailerConfig
    {
        if (null === $this->mailer) {
            $this->_usedProperties['mailer'] = true;
            $this->mailer = new MailerConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "mailer()" has already been initialized. You cannot pass values the second time you call mailer().');
        }

        return $this->mailer;
    }

    /**
     * @default {"enabled":true,"vault_directory":"%kernel.project_dir%\/config\/secrets\/%kernel.runtime_environment%","local_dotenv_file":"%kernel.project_dir%\/.env.%kernel.environment%.local","decryption_env_var":"base64:default::SYMFONY_DECRYPTION_SECRET"}
     */
    public function secrets(array $value = []): SecretsConfig
    {
        if (null === $this->secrets) {
            $this->_usedProperties['secrets'] = true;
            $this->secrets = new SecretsConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "secrets()" has already been initialized. You cannot pass values the second time you call secrets().');
        }

        return $this->secrets;
    }

    /**
     * Notifier configuration
     * @default {"enabled":true,"chatter_transports":[],"texter_transports":[],"notification_on_failed_messages":false,"channel_policy":[],"admin_recipients":[]}
     */
    public function notifier(array $value = []): NotifierConfig
    {
        if (null === $this->notifier) {
            $this->_usedProperties['notifier'] = true;
            $this->notifier = new NotifierConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "notifier()" has already been initialized. You cannot pass values the second time you call notifier().');
        }

        return $this->notifier;
    }

    /**
     * @template TValue
     * @param TValue $value
     * Rate limiter configuration
     * @default {"enabled":false,"limiters":[]}
     * @return RateLimiterConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\RateLimiterConfig : static)
     */
    public function rateLimiter(mixed $value = []): RateLimiterConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['rateLimiter'] = true;
            $this->rateLimiter = $value;

            return $this;
        }

        if (!$this->rateLimiter instanceof RateLimiterConfig) {
            $this->_usedProperties['rateLimiter'] = true;
            $this->rateLimiter = new RateLimiterConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "rateLimiter()" has already been initialized. You cannot pass values the second time you call rateLimiter().');
        }

        return $this->rateLimiter;
    }

    /**
     * @template TValue
     * @param TValue $value
     * Uid configuration
     * @default {"enabled":false,"default_uuid_version":6,"name_based_uuid_version":5,"time_based_uuid_version":6}
     * @return UidConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\UidConfig : static)
     */
    public function uid(array $value = []): UidConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['uid'] = true;
            $this->uid = $value;

            return $this;
        }

        if (!$this->uid instanceof UidConfig) {
            $this->_usedProperties['uid'] = true;
            $this->uid = new UidConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "uid()" has already been initialized. You cannot pass values the second time you call uid().');
        }

        return $this->uid;
    }

    /**
     * @template TValue
     * @param TValue $value
     * HtmlSanitizer configuration
     * @default {"enabled":false,"sanitizers":[]}
     * @return HtmlSanitizerConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\HtmlSanitizerConfig : static)
     */
    public function htmlSanitizer(array $value = []): HtmlSanitizerConfig|static
    {
        if (!is_array($value)) {
            $this->_usedProperties['htmlSanitizer'] = true;
            $this->htmlSanitizer = $value;

            return $this;
        }

        if (!$this->htmlSanitizer instanceof HtmlSanitizerConfig) {
            $this->_usedProperties['htmlSanitizer'] = true;
            $this->htmlSanitizer = new HtmlSanitizerConfig($value);
        } elseif (0 < func_num_args()) {
            throw new InvalidConfigurationException('The node created by "htmlSanitizer()" has already been initialized. You cannot pass values the second time you call htmlSanitizer().');
        }

        return $this->htmlSanitizer;
    }

    public function getExtensionAlias(): string
    {
        return 'framework';
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['secret'])) {
            $output['secret'] = $this->secret;
        }
        if (isset($this->_usedProperties['httpMethodOverride'])) {
            $output['http_method_override'] = $this->httpMethodOverride;
        }
        if (isset($this->_usedProperties['trustXSendfileTypeHeader'])) {
            $output['trust_x_sendfile_type_header'] = $this->trustXSendfileTypeHeader;
        }
        if (isset($this->_usedProperties['ide'])) {
            $output['ide'] = $this->ide;
        }
        if (isset($this->_usedProperties['test'])) {
            $output['test'] = $this->test;
        }
        if (isset($this->_usedProperties['defaultLocale'])) {
            $output['default_locale'] = $this->defaultLocale;
        }
        if (isset($this->_usedProperties['setLocaleFromAcceptLanguage'])) {
            $output['set_locale_from_accept_language'] = $this->setLocaleFromAcceptLanguage;
        }
        if (isset($this->_usedProperties['setContentLanguageFromLocale'])) {
            $output['set_content_language_from_locale'] = $this->setContentLanguageFromLocale;
        }
        if (isset($this->_usedProperties['enabledLocales'])) {
            $output['enabled_locales'] = $this->enabledLocales;
        }
        if (isset($this->_usedProperties['trustedHosts'])) {
            $output['trusted_hosts'] = $this->trustedHosts;
        }
        if (isset($this->_usedProperties['trustedProxies'])) {
            $output['trusted_proxies'] = $this->trustedProxies;
        }
        if (isset($this->_usedProperties['trustedHeaders'])) {
            $output['trusted_headers'] = $this->trustedHeaders;
        }
        if (isset($this->_usedProperties['errorController'])) {
            $output['error_controller'] = $this->errorController;
        }
        if (isset($this->_usedProperties['handleAllThrowables'])) {
            $output['handle_all_throwables'] = $this->handleAllThrowables;
        }
        if (isset($this->_usedProperties['csrfProtection'])) {
            $output['csrf_protection'] = $this->csrfProtection->toArray();
        }
        if (isset($this->_usedProperties['form'])) {
            $output['form'] = $this->form->toArray();
        }
        if (isset($this->_usedProperties['httpCache'])) {
            $output['http_cache'] = $this->httpCache instanceof HttpCacheConfig ? $this->httpCache->toArray() : $this->httpCache;
        }
        if (isset($this->_usedProperties['esi'])) {
            $output['esi'] = $this->esi instanceof EsiConfig ? $this->esi->toArray() : $this->esi;
        }
        if (isset($this->_usedProperties['ssi'])) {
            $output['ssi'] = $this->ssi instanceof SsiConfig ? $this->ssi->toArray() : $this->ssi;
        }
        if (isset($this->_usedProperties['fragments'])) {
            $output['fragments'] = $this->fragments instanceof FragmentsConfig ? $this->fragments->toArray() : $this->fragments;
        }
        if (isset($this->_usedProperties['profiler'])) {
            $output['profiler'] = $this->profiler instanceof ProfilerConfig ? $this->profiler->toArray() : $this->profiler;
        }
        if (isset($this->_usedProperties['workflows'])) {
            $output['workflows'] = $this->workflows instanceof WorkflowsConfig ? $this->workflows->toArray() : $this->workflows;
        }
        if (isset($this->_usedProperties['router'])) {
            $output['router'] = $this->router instanceof RouterConfig ? $this->router->toArray() : $this->router;
        }
        if (isset($this->_usedProperties['session'])) {
            $output['session'] = $this->session instanceof SessionConfig ? $this->session->toArray() : $this->session;
        }
        if (isset($this->_usedProperties['request'])) {
            $output['request'] = $this->request instanceof RequestConfig ? $this->request->toArray() : $this->request;
        }
        if (isset($this->_usedProperties['assets'])) {
            $output['assets'] = $this->assets->toArray();
        }
        if (isset($this->_usedProperties['translator'])) {
            $output['translator'] = $this->translator->toArray();
        }
        if (isset($this->_usedProperties['validation'])) {
            $output['validation'] = $this->validation->toArray();
        }
        if (isset($this->_usedProperties['annotations'])) {
            $output['annotations'] = $this->annotations->toArray();
        }
        if (isset($this->_usedProperties['serializer'])) {
            $output['serializer'] = $this->serializer->toArray();
        }
        if (isset($this->_usedProperties['propertyAccess'])) {
            $output['property_access'] = $this->propertyAccess->toArray();
        }
        if (isset($this->_usedProperties['propertyInfo'])) {
            $output['property_info'] = $this->propertyInfo->toArray();
        }
        if (isset($this->_usedProperties['cache'])) {
            $output['cache'] = $this->cache->toArray();
        }
        if (isset($this->_usedProperties['phpErrors'])) {
            $output['php_errors'] = $this->phpErrors->toArray();
        }
        if (isset($this->_usedProperties['exceptions'])) {
            $output['exceptions'] = array_map(function ($v) {
                return $v instanceof ExceptionConfig ? $v->toArray() : $v;
            }, $this->exceptions);
        }
        if (isset($this->_usedProperties['webLink'])) {
            $output['web_link'] = $this->webLink->toArray();
        }
        if (isset($this->_usedProperties['lock'])) {
            $output['lock'] = $this->lock instanceof LockConfig ? $this->lock->toArray() : $this->lock;
        }
        if (isset($this->_usedProperties['semaphore'])) {
            $output['semaphore'] = $this->semaphore instanceof SemaphoreConfig ? $this->semaphore->toArray() : $this->semaphore;
        }
        if (isset($this->_usedProperties['messenger'])) {
            $output['messenger'] = $this->messenger->toArray();
        }
        if (isset($this->_usedProperties['disallowSearchEngineIndex'])) {
            $output['disallow_search_engine_index'] = $this->disallowSearchEngineIndex;
        }
        if (isset($this->_usedProperties['httpClient'])) {
            $output['http_client'] = $this->httpClient instanceof HttpClientConfig ? $this->httpClient->toArray() : $this->httpClient;
        }
        if (isset($this->_usedProperties['mailer'])) {
            $output['mailer'] = $this->mailer->toArray();
        }
        if (isset($this->_usedProperties['secrets'])) {
            $output['secrets'] = $this->secrets->toArray();
        }
        if (isset($this->_usedProperties['notifier'])) {
            $output['notifier'] = $this->notifier->toArray();
        }
        if (isset($this->_usedProperties['rateLimiter'])) {
            $output['rate_limiter'] = $this->rateLimiter instanceof RateLimiterConfig ? $this->rateLimiter->toArray() : $this->rateLimiter;
        }
        if (isset($this->_usedProperties['uid'])) {
            $output['uid'] = $this->uid instanceof UidConfig ? $this->uid->toArray() : $this->uid;
        }
        if (isset($this->_usedProperties['htmlSanitizer'])) {
            $output['html_sanitizer'] = $this->htmlSanitizer instanceof HtmlSanitizerConfig ? $this->htmlSanitizer->toArray() : $this->htmlSanitizer;
        }

        return $output;
    }

}
