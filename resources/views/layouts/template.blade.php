<!DOCTYPE html>
<html lang="en">

<x-head title="My App" description="This is my app." />

<body>
    <header>
        <x-nav />
    </header>

    <main>
        @yield('content-primary')
    </main>

    <footer>
        <x-footer />
    </footer>

    <script src="js/stepper.js"></script>
</body>

</html>
