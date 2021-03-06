<?php
/**
 * @author    Pierre-Henry Soria <hi@ph7.me>
 * @license   MIT License; <https://opensource.org/licenses/MIT>
 */

declare(strict_types=1);

namespace GetMeALatteLike\Tests\Unit\Kernel;

use GetMeALatteLike\Kernel\Input;
use PHPUnit\Framework\TestCase;

final class InputTest extends TestCase
{
    public function testGetWithExistingKey(): void
    {
        $_GET['key'] = 'value';

        $actual = Input::get('key');
        $this->assertSame('value', $actual);
    }

    public function testGetWithoutExistingKey(): void
    {
        $actual = Input::get('key');
        $this->assertSame('', $actual);
    }

    public function testGetExists(): void
    {
        $_GET['exist'] = '1';

        $actual = Input::getExists('exist');
        $this->assertTrue($actual);
    }

    public function testGetNotExists(): void
    {
        $actual = Input::getExists('exist');
        $this->assertFalse($actual);
    }

    public function testPostWithExistingKey(): void
    {
        $_POST['key'] = 'value';

        $actual = Input::post('key');
        $this->assertSame('value', $actual);
    }

    public function testPostWithoutExistingKey(): void
    {
        $actual = Input::post('key');
        $this->assertSame('', $actual);
    }

    public function testPostExists(): void
    {
        $_POST['exist'] = '1';

        $actual = Input::postExists('exist');
        $this->assertTrue($actual);
    }

    public function testPostNotExists(): void
    {
        $actual = Input::postExists('exist');
        $this->assertFalse($actual);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->cleanupGlobalVariables();
    }

    private function cleanupGlobalVariables(): void
    {
        unset($_GET, $_POST);
    }
}
