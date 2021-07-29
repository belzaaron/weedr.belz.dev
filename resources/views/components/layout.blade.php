<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        {{ config('app.name') }}
        @if ($attributes->has('title'))
            | {{ $attributes->get('title') }}
        @endif
    </title>

    <link  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" integrity="sha512-xnP2tOaCJnzp2d2IqKFcxuOiVCbuessxM6wuiolT9eeEJCyy0Vhcwa4zQvdrZNVqlqaxXhHqsSV1Ww7T2jSCUQ==" crossorigin="anonymous" referrerpolicy="no-referrer" rel="stylesheet" />
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-usVBAd66/NpVNfBge19gws2j6JZinnca12rAe2l+d+QkLU9fiG02O1X8Q6hepIpr/EYKZvKx/I9WsnujJuOmBA==" crossorigin="anonymous" referrerpolicy="no-referrer" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js" integrity="sha512-72WD92hLs7T5FAXn3vkNZflWG6pglUDDpm87TeQmfSg8KnrymL2G30R7as4FmTwhgu9H7eSzDCX3mjitSecKnw==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
</head>
<body class="vh-100" style="background-color: #2d3436">
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
            <span class="d-flex align-items-center text-light">
                <i class="bi bi-tornado me-2" style="font-size: 2rem; color: #a29bfe;"></i>
                <span class="fs-4">{{ config('app.name') }}</span>
            </span>
        </header>

        {{ $slot }}

        <footer class="pt-3 mt-4 border-top text-muted">
            Developed by <a href="https://belzaaron.com" style="color: #a29bfe;">Aaron Belz</a>.
        </footer>
    </div>
</body>
</html>
