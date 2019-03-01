<?php
/**
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Ian den Hartog (https://iandh.nl)
 * @since     0.0.1
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Iandenh\Ssr\Render;

use Cake\Core\Configure;
use Spatie\Ssr\Engines\Node;
use Spatie\Ssr\Renderer;

class SsrRender
{
    protected $renderer;

    /** @var array */
    protected $context = [];

    /** @var array */
    protected $env = [];

    /** @var bool */
    protected $enabled = true;

    /** @var string */
    protected $entry;

    /** @var string */
    protected $fallback = '';

    /** @var bool */
    protected $debug = false;

    public function __construct(string $entry)
    {
        $this->entry = $entry;
    }

    public function render(): string
    {
        $engine = new Node(Configure::read('Ssr.node.node_path'), Configure::read('Ssr.node.temp_path'));
        $renderer = new Renderer($engine);

        return $renderer->debug($this->isDebug())
            ->context($this->getContext())
            ->env($this->getEnv())
            ->fallback($this->getFallback())
            ->enabled($this->isEnabled())
            ->entry($this->getEntry())
            ->render();
    }

    public function __toString()
    {
        return $this->render();
    }

    /**
     * @return array
     */
    public function getContext(): array
    {
        return $this->context;
    }

    /**
     * @param array $context
     * @return SsrRender
     */
    public function setContext(array $context): SsrRender
    {
        $this->context = $context;

        return $this;
    }

    /**
     * @return array
     */
    public function getEnv(): array
    {
        return $this->env;
    }

    /**
     * @param array $env
     * @return SsrRender
     */
    public function setEnv(array $env): SsrRender
    {
        $this->env = $env;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     * @return SsrRender
     */
    public function setEnabled(bool $enabled): SsrRender
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return string
     */
    public function getEntry(): string
    {
        return $this->entry;
    }

    /**
     * @param string $entry
     * @return SsrRender
     */
    public function setEntry(string $entry): SsrRender
    {
        $this->entry = $entry;

        return $this;
    }

    /**
     * @return string
     */
    public function getFallback(): string
    {
        return $this->fallback;
    }

    /**
     * @param string $fallback
     * @return SsrRender
     */
    public function setFallback(string $fallback): SsrRender
    {
        $this->fallback = $fallback;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @param bool $debug
     * @return SsrRender
     */
    public function setDebug(bool $debug): SsrRender
    {
        $this->debug = $debug;

        return $this;
    }
}
