<?php
/**
 * @author    Pierre-Henry Soria <hi@ph7.me>
 * @license   MIT License; <https://opensource.org/licenses/MIT>
 */

declare(strict_types=1);

namespace GetMeALatteLike\Tests\Unit\Kernel;

use GetMeALatteLike\Kernel\Session;
use PHPUnit\Framework\TestCase;

final class SessionTest extends TestCase
{
    private Session $session;

    protected function setUp(): void
    {
        parent::setUp();

        $this->session = new Session(autoSessionStart: false);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->cleanupSessionVariable();
    }

    public function testSet(): void
    {
        $this->session->set('name', 'value');
        $actual = $this->session->get('name');

        $this->assertSame('value', $actual);
    }

    public function testSets(): void
    {
        $this->session->sets(
            [
                'name1' => 'value1',
                'name2'=> 'value2'
            ]
        );

        $this->assertSame('value1', $this->session->get('name1'));
        $this->assertSame('value2', $this->session->get('name2'));
    }

    public function testDoesExist(): void
    {
        $_SESSION['key'] = 1;

        $this->assertTrue($this->session->doesExist('key'));
    }

    public function testDoesNotExist(): void
    {
        unset($_SESSION['key']);

        $this->assertFalse($this->session->doesExist('key'));
    }

    private function cleanupSessionVariable(): void
    {
        unset($_SESSION);
    }
}
