<?php declare(strict_types=1);

namespace __YourNamespace__\Tests\Unit;

use __YourNamespace__\HelloWorld;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

/**
 * @example An example unit test to illustrate test layout.
 */
#[CoversClass(HelloWorld::class)]
final class HelloWorldTest extends TestCase
{
    protected HelloWorld $helloWorld;

    #[Override]
    protected function setUp(): void
    {
        $this->helloWorld = new HelloWorld();
    }

    public function testCanGetGreetingMessage(): void
    {
        self::assertSame('Hello world!', $this->helloWorld->getMessage());
    }
}
