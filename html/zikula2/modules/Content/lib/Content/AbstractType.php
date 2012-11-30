<?php

/**
 * Base class for content plugins
 *
 */
abstract class Content_AbstractType implements Zikula_TranslatableInterface
{

    /**
     * Translation domain.
     *
     * @var string
     */
    protected $domain;
    /**
     * Instance of Zikula_View.
     *
     * @var Zikula_View
     */
    protected $view;
    /**
     * Module name
     *
     * @var string
     */
    protected $modname = 'Content';
    /**
     * Plugin name
     *
     * @var string
     */
    protected $pluginname;

    /**
     * Constructor.
     *
     * @param Zikula_View $view View instance.
     */
    public function __construct(Zikula_View $view)
    {
        $parts = explode('_', get_class($this));
        $this->modname = $parts[0];
        $this->pluginname = array_pop($parts);
        $this->domain = ZLanguage::getModuleDomain($this->modname);
        $this->view = $view;
    }

    /**
     * Translate.
     *
     * @param string $msgid String to be translated.
     *
     * @return string The $msgid translated by gettext.
     */
    public function __($msgid)
    {
        return __($msgid, $this->domain);
    }

    /**
     * Translate with sprintf().
     *
     * @param string       $msgid  String to be translated.
     * @param string|array $params Args for sprintf().
     *
     * @return string The $msgid translated by gettext.
     */
    public function __f($msgid, $params)
    {
        return __f($msgid, $params, $this->domain);
    }

    /**
     * Translate plural string.
     *
     * @param string $singular Singular instance.
     * @param string $plural   Plural instance.
     * @param string $count    Object count.
     *
     * @return string Translated string.
     */
    public function _n($singular, $plural, $count)
    {
        return _n($singular, $plural, $count, $this->domain);
    }

    /**
     * Translate plural string with sprintf().
     *
     * @param string       $sin    Singular instance.
     * @param string       $plu    Plural instance.
     * @param string       $n      Object count.
     * @param string|array $params Sprintf() arguments.
     *
     * @return string The $sin or $plu translated by gettext, based on $n.
     */
    public function _fn($sin, $plu, $n, $params)
    {
        return _fn($sin, $plu, $n, $params, $this->domain);
    }

    /**
     * Get module name
     * @return string
     */
    public function getModule()
    {
        return $this->modname;
    }

    /**
     * Get plugin name
     * @return string
     */
    public function getName()
    {
        return $this->pluginname;
    }

    /**
     * Get displayed title
     * @return string
     */
    public function getTitle()
    {
        return '- no title defined -';
    }

    /**
     * Get displayed description
     * @return string
     */
    public function getDescription()
    {
        return '';
    }

    /**
     * Unset the Zikula_(Form)_View object
     */
    public function destroyView()
    {
        unset($this->view);
    }
}
