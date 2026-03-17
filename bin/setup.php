<?php declare(strict_types=1);

function replaceNamespace(string $content, string $namespace): string
{
    $namespacePlaceholder = '__YourNamespace__';

    return str_replace($namespacePlaceholder, $namespace, $content);
}

function isValidNamespace(string $namespace): bool
{
    $namespaceRegex = '/(?:[A-Z_][A-Z_0-9]*\\\)*[A-Z_][A-Z_0-9]*/i';

    return 1 === preg_match($namespaceRegex, $namespace);
}

function line(string $message): void
{
    print($message . PHP_EOL);
}

function promptNamespace(): ?string
{
    $userInput = readline('Please enter a namespace for your classes: ');

    if (false === $userInput) {
        return null;
    }

    $userInput = trim($userInput);

    if ('' === $userInput) {
        return null;
    }

    return $userInput;
}

function getNamespace(): ?string
{
    $attempts = 3;

    while ($attempts--) {
        $userNamespace = promptNamespace();

        if (null !== $userNamespace && isValidNamespace($userNamespace)) {
            return $userNamespace;
        }

        line('Invalid namespace provided!');
    }

    return null;
}

function loadFile(string $filePath): string
{
    $contents = file_get_contents($filePath);

    assert(false !== $contents);

    return $contents;
}

function welcome(): void
{
    line('<<<<<<<<<<<<<<<<<<<<<<<');
    line('< PHP Project Starter <');
    line('<<<<<<<<<<<<<<<<<<<<<<<');
    line('');
}

function finish(): void
{
    line('Success: setup complete!');
    line("Happy coding! 🙂");
}

function composerDumpAutoload(): void
{
    exec('composer dump-autoload');
}

function selfDestruct(): void
{
    unlink(__FILE__);
    rmdir(__DIR__);
}

function updateFile(string $file, string $namespace): bool
{
    // composer.json requires double escaped backslashes
    if ('.json' === substr($file, -5)) {
        $namespace = str_replace('\\', '\\\\', $namespace);
    }

    $fileContent = loadFile($file);
    $fileContent = replaceNamespace($fileContent, $namespace);

    return false !== file_put_contents($file, $fileContent);
}

function quit(string $message, int $errorCode = 1): never
{
    line($message);
    exit($errorCode);
}


/* ########################################################################## */

$rootDir = dirname(__DIR__);

$filesToUpdate = [
    "{$rootDir}/composer.json",
    "{$rootDir}/src/HelloWorld.php",
    "{$rootDir}/tests/Unit/HelloWorldTest.php",
];

if ($rootDir !== getcwd()) {
    quit('Error: this script should be run from the project root!');
}

welcome();

$namespace = getNamespace();

if (null === $namespace) {
    quit('Error: no valid namespace provided after 3 attempts!');
}

line("Chosen namespace: {$namespace}");

foreach ($filesToUpdate as $file) {
    line("Updating file: {$file}");

    if (!updateFile($file, $namespace)) {
        quit('Error: failed to update!');
    }
}

finish();
composerDumpAutoload();
selfDestruct();

exit(0);
