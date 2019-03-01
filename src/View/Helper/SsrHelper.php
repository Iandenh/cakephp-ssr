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

namespace Iandenh\Ssr\View\Helper;

use Cake\Core\Configure;
use Cake\View\Helper;
use Cake\View\View;
use Iandenh\Ssr\Render\SsrRender;

class SsrHelper extends Helper
{
    public function __construct(View $View, array $config = [])
    {
        parent::__construct($View, $config);
        $this->configShallow(Configure::read('Ssr'));
    }

    public function start(string $entry): SsrRender
    {
        return (new SsrRender($entry))
            ->setEnabled($this->getConfig('enabled'))
            ->setDebug($this->getConfig('debug'))
            ->setContext($this->getConfig('context'))
            ->setEnv($this->getConfig('env'));
    }
}
