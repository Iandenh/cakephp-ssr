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

namespace Iandenh\Ssr\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Iandenh\Ssr\View\Helper\SsrHelper;

class SsrHelperTest extends TestCase
{
    /**
     * @var \Iandenh\Ssr\View\Helper\SsrHelper
     */
    protected $SsrHelper;
    /**
     * @var \Cake\View\View
     */
    protected $View;

    public function setUp()
    {
        $this->View = new View();
        $this->SsrHelper = new SsrHelper($this->View);
    }

    public function testShouldRenderJs()
    {
        $result = $this->SsrHelper->start(TESTS . DS . 'resources' . DS . 'test.js')
            ->render();

        $this->assertTextEquals("<div>Hallo</div>", $result);
    }
}
